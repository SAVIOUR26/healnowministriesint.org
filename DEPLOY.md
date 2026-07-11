# Deploying to production via FTP

`.github/workflows/deploy.yml` pushes this site live over FTP/FTPS on every
push to `main` (or on demand via the **Run workflow** button on the
Actions tab).

## 1. Add repo secrets

**Settings → Secrets and variables → Actions → New repository secret**:

| Secret | Value |
|---|---|
| `FTP_SERVER` | Your FTP host, e.g. `ftp.healnowministriesint.org` |
| `FTP_USERNAME` | FTP account username |
| `FTP_PASSWORD` | FTP account password |
| `FTP_PORT` | Only needed if not port 21 |

## 2. Add repo variables (optional — sane defaults exist)

**Settings → Secrets and variables → Actions → Variables**:

| Variable | Default | When to set it |
|---|---|---|
| `FTP_SERVER_DIR` | `/` | The remote path your FTP account should upload into. See "layout" below — leave as `/` if FTP lands you at your account's home directory. |
| `FTP_PROTOCOL` | `ftps` | Set to `ftp` only if your host doesn't support FTPS (plain FTP sends your password unencrypted — avoid if possible). |

## 3. Layout this workflow assumes

The workflow stages a `build/` directory that mirrors this repo, except
`public/` is renamed to **`public_html/`** (the most common cPanel/shared-
hosting web root name) and `public/assets` (a symlink locally) becomes a
real folder containing `css/`, `js/`, and `images/` — `assets/originals/`
(the large source photos) is intentionally left out since nothing at
runtime reads it.

```
build/
  bootstrap.php
  content/
  templates/
  public_html/        <- becomes https://healnowministriesint.org/
    index.php
    about/index.php
    ...
    assets/
```

This only works correctly if **your FTP account has access one level
above the web root** — i.e. logging in with FTP lands you at a home
directory that *contains* `public_html/` as one folder among others,
rather than dropping you directly inside `public_html/`. That's how
`bootstrap.php`, `content/`, and `templates/` end up outside the web
root and un-requestable over HTTP, same as the local dev setup.

**If your web root folder isn't named `public_html`** (Plesk often uses
`htdocs`, some hosts use `www`), tell me and I'll change the one line in
`deploy.yml` that renames `public/` on stage.

**If your FTP account is scoped only to the web root** (login drops you
straight into what would be `public_html`, with no sibling folders
reachable), the layout above won't work as-is — `bootstrap.php`,
`content/`, and `templates/` would need to be uploaded *inside* the web
root instead of beside it. Tell me and I'll adjust the staging step to
flatten everything into one directory. As a safety net for that case,
`content/.htaccess` and `templates/.htaccess` already deny all HTTP
access to those two folders outright (Apache only — if your host runs
nginx instead, that `.htaccess` is silently ignored and does nothing, so
flag that too if it applies to you).

## 4. Merge to `main`

The workflow triggers on push to `main`. Merge
`claude/rebuild-heal-now-site-t9ui4h` into `main` when you're ready to go
live, or use **Actions → Deploy to production (FTP) → Run workflow** to
deploy this branch manually before merging.

## 5. Contact form email

The live contact form (`public/contact/index.php`) currently sends via
PHP's built-in `mail()`, which needs a configured MTA/sendmail on the
server — most shared hosts have this out of the box. If messages don't
arrive, that's the first thing to check with your host. Swapping in SMTP
(PHPMailer or similar) once you have credentials is a small, isolated
change — see the note in `CLAUDE.md`.
