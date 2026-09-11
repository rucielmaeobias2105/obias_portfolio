<section class="contact-section" id="contact">
    <div class="container">
        <span class="section-label">Contact</span>

        <div class="contact-grid">
            <div class="contact-info">
                <div class="contact-line">
                    @include('components.icons.location')
                    {{ $portfolio['location'] }}
                </div>
                <div class="contact-line">
                    @include('components.icons.mail')
                    {{ $portfolio['email'] }}
                </div>
                <div class="contact-line">
                    @include('components.icons.github')
                    <a href="{{ $portfolio['github'] }}" target="_blank" rel="noopener">GitHub</a>
                </div>
                <div class="contact-line">
                    @include('components.icons.facebook')
                    <a href="{{ $portfolio['facebook'] }}" target="_blank" rel="noopener">Ruciel Mae Obias</a>
                </div>
                <div class="contact-line">
                    @include('components.icons.telegram')
                    <a href="https://t.me/{{ $portfolio['telegram'] }}" target="_blank" rel="noopener">{{ $portfolio['telegram'] }}</a>
                </div>
                
            </div>

            <form class="contact-card" action="#" method="post" onsubmit="return false;">
            <div class="form-group">
                <label for="cf-name">Name</label>
                <input class="form-input" type="text" id="cf-name" name="name" placeholder="Your name" required>
            </div>
            <div class="form-group">
                <label for="cf-email">Email</label>
                <input class="form-input" type="email" id="cf-email" name="email" placeholder="you@example.com" required>
            </div>
            <div class="form-group form-full">
                <label for="cf-message">Message</label>
                <textarea class="form-textarea" id="cf-message" name="message" placeholder="Tell me about your project..." required></textarea>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Send Message</button>
            </form>
        </div>
    </div>
</section>
