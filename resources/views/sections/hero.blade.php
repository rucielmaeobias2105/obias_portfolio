<section class="hero" id="home">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-copy">
                <h1 class="hero-headline">{{ $portfolio['headline'] }}<span class="accent-word">.</span></h1>

                <div class="hero-signature">{{ $portfolio['signature_name'] }}</div>
                <div class="hero-role">{{ $portfolio['role'] }}</div>

                <div class="hero-actions">
                    <a href="#projects" class="btn btn-outline"><i class="fa-solid fa-briefcase"></i> View My Work</a>
                    <a href="#contact" class="btn btn-outline"><i class="fa-solid fa-envelope"></i> Contact Me</a>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-blob" aria-hidden="true"></div>
                <div class="hero-photo-wrapper">
                    <div class="hero-photo-ring"></div>
                    <div class="hero-photo-frame">
                        <img src="{{ $portfolio['portrait'] }}" alt="Portrait of {{ $portfolio['name'] }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
