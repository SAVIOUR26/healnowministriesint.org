# Heal Now Ministries International — site rebuild

Custom, framework-free PHP rebuild of healnowministriesint.org (previously
WordPress/Astra/Elementor). Vanilla PHP, CSS, and JS — no Composer
dependencies, no build step.

## Structure

```
bootstrap.php        Shared setup: constants, content/template loaders, e(), asset(), render()
content/
  site.php           Global site data: nav, footer, contact info, social links
  pages/*.php         One file per page, returns an array of that page's copy + meta
  posts/*.php         One file per blog post, same shape plus title/date/category/body
templates/
  header.php          <head> + site header/nav (opens <main>)
  footer.php          Site footer + closes </main></body></html>
  post.php            Shared article layout used by every blog post page
  components.php      btn() and img() render helpers
public/               Web root (point the server here)
  index.php           Home
  about/index.php      /about/
  what-we-do/index.php /what-we-do/  (nav label "Programs")
  contact/index.php    /contact/  — PHP mail() form handler lives inline here
  get-involved/index.php
  blog/index.php        /blog/ index, links to post directories below
  online-radio/index.php
  donate/index.php
  sample-page/index.php WordPress default filler, kept only for URL parity — not linked anywhere
  <post-slug>/index.php  one directory per blog post, matching the live permalinks (posts live at
                          site root, not under /blog/, same as the old WordPress permalinks)
  sitemap.xml, robots.txt
  assets -> ../assets  (symlink, see below)
assets/
  css/style.css, js/main.js
  images/              WebP (+ a couple PNGs for favicon/QR/logo) actually used on the site
  originals/           Full-resolution source photos/logo as downloaded from the live site —
                        not served, kept for future re-cropping/re-export
BRAND.md               Extracted brand spec (colors, fonts, logo, favicon) — non-negotiable
SITE-MAP.md            Extraction notes: nav/footer structure, forms, what was and wasn't carried over
```

## Why `public/` is the web root

`bootstrap.php`, `content/`, and `templates/` sit **outside** `public/` on
purpose — they're PHP source, not things a browser should ever be able to
request directly. Every page in `public/` does:

```php
require __DIR__ . '/../../bootstrap.php'; // one ../ per directory level
```

Point your web server's document root at `public/`. Locally:

```
php -S localhost:8000 -t public
```

`public/assets` is a **symlink** to `../assets` (checked into git as a
symlink) so asset URLs resolve at `/assets/...` without duplicating files
under `public/`. If your deploy target can't preserve symlinks, copy
`assets/` into `public/assets/` as a real directory instead — see the FTP
deploy workflow notes below.

## Content conventions

- Every page's copy lives in `content/pages/<slug>.php`, returned as a
  plain PHP array (`meta`, plus whatever sections that page needs — there's
  no shared page schema, each page's public/*.php template knows its own
  content shape).
- Blog posts live in `content/posts/<slug>.php`. `body` is an array of
  either plain strings (paragraphs), `['heading' => ...]`, or
  `['list' => [...]]` — `templates/post.php` switches on that shape.
- `content/pages/blog.php['posts']` is the ordered list of post slugs shown
  on `/blog/` — add a new post there too, or it won't show up in the index
  (it'll still be reachable directly if you add its `public/<slug>/index.php`).
- All copy was extracted **word-for-word** from the live WordPress site.
  If you're editing existing copy, that's a deliberate content change, not
  a rebuild artifact — no need to preserve the original wording once the
  client asks for edits.

## Adding a new page

1. `content/pages/new-slug.php` — return `['meta' => [...], ...]`.
2. `public/new-slug/index.php` — `require bootstrap.php`, `page_content('new-slug')`,
   `render('header.php', ['meta' => $meta])`, your markup, `render('footer.php')`.
3. Add it to `content/site.php['nav']` if it belongs in the header nav.
4. Add a `<url>` entry to `public/sitemap.xml`.

## Adding a new blog post

1. `content/posts/new-slug.php`.
2. `public/new-slug/index.php` — same four-line pattern as the other posts
   (see any existing one), pointing at `post_content('new-slug')` and
   `templates/post.php`.
3. Prepend (or place in display order) the slug in
   `content/pages/blog.php['posts']`.
4. Add a `<url>` entry to `public/sitemap.xml`.

## Styling / brand

`assets/css/style.css` is one hand-written vanilla stylesheet using CSS
custom properties defined in `:root` — colors, fonts, spacing all flow
from there. **Brand colors/fonts/logo are fixed per BRAND.md** — don't
introduce new brand colors; extend the existing custom properties instead
(e.g. add a new semantic variable that references an existing brand hex,
rather than a new raw hex).

`assets/js/main.js` handles the mobile nav toggle and the `.reveal`
scroll-in animation (IntersectionObserver, with a `prefers-reduced-motion`
and no-JS fallback that just shows content).

## Contact form

`public/contact/index.php` handles its own POST in the same file (no
separate handler script). Currently sends via PHP's built-in `mail()` —
this depends on the server having a configured MTA/sendmail. **When SMTP
credentials are available**, swap the `mail()` call for a PHPMailer (or
similar) SMTP send using the same `$to`/`$subject`/`$body` — the
validation, honeypot, and error/success UI around it don't need to change.

## Known gaps (see SITE-MAP.md for why)

- No blog comments (WordPress native comments weren't ported — none of
  the 4 posts had any real comments to migrate).
- Online Radio page ships a placeholder `<audio>` element — the live site's
  stream URL wasn't discoverable from static HTML. Point the `src` at a
  real stream URL in `content/pages/online-radio.php` (`stream_url`) once
  you have one.
- `/sample-page/` is WordPress's default placeholder page, recreated only
  because it existed on the live site — it isn't linked from anywhere and
  can be deleted outright if you'd rather not carry it forward.
