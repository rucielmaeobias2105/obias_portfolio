<section class="work-section" id="projects">
    <div class="container">
        <span class="section-label">Selected Work</span>

        <div class="project-grid" id="project-grid">
            @foreach ($projects as $index => $proj)
                <div class="cert-slide project-card @if($index > 2) is-hidden @endif">
                    <div class="cert-thumb js-gallery"
                         data-gallery="{{ json_encode($proj['images']) }}"
                         data-caption="{{ $proj['title'] }}"
                         data-desc="{{ $proj['desc'] }}"
                         role="button"
                         tabindex="0"
                         title="View {{ $proj['title'] }}">
                        <img src="{{ $proj['images'][0] }}" alt="{{ $proj['title'] }} screenshot">
                        <div class="cert-caption">{{ count($proj['images']) > 1 ? 'View Gallery' : 'View Project' }}</div>
                    </div>
                    <div class="project-info">
                        <h3 class="project-title">{{ $proj['title'] }}</h3>
                        @if (!empty($proj['tags']))
                            <div class="project-tags">
                                @foreach ($proj['tags'] as $tag)
                                    <span class="project-tag">{{ $tag }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        @if (count($projects) > 2)
            <div class="project-toggle">
                <button class="btn btn-outline" id="projects-toggle" type="button">
                    <i class="fa-solid fa-chevron-down"></i> <span>See more projects</span>
                </button>
            </div>
        @endif
    </div>
</section>
