# Site structure, forms, and links (extracted from live site)

## Pages (from wp-sitemap + nav)

| Slug | URL | In main nav? | Notes |
|---|---|---|---|
| Home | `/` | yes | |
| About | `/about/` | yes | |
| Programs | `/what-we-do/` | yes | nav label is "Programs", slug is `what-we-do` |
| Online Radio | `/online-radio/` | yes | embeds an audio player widget |
| Blog | `/blog/` | yes | index of 4 posts |
| Get Involved | `/get-involved/` | yes | |
| Contact | `/contact/` | yes | contact form |
| Donate | `/donate/` | no (header CTA button, not in nav list) | PayPal donate link + bank transfer + QR code |
| Sample Page | `/sample-page/` | no | WordPress default placeholder content, not linked anywhere on the live site (no nav/footer/body links point to it). Recreated only for URL parity; not real ministry content. |

Blog posts (children of `/blog/`, own permalinks at site root):
- `/stories-of-transformation-changing-lives-with-heal-now-ministries-international/`
- `/healing-hearts-the-power-of-compassion-and-community-support-at-heal-now-ministries/`
- `/how-faith-and-compassion-drive-change-in-uganda/`
- `/empowering-ugandas-most-vulnerable-heal-now-ministries-approach-to-sustainable-change/`

## Header

- Logo (links to `/`)
- Nav: Home, About, Programs, Online Radio, Blog, Get Involved, Contact
- CTA button: "Donate" → `/donate/`

## Footer (same on every page)

- Blurb: "Heal Now Ministries International (HNMI) is a dedicated
  organization committed to fostering a just and equitable society. Our
  mission is to empower communities through holistic programs."
- "Our Programs" list (text only, not links on live site): Children's
  Welfare, Youth Empowerment, Women's Support, Elderly Care, Community
  Projects, Empower Young Mothers Initiative, Renewable Energy
- "Contact Us": address, 2 phone numbers, email (see below)
- Social icons: LinkedIn, Twitter, Facebook (all three have no href on the
  live site — decorative/unconfigured), YouTube → channel
  `https://www.youtube.com/channel/UCwWnYiHOKxG-2U_vkcdIIFA`, WhatsApp →
  `https://wa.me/256783837750`
- Copyright: "Copyright © 2024 Heal Now Ministries International (HNMI) |
  Powered By Thirdsan Enterprises" — rebuild uses dynamic year, drops the
  "Powered By" credit line since it belongs to the old build.

## Contact details (used in header/contact page/footer)

- Address: Ndejje Zanta, Wakiso, P.O BOX 168013, Kampala Uganda
- Phone: +256 200 925429, +256 783 936465
- Email: info@healnowministriesint.org

## Forms

### Contact form (`/contact/`)
Live implementation: WPForms, POSTs to `/contact/` itself (WP admin-ajax
style handling), fields:
- First Name (text, `wpforms[fields][0][first]`)
- Last Name (text, `wpforms[fields][0][last]`)
- Email (email, `wpforms[fields][1]`)
- Message (textarea, `wpforms[fields][2]`, required)
- (plus WPForms hidden/meta fields — not relevant to the rebuild)

Rebuild: plain PHP form in `/public/contact.php` posting to itself,
same visible fields (First Name, Last Name, Email, Message — Message
required), sent via PHP `mail()` to `info@healnowministriesint.org`
(SMTP credentials to be wired in later).

### Blog comment forms (on each post)
Live implementation: WordPress native comment form, POSTs to
`/wp-comments-post.php`. Fields: Comment (textarea), Name, Email, Website
(all optional per WP defaults except comment), cookie consent checkbox.

Rebuild: **omitted**. There are no real comments on any of the 4 posts
(all show "Leave a Comment" i.e. zero existing comments), and standing up
a comment system is out of scope for a lightweight static-content rebuild.
Flag to the user if they want this restored later (would need a database).

## Donate page

- Primary CTA: "Donate Now" button → PayPal hosted button
  `https://www.paypal.com/donate/?hosted_button_id=WZXXEQM9MVSXS`
- QR code image for the same donation flow
- Bank transfer details (Equity Bank, account name/number, branch, SWIFT)
  shown as plain text, not a form

## Online Radio page

- Live page embeds a radio/audio-player plugin (image "album art" +
  station logo, plus a player widget the crawler couldn't execute
  client-side JS for). Rebuild: same header/logo image, with a plain HTML5
  `<audio>` element wired to the same visual treatment — no stream URL was
  discoverable from the static HTML, so it ships as a placeholder player
  the client can point at a real stream URL.
