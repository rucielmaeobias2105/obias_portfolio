---
paths:
  - routes/web.php
---

# Routes

## Certificates come from DB, not PortfolioData
The `/` route overrides PortfolioData::all()['certificates'] with Certificate::query()->orderBy('sort_order')->get(). The certificates table is seeded from public/cert_img via CertificateSeeder; the source of truth is the image files, so rerun that seeder after adding/removing files. PortfolioData::certificates() is stale and unused.
