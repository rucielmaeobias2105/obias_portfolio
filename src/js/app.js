/* Portfolio — interaction script */
(function () {
  'use strict';

  var ACCENT_KEY = 'portfolio-accent';
  var THEME_KEY = 'portfolio-theme';

  function storedTheme() {
    try { return localStorage.getItem(THEME_KEY) || 'dark'; } catch (e) { return 'dark'; }
  }
  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
  }

  function initTheme() {
    applyTheme(storedTheme());
  }

  document.addEventListener('DOMContentLoaded', function () {
    initTheme();

    /* Dark/light theme toggle */
    var themeToggle = document.getElementById('theme-toggle');
    if (themeToggle) {
      themeToggle.addEventListener('click', function () {
        var next = document.documentElement.getAttribute('data-theme') === 'light' ? 'dark' : 'light';
        applyTheme(next);
        try { localStorage.setItem(THEME_KEY, next); } catch (err) {}
      });
    }

    /* Mobile hamburger */
    var hamburger = document.getElementById('hamburger');
    var navLinks = document.getElementById('nav-links');
    if (hamburger && navLinks) {
      hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('open');
        navLinks.classList.toggle('open');
        hamburger.setAttribute('aria-expanded', navLinks.classList.contains('open'));
      });
      navLinks.querySelectorAll('a').forEach(function (a) {
        a.addEventListener('click', function () {
          hamburger.classList.remove('open');
          navLinks.classList.remove('open');
          hamburger.setAttribute('aria-expanded', 'false');
        });
      });
    }

    /* Active nav link on scroll */
    var sections = document.querySelectorAll('section[id]');
    var navAnchors = document.querySelectorAll('.nav-links a[href^="#"]');
    function setActive() {
      var scrollPos = window.scrollY + 120;
      var current = '';
      sections.forEach(function (sec) {
        if (scrollPos >= sec.offsetTop) { current = sec.getAttribute('id'); }
      });
      navAnchors.forEach(function (a) {
        a.classList.toggle('active', a.getAttribute('href') === '#' + current);
      });
    }
    window.addEventListener('scroll', setActive);
    setActive();

    /* Scroll header shadow */
    var navbar = document.querySelector('.navbar');
    function scrollHeader() {
      if (navbar) navbar.classList.toggle('scrolled', window.scrollY >= 80);
    }
    window.addEventListener('scroll', scrollHeader);
    scrollHeader();

    /* Section reveal on scroll (IntersectionObserver) */
    var revealSections = document.querySelectorAll('main > section');
    if ('IntersectionObserver' in window) {
      var revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('revealed');
            revealObserver.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12 });
      revealSections.forEach(function (sec) { revealObserver.observe(sec); });
    } else {
      revealSections.forEach(function (sec) { sec.classList.add('revealed'); });
    }

    /* Lightbox */
    var lightbox = document.getElementById('lightbox');
    var lightboxImg = document.getElementById('lightbox-img');
    
    var lightboxSlides = [];
    var lightboxIndex = 0;

    function openLightbox(slides, index, caption, desc) {
      if (slides.length === 0) return;
      lightboxSlides = slides;
      lightboxIndex = index;

      var titleEl = document.getElementById('lightbox-title');
      if (titleEl) titleEl.textContent = caption;

      var descEl = document.getElementById('lightbox-desc');
      if (descEl) descEl.textContent = desc || '';

      renderLightbox();
      lightbox.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
      lightbox.classList.remove('open');
      document.body.style.overflow = '';
    }
    function renderLightbox() {
      lightboxImg.src = lightboxSlides[lightboxIndex];
      updateNavBtns();
    }
    function moveLightbox(dir) {
      lightboxIndex = (lightboxIndex + dir + lightboxSlides.length) % lightboxSlides.length;
      renderLightbox();
    }
    function updateNavBtns() {
      var prev = document.getElementById('lb-prev');
      var next = document.getElementById('lb-next');
      var multi = lightboxSlides.length > 1;
      if (prev) prev.style.display = multi ? 'flex' : 'none';
      if (next) next.style.display = multi ? 'flex' : 'none';
    }

    document.querySelectorAll('.js-gallery').forEach(function (el) {
      el.addEventListener('click', function () {
        var slides = JSON.parse(el.getAttribute('data-gallery'));
        var caption = el.getAttribute('data-caption');
        var desc = el.getAttribute('data-desc') || '';
        openLightbox(slides, 0, caption, desc);
      });
    });
    var lbPrev = document.getElementById('lb-prev');
    var lbNext = document.getElementById('lb-next');
    var lbClose = document.getElementById('lb-close');
    if (lbPrev) lbPrev.addEventListener('click', function () { moveLightbox(-1); });
    if (lbNext) lbNext.addEventListener('click', function () { moveLightbox(1); });
    if (lbClose) lbClose.addEventListener('click', closeLightbox);
    if (lightbox) {
      lightbox.addEventListener('click', function (e) {
        if (e.target === lightbox) closeLightbox();
      });
    }

    /* Certificate image modal */
    var certModal = document.getElementById('cert-modal');
    var certModalImg = document.getElementById('cert-modal-img');
    var certModalTitle = document.getElementById('cert-modal-title');
    var certModalSub = document.getElementById('cert-modal-sub');
    var certSlides = [];
    var certIndex = 0;

    document.querySelectorAll('.js-cert-open').forEach(function (el, i) {
      var org = el.getAttribute('data-org') || '';
      var date = el.getAttribute('data-date') || '';
      certSlides.push({
        url: el.getAttribute('data-img'),
        title: el.getAttribute('data-title'),
        sub: org + (date ? ' \u2022 ' + date : '')
      });
      el.addEventListener('click', function () { openCertModal(i); });
      el.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          openCertModal(i);
        }
      });
    });

    function renderCert() {
      var slide = certSlides[certIndex];
      certModalImg.src = slide.url;
      certModalTitle.textContent = slide.title;
      certModalSub.textContent = slide.sub;
      certZoom = 1;
      certPanX = 0;
      certPanY = 0;
      applyCertZoom();
      updateCertNavBtns();
    }
    function openCertModal(index) {
      if (certSlides.length === 0) return;
      certIndex = index;
      renderCert();
      certModal.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
    function moveCert(dir) {
      certIndex = (certIndex + dir + certSlides.length) % certSlides.length;
      renderCert();
    }
    function updateCertNavBtns() {
      var prev = document.getElementById('cert-modal-prev');
      var next = document.getElementById('cert-modal-next');
      var multi = certSlides.length > 1;
      if (prev) prev.style.display = multi ? 'inline-flex' : 'none';
      if (next) next.style.display = multi ? 'inline-flex' : 'none';
    }
    function closeCertModal() {
      certModal.classList.remove('open');
      certModalImg.src = '';
      document.body.style.overflow = '';
      certPanX = 0;
      certPanY = 0;
      setCertZoom(1);
    }
    var certModalPrev = document.getElementById('cert-modal-prev');
    var certModalNext = document.getElementById('cert-modal-next');
    if (certModalPrev) certModalPrev.addEventListener('click', function () { moveCert(-1); });
    if (certModalNext) certModalNext.addEventListener('click', function () { moveCert(1); });
    var certModalClose = document.getElementById('cert-modal-close');
    if (certModalClose) certModalClose.addEventListener('click', closeCertModal);
    if (certModal) certModal.addEventListener('click', function (e) {
      if (e.target === certModal) closeCertModal();
    });

    /* Certificate zoom */
    var certZoom = 1;
    var certZoomMin = 1;
    var certZoomMax = 5;
    var certPanX = 0;
    var certPanY = 0;
    var certDragging = false;
    var certDragStartX = 0;
    var certDragStartY = 0;
    var certPanStartX = 0;
    var certPanStartY = 0;
    var certZoomResetBtn = document.getElementById('cert-zoom-reset');

    function applyCertZoom() {
      certModalImg.style.transform = 'translate(' + certPanX + 'px, ' + certPanY + 'px) scale(' + certZoom + ')';
      if (certZoomResetBtn) certZoomResetBtn.textContent = certZoom.toFixed(1) + 'x';
      if (certImageFrame) {
        if (certZoom > 1) {
          certImageFrame.classList.add('cert-zoomed');
        } else {
          certImageFrame.classList.remove('cert-zoomed');
        }
      }
    }
    function setCertZoom(zoom) {
      certZoom = Math.max(certZoomMin, Math.min(certZoomMax, Math.round(zoom * 10) / 10));
      if (certZoom <= 1) { certPanX = 0; certPanY = 0; }
      applyCertZoom();
    }
    function adjustCertZoom(delta) { setCertZoom(certZoom + delta); }
    var certZoomIn = document.getElementById('cert-zoom-in');
    var certZoomOut = document.getElementById('cert-zoom-out');
    if (certZoomIn) certZoomIn.addEventListener('click', function () { adjustCertZoom(0.5); });
    if (certZoomOut) certZoomOut.addEventListener('click', function () { adjustCertZoom(-0.5); });
    if (certZoomResetBtn) certZoomResetBtn.addEventListener('click', function () { setCertZoom(1); });
    var certImageFrame = document.querySelector('.cert-image-frame');
    if (certImageFrame) {
      certImageFrame.addEventListener('wheel', function (e) {
        if (!certModal.classList.contains('open')) return;
        e.preventDefault();
        adjustCertZoom(e.deltaY < 0 ? 0.25 : -0.25);
      }, { passive: false });

      /* Drag-to-pan when zoomed */
      certImageFrame.addEventListener('mousedown', function (e) {
        if (!certModal.classList.contains('open') || certZoom <= 1) return;
        if (e.target.closest('.cert-nav')) return;
        certDragging = true;
        certDragStartX = e.clientX;
        certDragStartY = e.clientY;
        certPanStartX = certPanX;
        certPanStartY = certPanY;
        certImageFrame.classList.add('cert-dragging');
        e.preventDefault();
      });
      document.addEventListener('mousemove', function (e) {
        if (!certDragging) return;
        certPanX = certPanStartX + (e.clientX - certDragStartX);
        certPanY = certPanStartY + (e.clientY - certDragStartY);
        applyCertZoom();
      });
      document.addEventListener('mouseup', function () {
        if (!certDragging) return;
        certDragging = false;
        if (certImageFrame) certImageFrame.classList.remove('cert-dragging');
      });

      /* Touch support for mobile */
      certImageFrame.addEventListener('touchstart', function (e) {
        if (!certModal.classList.contains('open') || certZoom <= 1) return;
        if (e.touches.length === 1) {
          certDragging = true;
          certDragStartX = e.touches[0].clientX;
          certDragStartY = e.touches[0].clientY;
          certPanStartX = certPanX;
          certPanStartY = certPanY;
        }
      }, { passive: true });
      certImageFrame.addEventListener('touchmove', function (e) {
        if (!certDragging || e.touches.length !== 1) return;
        e.preventDefault();
        certPanX = certPanStartX + (e.touches[0].clientX - certDragStartX);
        certPanY = certPanStartY + (e.touches[0].clientY - certDragStartY);
        applyCertZoom();
      }, { passive: false });
      certImageFrame.addEventListener('touchend', function () {
        certDragging = false;
      });

      /* Double-click to toggle zoom */
      certImageFrame.addEventListener('dblclick', function () {
        if (!certModal.classList.contains('open')) return;
        if (certZoom > 1) { setCertZoom(1); }
        else { setCertZoom(2.5); }
      });
    }

    /* File viewer modal (Resume / PDS) */
    var fileModal = document.getElementById('file-modal');
    var fileModalFrame = document.getElementById('file-modal-frame');
    var fileModalTitle = document.getElementById('file-modal-title');
    var fileModalSub = document.getElementById('file-modal-sub');
    var fileModalDownload = document.getElementById('file-modal-download');

    function openFileModal(url, title, sub) {
      fileModalFrame.src = url;
      fileModalTitle.textContent = title;
      fileModalSub.textContent = sub;
      fileModal.classList.add('open');
      document.body.style.overflow = 'hidden';
    }
    function closeFileModal() {
      fileModal.classList.remove('open');
      fileModalFrame.src = '';
      document.body.style.overflow = '';
    }
    document.querySelectorAll('.js-file-open').forEach(function (el) {
      el.addEventListener('click', function () {
        openFileModal(el.getAttribute('data-pdf'), el.getAttribute('data-title'), el.getAttribute('data-sub'));
      });
    });
    if (fileModalDownload) fileModalDownload.addEventListener('click', function () {
      var a = document.createElement('a');
      a.href = fileModalFrame.src;
      a.download = '';
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
    });
    var fileModalClose = document.getElementById('file-modal-close');
    if (fileModalClose) fileModalClose.addEventListener('click', closeFileModal);
    if (fileModal) fileModal.addEventListener('click', function (e) {
      if (e.target === fileModal) closeFileModal();
    });

    /* Certificate slider arrows */
    var track = document.getElementById('cert-track');
    var prevBtn = document.getElementById('cert-prev');
    var nextBtn = document.getElementById('cert-next');
    if (track && prevBtn && nextBtn) {
      prevBtn.addEventListener('click', function () { track.scrollBy({ left: -340, behavior: 'smooth' }); });
      nextBtn.addEventListener('click', function () { track.scrollBy({ left: 340, behavior: 'smooth' }); });
    }

    /* Projects see more / see less */
    var projectsToggle = document.getElementById('projects-toggle');
    if (projectsToggle) {
      projectsToggle.addEventListener('click', function () {
        var expanded = projectsToggle.classList.toggle('expanded');
        document.querySelectorAll('.project-card').forEach(function (card, i) {
          card.classList.toggle('is-hidden', !expanded && i > 2);
        });
        projectsToggle.innerHTML = expanded ? '<i class="fa-solid fa-chevron-up"></i> <span>See less projects</span>' : '<i class="fa-solid fa-chevron-down"></i> <span>See more projects</span>';
      });
    }

    /* Scroll to top */
    var scrollTop = document.getElementById('scroll-top');
    if (scrollTop) {
      window.addEventListener('scroll', function () {
        scrollTop.classList.toggle('show', window.scrollY > 500);
      });
      scrollTop.addEventListener('click', function () { window.scrollTo({ top: 0, behavior: 'smooth' }); });
    }

    /* Global Escape to close overlays */
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') {
        closeLightbox();
        closeCertModal();
        closeFileModal();
        return;
      }
      if (certModal && certModal.classList.contains('open') && certSlides.length > 1) {
        if (e.key === 'ArrowLeft') { moveCert(-1); e.preventDefault(); }
        else if (e.key === 'ArrowRight') { moveCert(1); e.preventDefault(); }
      }
    });
  });

  // Apply saved theme before page fully paints (anti-FOUC)
  (function () {
    try {
      document.documentElement.setAttribute('data-theme', storedTheme());
      document.documentElement.setAttribute('data-accent', 'gold');
    } catch (e) {}
  })();
})();
