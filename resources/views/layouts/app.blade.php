<!DOCTYPE html>
<html lang="en" data-theme="dark" data-accent="gold">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $portfolio['name'] }} — {{ $portfolio['tagline'] }}">
    <title>E-PORTFOLIO | Ruciel Mae Obias</title>
    <link rel="icon" type="image/png" href="{{ asset('profile/tab_icon.png') }}">

    <script>
        (function () {
            try {
                var t = localStorage.getItem('portfolio-theme');
                if (!t) t = 'dark';
                document.documentElement.setAttribute('data-theme', t);
                document.documentElement.setAttribute('data-accent', 'gold');
            } catch (e) {}
        })();
    </script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>
<body>

    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Lightbox for project galleries --}}
    <div class="lightbox" id="lightbox" role="dialog" aria-modal="true" aria-label="Project gallery">
        <div class="lightbox-content">
            <button class="lightbox-close" id="lb-close" aria-label="Close gallery">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
            <button class="lightbox-nav prev" id="lb-prev" aria-label="Previous image">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>
            <button class="lightbox-nav next" id="lb-next" aria-label="Next image">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>
            <figure class="lightbox-img">
                <img id="lightbox-img" src="" alt="Project screenshot">
            </figure>
            <div class="lightbox-caption" id="lightbox-caption"></div>
        </div>
    </div>

    {{-- Certificate viewer modal --}}
    <div class="modal" id="cert-modal" role="dialog" aria-modal="true" aria-label="Certificate viewer">
        <div class="modal-content">
            <button class="modal-close" id="cert-modal-close" aria-label="Close certificate">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
            <div class="modal-head">
                <div>
                    <h3 id="cert-modal-title"></h3>
                    <div class="cert-sub" id="cert-modal-sub"></div>
                </div>
            </div>
            <div class="modal-frame cert-image-frame">
                <button class="cert-nav prev" id="cert-modal-prev" aria-label="Previous certificate">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>
                <button class="cert-nav next" id="cert-modal-next" aria-label="Next certificate">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>
                <img id="cert-modal-img" src="" alt="Certificate">
                <div class="cert-zoom-bar" id="cert-zoom-bar">
                    <button type="button" id="cert-zoom-out" aria-label="Zoom out">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M5 12h14"/></svg>
                    </button>
                    <button type="button" id="cert-zoom-reset" aria-label="Reset zoom">1x</button>
                    <button type="button" id="cert-zoom-in" aria-label="Zoom in">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- File viewer modal (Resume / PDS) --}}
    <div class="modal" id="file-modal" role="dialog" aria-modal="true" aria-label="Document viewer">
        <div class="modal-content">
            <button class="modal-close" id="file-modal-close" aria-label="Close document">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
            <div class="modal-head">
                <div>
                    <h3 id="file-modal-title"></h3>
                    <div class="cert-sub" id="file-modal-sub"></div>
                </div>
            </div>
            <div class="modal-frame">
                <iframe id="file-modal-frame" title="Document PDF"></iframe>
            </div>
            <div class="modal-actions">
                <button class="btn-primary btn" id="file-modal-download"><i class="fa-solid fa-download"></i> Download</button>
            </div>
        </div>
    </div>

    <button class="scroll-top" id="scroll-top" aria-label="Scroll to top">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>
    </button>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
