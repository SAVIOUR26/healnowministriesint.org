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

## 3. Layout this workflow uses

Confirmed from the live account's file manager: this FTP account's root
**is** `public_html` directly — there's no accessible parent directory to
hide `bootstrap.php`/`content`/`templates` behind. So the workflow
flattens everything into one directory and uploads it straight to
`FTP_SERVER_DIR` (`/`, i.e. `public_html` itself):

```
build/                 <- uploaded to FTP_SERVER_DIR ("/" = public_html)
  index.php             becomes https://healnowministriesint.org/
  about/index.php        .../about/
  ...
  assets/               (real copy: css/, js/, images/ — no originals)
  bootstrap.php         sits at the web root, but only defines
                        functions/constants — no output, no secrets
  content/              denied via content/.htaccess (Apache only)
  templates/            denied via templates/.htaccess (Apache only)
```

This trades a bit of the isolation the local dev layout has (`bootstrap.php`/
`content`/`templates` living outside `public/` there) for working within
what this FTP account can actually reach. `content/.htaccess` and
`templates/.htaccess` block direct HTTP access to those two folders as a
safety net — that only works if the server is Apache with `AllowOverride`
enabled for `.htaccess` (the cPanel default). If requests to
e.g. `/content/site.php` return the file instead of a 403, flag it and
we'll look at your Apache config — worst case those files just return
blank output (they're `return [...]` arrays with no side effects, not
scripts that print anything), so there's no secret-leak risk today, just
untidiness.

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
