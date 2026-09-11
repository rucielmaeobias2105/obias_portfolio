<footer class="footer" id="contact-footer">
    <div class="footer-inner">
        <div class="footer-grid">
            <div class="footer-contact">
                <div class="contact-col">
                    <span class="contact-icon-wrap"><i class="fa-solid fa-location-dot contact-icon"></i></span>
                    <span class="contact-item-label">Location</span>
                    <span class="contact-item-value">{{ $portfolio['location'] }}</span>
                </div>
                <div class="contact-col">
                    <span class="contact-icon-wrap"><i class="fa-solid fa-envelope contact-icon"></i></span>
                    <span class="contact-item-label">Email</span>
                    <a class="contact-item-value" href="mailto:{{ $portfolio['email'] }}">{{ $portfolio['email'] }}</a>
                </div>
                <div class="contact-col">
                    <span class="contact-icon-wrap"><i class="fa-solid fa-phone contact-icon"></i></span>
                    <span class="contact-item-label">Phone</span>
                    <a class="contact-item-value" href="tel:{{ $portfolio['phone'] }}">{{ $portfolio['phone'] }}</a>
                </div>
            </div>

            <div class="footer-badge">
                <img src="{{ $portfolio['portrait'] }}" alt="{{ $portfolio['name'] }} portrait">
            </div>
        </div>

        <div class="footer-bottom">
            <div>&copy; {{ date('Y') }} {{ $portfolio['name'] }}. All Rights Reserved.</div>
        </div>
    </div>
</footer>
