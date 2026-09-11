<section class="about-section" id="about">
    <div class="container">
        <div class="about-grid">
            <div class="about-copy">
                <span class="section-label">About</span>
                <p class="about-bio">{{ $portfolio['bio_about'] }}</p>

                <div class="about-files">
                    <button class="btn btn-primary js-file-open"
                            data-pdf="{{ $portfolio['files']['resume'] }}"
                            data-title="Resume"
                            data-sub="{{ $portfolio['name'] }}">
                        <i class="fa-solid fa-file-lines"></i> View Resume
                    </button>
                    <button class="btn btn-primary js-file-open"
                            data-pdf="{{ $portfolio['files']['pds'] }}"
                            data-title="Personal Data Sheet"
                            data-sub="{{ $portfolio['name'] }}">
                        <i class="fa-solid fa-file-lines"></i> View PDS
                    </button>
                </div>
            </div>
        </div>

        {{-- Tools I've Used --}}
        <div class="tools-section">
            <div class="tools-header">
                <h3 class="tools-title">Tools I've <em>Used</em></h3>
                <p class="tools-sub">Technologies and software I work with across development, databases, and design.</p>
            </div>

            @php
                $grouped = collect($tools)->groupBy('category');
            @endphp

            @foreach ($grouped as $category => $items)
                <div class="tools-category">
                    <div class="tools-cat-label">
                        <span>{{ $category }}</span>
                    </div>
                    <div class="tools-grid">
                        @foreach ($items as $tool)
                            <div class="tool-card">
                                <div class="tool-icon">
                                    <img src="{{ $tool['icon'] }}" alt="{{ $tool['name'] }} logo">
                                </div>
                                <span class="tool-name">{{ $tool['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
