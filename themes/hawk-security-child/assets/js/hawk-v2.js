/**
 * HAWK Security v2 — header CTA, hero quote button, restrained motion
 */
(function () {
  "use strict";

  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  var cfg = window.hawkV2 || {
    homeUrl: "/",
    contactUrl: "/contacts/",
    quoteLabel: "Request a Security Quote",
  };

  document.documentElement.classList.add("hawk-v2-js");
  if (document.body) {
    document.body.classList.add("hawk-v2");
  }

  function onReady(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn);
    } else {
      fn();
    }
  }

  function injectHeaderCta() {
    if (document.querySelector(".hawk-v2-header-cta")) {
      return;
    }
    var rightNav = document.querySelector(".pix-menu-center-logo-right .main-menu");
    if (!rightNav) {
      return;
    }
    var li = document.createElement("li");
    li.className = "menu-item hawk-v2-header-cta-item";
    var a = document.createElement("a");
    a.className = "hawk-v2-header-cta";
    a.href = cfg.contactUrl;
    a.textContent = cfg.quoteLabel;
    li.appendChild(a);
    rightNav.appendChild(li);
  }

  function injectMobileCta() {
    var menu = document.getElementById("mobile-menu");
    if (!menu || menu.querySelector(".hawk-v2-header-cta")) {
      return;
    }
    var li = document.createElement("li");
    li.className = "menu-item";
    var a = document.createElement("a");
    a.className = "hawk-v2-header-cta";
    a.href = cfg.contactUrl;
    a.textContent = cfg.quoteLabel;
    li.appendChild(a);
    menu.appendChild(li);
  }

  function injectHeroCta() {
    if (!document.body.classList.contains("home")) {
      return;
    }
    if (document.querySelector(".hawk-v2-hero-cta-wrap")) {
      return;
    }
    var slider =
      document.querySelector("sr7-module") ||
      document.querySelector(".rev_slider_wrapper") ||
      document.querySelector(".wpb-content-wrapper");
    if (!slider || !slider.parentNode) {
      return;
    }
    var wrap = document.createElement("div");
    wrap.className = "hawk-v2-hero-cta-wrap";
    var primary = document.createElement("a");
    primary.className = "hawk-v2-btn-primary hawk-v2-hero-cta";
    primary.href = cfg.contactUrl;
    primary.textContent = cfg.quoteLabel;
    wrap.appendChild(primary);
    slider.parentNode.insertBefore(wrap, slider.nextSibling);
  }

  function observeReveal() {
    if (reduceMotion || !("IntersectionObserver" in window)) {
      return;
    }
    var nodes = document.querySelectorAll(
      ".hawk-card, .hawk-proc-link, .hawk-aff-card, .wpb_text_column, .custom-header"
    );
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("hawk-v2-reveal");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    nodes.forEach(function (el) {
      io.observe(el);
    });
  }

  function onScroll() {
    if (window.scrollY > 12) {
      document.body.classList.add("hawk-v2-scrolled");
    } else {
      document.body.classList.remove("hawk-v2-scrolled");
    }
  }

  onReady(function () {
    document.body.classList.add("hawk-v2");
    injectHeaderCta();
    injectMobileCta();
    injectHeroCta();
    observeReveal();
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  });
})();
