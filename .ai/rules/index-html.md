---
paths:
  - index.html
---

# Static Vite Portfolio — Content Is Hardcoded

This is a static site, not a Laravel app. All portfolio content (profile, education,
certificates, experience, projects, tools, contact) is hardcoded in `index.html`.

- Images/PDFs live in `public/` (the Vite `publicDir`) — they are copied verbatim into `dist/`.
- CSS and JS live in `src/` (`src/css/app.css`, `src/js/app.js`) and are bundled by Vite.
- Edit `index.html` directly to change content, then run `npm run build` to regenerate `dist/`.
- Asset references in HTML are root-relative (e.g. `/projects/BHSM/login.png`) because Vercel serves from the domain root.