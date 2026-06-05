/**
 * ALP Astrology — Main JS
 * WordPress-adapted: header/footer rendered by PHP, this handles:
 * - Mobile nav toggle
 * - Resources dropdown toggle
 * - Outside-click dropdown close
 * - Scroll header shadow
 * - Reveal-on-scroll (IntersectionObserver)
 * - Count-up stats animation
 * - Contact form AJAX
 * - Newsletter form AJAX
 */

(function () {
  'use strict';

  /* ── DOM refs ── */
  const header    = document.getElementById('siteHeader');
  const navToggle = document.getElementById('navToggle');
  const navLinks  = document.getElementById('navLinks');
  const subToggles = document.querySelectorAll('.sub-toggle');

  /* ── Scroll: header shadow ── */
  function onScroll() {
    if (!header) return;
    if (window.scrollY > 30) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  }
  window.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ── Mobile nav toggle ── */
  if (navToggle && navLinks) {
    navToggle.addEventListener('click', function () {
      const isOpen = navLinks.classList.toggle('open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
      // Toggle icon between hamburger and X
      navToggle.innerHTML = isOpen
        ? '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>'
        : '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>';
    });
  }

  /* ── Dropdown toggle (mobile) ── */
  subToggles.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.stopPropagation();
      const parent = btn.closest('.has-sub');
      if (!parent) return;
      const wasOpen = parent.classList.contains('open');
      // Close all other dropdowns
      document.querySelectorAll('.has-sub.open').forEach(function (el) {
        el.classList.remove('open');
        const t = el.querySelector('.sub-toggle');
        if (t) t.setAttribute('aria-expanded', 'false');
      });
      if (!wasOpen) {
        parent.classList.add('open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });

  /* ── Close dropdowns on outside click ── */
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.has-sub')) {
      document.querySelectorAll('.has-sub.open').forEach(function (el) {
        el.classList.remove('open');
        const t = el.querySelector('.sub-toggle');
        if (t) t.setAttribute('aria-expanded', 'false');
      });
    }
  });

  /* ── Keyboard: close dropdown on Escape ── */
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      document.querySelectorAll('.has-sub.open').forEach(function (el) {
        el.classList.remove('open');
        const t = el.querySelector('.sub-toggle');
        if (t) t.setAttribute('aria-expanded', 'false');
      });
      if (navLinks && navLinks.classList.contains('open')) {
        navLinks.classList.remove('open');
        if (navToggle) navToggle.setAttribute('aria-expanded', 'false');
      }
    }
  });

  /* ── Reveal on scroll (IntersectionObserver) ── */
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length && 'IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
    );
    revealEls.forEach(function (el) {
      observer.observe(el);
    });
  } else {
    // Fallback: show all
    revealEls.forEach(function (el) {
      el.classList.add('in');
    });
  }

  /* ── Count-up animation ── */
  function animateCount(el, target, suffix) {
    const duration = 1800;
    const start    = performance.now();
    function step(now) {
      const elapsed  = now - start;
      const progress = Math.min(elapsed / duration, 1);
      // Ease out cubic
      const eased = 1 - Math.pow(1 - progress, 3);
      const value  = Math.round(eased * target);
      el.textContent = value + (suffix || '');
      if (progress < 1) {
        requestAnimationFrame(step);
      } else {
        el.textContent = target + (suffix || '');
      }
    }
    requestAnimationFrame(step);
  }

  const statEls = document.querySelectorAll('[data-count]');
  if (statEls.length && 'IntersectionObserver' in window) {
    const countObserver = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const el     = entry.target;
            const target = parseInt(el.getAttribute('data-count'), 10);
            const suffix = el.getAttribute('data-suffix') || '+';
            animateCount(el, target, suffix);
            countObserver.unobserve(el);
          }
        });
      },
      { threshold: 0.5 }
    );
    statEls.forEach(function (el) {
      countObserver.observe(el);
    });
  } else {
    statEls.forEach(function (el) {
      const target = parseInt(el.getAttribute('data-count'), 10);
      const suffix = el.getAttribute('data-suffix') || '+';
      el.textContent = target + suffix;
    });
  }

  /* ── AJAX helper ── */
  function alpAjax(action, data, onSuccess, onError) {
    if (typeof alpData === 'undefined') return;
    const params = new URLSearchParams(data);
    params.append('action', action);
    params.append('nonce', alpData.nonce);
    fetch(alpData.ajaxUrl, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: params.toString(),
    })
      .then(function (r) { return r.json(); })
      .then(function (json) {
        if (json.success) {
          onSuccess(json.data);
        } else {
          onError(json.data);
        }
      })
      .catch(function (err) {
        onError({ message: 'Network error. Please try again.' });
      });
  }

  /* ── Contact form ── */
  var contactForm = document.getElementById('alpContactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn    = document.getElementById('cfSubmit');
      var msgEl  = document.getElementById('cfMsg');
      var fd     = new FormData(contactForm);
      var data   = {};
      fd.forEach(function (v, k) { data[k] = v; });

      // Basic client-side validation
      if (!data.name || !data.email || !data.message) {
        showMsg(msgEl, 'error', 'Please fill in all required fields.');
        return;
      }

      if (btn) btn.classList.add('loading');

      alpAjax(
        'alp_contact',
        data,
        function (res) {
          if (btn) btn.classList.remove('loading');
          showMsg(msgEl, 'success', res.message || 'Message sent!');
          contactForm.reset();
        },
        function (res) {
          if (btn) btn.classList.remove('loading');
          showMsg(msgEl, 'error', (res && res.message) || 'Something went wrong.');
        }
      );
    });
  }

  /* ── Newsletter form (footer) ── */
  var newsForm = document.getElementById('footerNewsletterForm');
  if (newsForm) {
    newsForm.addEventListener('submit', function (e) {
      e.preventDefault();
      var msgEl  = document.getElementById('newsletterMsg');
      var emailEl = newsForm.querySelector('input[type="email"]');
      var email  = emailEl ? emailEl.value.trim() : '';
      if (!email) {
        showMsg(msgEl, 'error', 'Please enter your email address.');
        return;
      }
      alpAjax(
        'alp_newsletter',
        { email: email },
        function (res) {
          showMsg(msgEl, 'success', res.message || 'Subscribed!');
          newsForm.reset();
        },
        function (res) {
          showMsg(msgEl, 'error', (res && res.message) || 'Something went wrong.');
        }
      );
    });
  }

  /* ── Show message helper ── */
  function showMsg(el, type, text) {
    if (!el) return;
    el.textContent = text;
    el.className = 'form-msg show ' + type;
    setTimeout(function () {
      el.className = 'form-msg';
    }, 6000);
  }

  /* ── Smooth scroll for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      var id = link.getAttribute('href').slice(1);
      var target = document.getElementById(id);
      if (target) {
        e.preventDefault();
        var headerH = header ? header.offsetHeight : 0;
        var top = target.getBoundingClientRect().top + window.scrollY - headerH - 16;
        window.scrollTo({ top: top, behavior: 'smooth' });
      }
    });
  });

})();
