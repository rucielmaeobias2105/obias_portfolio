<section class="edu-section" id="education">
    <div class="container">
        <span class="section-label">Education</span>
        <p class="section-desc">My academic journey and the foundations that shaped my expertise.</p>

        <div class="edu-list">
            @foreach ($portfolio['education'] as $edu)
                <div class="edu-item">
                    <h4>{{ $edu['school'] }}</h4>
                    <span class="edu-years">{{ $edu['years'] }} &middot; {{ $edu['degree'] }}</span>
                    <p>{{ $edu['note'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
