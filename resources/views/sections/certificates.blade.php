<section class="cert-section" id="certificates">
    <div class="container">
        <span class="section-label">Certificates</span>
        <p class="section-desc">Credentials earned along the way. Click any certificate to view the full image.</p>

        <div class="cert-slider">
            <div class="cert-track" id="cert-track">
                @foreach ($certificates as $cert)
                    <div class="cert-slide">
                        <div class="cert-thumb js-cert-open"
                             data-img="{{ asset($cert['image']) }}"
                             data-title="{{ $cert['title'] }}"
                             data-org="{{ $cert['org'] }}"
                             data-date="{{ $cert['year'] }}"
                             role="button"
                             tabindex="0"
                             title="Open {{ $cert['title'] }}">
                            <img src="{{ asset($cert['image']) }}" alt="{{ $cert['title'] }} certificate thumbnail">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="cert-arrows">
                <button class="cert-arrow prev" id="cert-prev" aria-label="Previous certificates">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <button class="cert-arrow next" id="cert-next" aria-label="Next certificates">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
