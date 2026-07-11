# Brand Guide — Heal Now Ministries International

Extracted from the live site (Astra theme + Elementor) on 2026-07-11. These
values are **non-negotiable** — they must be used as-is anywhere brand
identity shows up (colors, fonts, logo, tagline).

## Identity

- **Site name:** Heal Now Ministries International
- **Tagline / meta suffix:** "Jesus Cares" (used in the homepage `<title>`:
  "Heal Now Ministries International – Jesus Cares")
- **Short name / abbreviation used in footer:** HNMI
- **Description (from footer):** "Heal Now Ministries International (HNMI)
  is a dedicated organization committed to fostering a just and equitable
  society. Our mission is to empower communities through holistic
  programs."

## Logo

- Master file: `assets/originals/HNMI-lOGO-02.png` (1042×1042, full
  resolution, transparent-safe RGB — this is the un-cropped original, not
  the WordPress-generated `cropped-*` site-icon crops)
- Web copies: `assets/images/logo.png`, `assets/images/logo.webp`
- Displayed at 80×80 in the live header

## Favicon

Generated from the master logo (the live site only exposed WP's auto-cropped
32×32 / 192×192 site-icon crops, so we regenerated clean sizes from the
original):

- `assets/images/favicon.ico` (16/32/48 multi-size)
- `assets/images/favicon-16.png`, `favicon-32.png`
- `assets/images/apple-touch-icon.png` (180×180)

## Color Palette

Pulled from the Astra theme's global color variables
(`--ast-global-color-N`) and confirmed against the Elementor button/link
CSS on every page (`--e-global-color-astglobalcolorN` mirrors the same
values):

| Role | Var | Hex | Usage on live site |
|---|---|---|---|
| Primary / links / buttons | color-0 | `#0274be` | link color, button text/fill, headings accents |
| Secondary / hover | color-1 | `#70bbed` | link hover, button hover |
| Body text | color-2 | `#3a3a3a` | default text color |
| Muted text | color-3 | `#4B4F58` | secondary text, blockquotes |
| Light background | color-4 | `#F5F5F5` | section backgrounds |
| White | color-5 / 7 | `#FFFFFF` | cards, reversed text |
| Black | color-6 | `#000000` | rarely used, deep contrast |
| Accent / tint | color-8 | `#c5d7e3` | light blue tint accents |

Use `#0274be` as the one true brand primary (CTAs, links, active states)
and `#70bbed` as its lighter companion (hover/secondary accents). Neutrals:
`#3a3a3a` body text, `#4B4F58` muted text, `#F5F5F5` section backgrounds.

## Typography

- **Headings:** `Poppins`, weight 700 (Google Font, loaded on live site as
  `Poppins:700`)
- **Body:** `Source Sans Pro`, weight 400 (Google Font, loaded on live site
  as `Source+Sans+Pro:400`)
- Live base size: `17px` / `1rem` body, line-height `1.65em`
- Live heading scale (desktop): H1 `90px`/1em, H2 `55px`/1.2em, H3 `35px`/1em

For the rebuild we keep the same two families and relative hierarchy but
apply a more restrained, modern fluid type scale (clamp()-based) rather
than the oversized `90px` H1 — generous whitespace and hierarchy over raw
size.

## Layout conventions (carried from live site)

- Container max-width: `1200px` (Astra normal container), narrow `750px`
- Elementor boxed container: `1140px`

## Imagery

Real photos from Heal Now Ministries' work in Uganda (Wakiso), not stock
imagery — camera photos (TECNO CA8) of community projects, plus a couple
of designed blog header/graphic images. All converted to WebP in
`/assets/images/`, originals preserved in `/assets/originals/`.
