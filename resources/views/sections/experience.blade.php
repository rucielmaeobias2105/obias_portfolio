<section class="exp-section" id="experience">
    <div class="container">
        <span class="section-label">Work Experience</span>

        <div class="exp-grid">
            @foreach ($experiences as $exp)
                <div class="exp-item">
                    <h3 class="exp-role">{{ $exp['role'] }}</h3>
                    <span class="exp-company">{{ $exp['company'] }}</span>
                    <div class="exp-dates">{{ $exp['dates'] }}</div>
                    @if (str_contains($exp['desc'], "\n"))
                        <ul class="exp-desc">
                            @foreach (explode("\n", $exp['desc']) as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p class="exp-desc">{{ $exp['desc'] }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
