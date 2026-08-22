/**
 * HAWK Security Child Theme — Native Chrome Interactions
 *
 * Handles mobile drawer toggle, scroll header state, and accessible interactions.
 * Obsolete Revolution Slider observer and header DOM injection hacks have been removed.
 *
 * @package Hawk_Security_Child
 */

(function () {
  "use strict";

  var cfg = window.hawkV2 || {
    homeUrl: "/",
    contactUrl: "/contacts/",
    quoteLabel: "Request a Security Quote",
  };

  function onReady(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn);
    } else {
      fn();
    }
  }

  /**
   * Mobile navigation drawer toggle.
   */
  function initMobileDrawer() {
    var openBtn = document.querySelector(".js-hawk-drawer-open");
    var closeBtns = document.querySelectorAll(".js-hawk-drawer-close");
    var drawer = document.getElementById("hawk-v2-mobile-drawer");
    var panel = drawer ? drawer.querySelector(".hawk-v2-drawer-panel") : null;
    var closeButton = drawer ? drawer.querySelector(".hawk-v2-drawer-close") : null;
    var triggerElement = null;

    if (!drawer) {
      return;
    }

    function getDrawerFocusableElements() {
      if (!panel) {
        return [];
      }

      return Array.prototype.slice.call(
        panel.querySelectorAll(
          'a[href], button:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )
      );
    }

    function trapDrawerFocus(event) {
      if (
        event.key !== "Tab" ||
        !document.body.classList.contains("hawk-v2-drawer-active")
      ) {
        return;
      }

      var focusable = getDrawerFocusableElements();
      if (!focusable.length) {
        event.preventDefault();
        return;
      }

      var first = focusable[0];
      var last = focusable[focusable.length - 1];
      if (event.shiftKey && document.activeElement === first) {
        event.preventDefault();
        last.focus();
      } else if (!event.shiftKey && document.activeElement === last) {
        event.preventDefault();
        first.focus();
      }
    }

    function openDrawer() {
      triggerElement = document.activeElement;
      document.body.classList.add("hawk-v2-drawer-active");
      drawer.setAttribute("aria-hidden", "false");
      if (openBtn) {
        openBtn.setAttribute("aria-expanded", "true");
      }
      window.setTimeout(function () {
        if (closeButton) {
          closeButton.focus();
        }
      }, 0);
    }

    function closeDrawer() {
      document.body.classList.remove("hawk-v2-drawer-active");
      drawer.setAttribute("aria-hidden", "true");
      if (openBtn) {
        openBtn.setAttribute("aria-expanded", "false");
      }
      if (triggerElement && typeof triggerElement.focus === "function") {
        triggerElement.focus();
      }
    }

    if (openBtn) {
      openBtn.addEventListener("click", function (e) {
        e.preventDefault();
        openDrawer();
      });
    }

    closeBtns.forEach(function (btn) {
      btn.addEventListener("click", function (e) {
        e.preventDefault();
        closeDrawer();
      });
    });

    // Close on escape key
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && document.body.classList.contains("hawk-v2-drawer-active")) {
        closeDrawer();
      }
      trapDrawerFocus(e);
    });

    // Close on clicking links in the drawer
    var drawerLinks = drawer.querySelectorAll("a");
    drawerLinks.forEach(function (link) {
      link.addEventListener("click", function () {
        closeDrawer();
      });
    });
  }

  /**
   * Sticky header shadow & compact state on scroll.
   */
  function initScrollHeader() {
    var masthead = document.getElementById("hawk-v2-masthead");
    if (!masthead) {
      return;
    }

    function onScroll() {
      if (window.scrollY > 15) {
        masthead.classList.add("hawk-v2-scrolled");
        document.body.classList.add("hawk-v2-scrolled");
      } else {
        masthead.classList.remove("hawk-v2-scrolled");
        document.body.classList.remove("hawk-v2-scrolled");
      }
    }

    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  }

  /**
   * Refine tactical process labels on legacy WPBakery cards if present.
   */
  function softenLabels() {
    var process = document.querySelectorAll(".hawk-proc-tag");
    var processMap = ["01  Consultation", "02  Assessment", "03  Deployment"];
    process.forEach(function (el, i) {
      if (processMap[i]) {
        el.textContent = processMap[i];
      }
    });

    document.querySelectorAll(".hawk-clean-badge").forEach(function (el) {
      el.lastChild && el.lastChild.nodeType === 3
        ? (el.lastChild.textContent = " Security Services")
        : null;
      var text = el.textContent || "";
      if (/OPERATIONAL|SYSTEM STATUS/i.test(text)) {
        var ping = el.querySelector(".hawk-clean-ping");
        el.textContent = "";
        if (ping) {
          el.appendChild(ping);
        }
        el.appendChild(document.createTextNode(" Security Services"));
      }
    });

    document.querySelectorAll(".hawk-proc-badge").forEach(function (el) {
      if (/ENGAGEMENT PROTOCOL|PIPELINE/i.test(el.textContent || "")) {
        var ping = el.querySelector(".hawk-proc-ping");
        el.textContent = "";
        if (ping) {
          el.appendChild(ping);
        }
        el.appendChild(document.createTextNode(" How we engage"));
      }
    });
  }

  /**
   * Initializes the tactical image slider for the Our Personnel section.
   */
  function initPersonnelSlider() {
    var slider = document.getElementById("hawkPersonnelSlider");
    if (!slider) {
      return;
    }

    var slides = slider.querySelectorAll(".hawk-slide");
    var dots = slider.querySelectorAll(".hawk-dot");
    var prevBtn = slider.querySelector(".hawk-slider-prev");
    var nextBtn = slider.querySelector(".hawk-slider-next");

    if (!slides.length) {
      return;
    }

    var currentIndex = 0;
    var timer = null;
    var interval = parseInt(slider.getAttribute("data-interval"), 10) || 4500;

    function goToSlide(index) {
      if (index < 0) {
        index = slides.length - 1;
      } else if (index >= slides.length) {
        index = 0;
      }

      currentIndex = index;

      slides.forEach(function (slide, idx) {
        if (idx === currentIndex) {
          slide.classList.add("active");
        } else {
          slide.classList.remove("active");
        }
      });

      dots.forEach(function (dot, idx) {
        if (idx === currentIndex) {
          dot.classList.add("active");
          dot.setAttribute("aria-current", "true");
        } else {
          dot.classList.remove("active");
          dot.removeAttribute("aria-current");
        }
      });
    }

    function startAutoPlay() {
      stopAutoPlay();
      timer = window.setInterval(function () {
        goToSlide(currentIndex + 1);
      }, interval);
    }

    function stopAutoPlay() {
      if (timer) {
        window.clearInterval(timer);
        timer = null;
      }
    }

    if (prevBtn) {
      prevBtn.addEventListener("click", function (e) {
        e.preventDefault();
        goToSlide(currentIndex - 1);
        startAutoPlay();
      });
    }

    if (nextBtn) {
      nextBtn.addEventListener("click", function (e) {
        e.preventDefault();
        goToSlide(currentIndex + 1);
        startAutoPlay();
      });
    }

    dots.forEach(function (dot) {
      dot.addEventListener("click", function (e) {
        e.preventDefault();
        var idx = parseInt(dot.getAttribute("data-index"), 10);
        if (!isNaN(idx)) {
          goToSlide(idx);
          startAutoPlay();
        }
      });
    });

    slider.addEventListener("mouseenter", stopAutoPlay);
    slider.addEventListener("mouseleave", startAutoPlay);

    // Touch swipe support for mobile devices
    var touchStartX = 0;
    var touchEndX = 0;
    slider.addEventListener("touchstart", function (e) {
      touchStartX = e.changedTouches[0].screenX;
      stopAutoPlay();
    }, { passive: true });

    slider.addEventListener("touchend", function (e) {
      touchEndX = e.changedTouches[0].screenX;
      if (touchStartX - touchEndX > 45) {
        goToSlide(currentIndex + 1);
      } else if (touchEndX - touchStartX > 45) {
        goToSlide(currentIndex - 1);
      }
      startAutoPlay();
    }, { passive: true });

    goToSlide(0);
    startAutoPlay();
  }

  onReady(function () {
    document.documentElement.classList.add("hawk-v2-js");
    initMobileDrawer();
    initScrollHeader();
    softenLabels();
    initPersonnelSlider();
  });
})();
