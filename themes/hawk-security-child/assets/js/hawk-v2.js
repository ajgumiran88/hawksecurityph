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

    if (!drawer) {
      return;
    }

    function openDrawer() {
      document.body.classList.add("hawk-v2-drawer-active");
      drawer.setAttribute("aria-hidden", "false");
      if (openBtn) {
        openBtn.setAttribute("aria-expanded", "true");
      }
    }

    function closeDrawer() {
      document.body.classList.remove("hawk-v2-drawer-active");
      drawer.setAttribute("aria-hidden", "true");
      if (openBtn) {
        openBtn.setAttribute("aria-expanded", "false");
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

  onReady(function () {
    document.documentElement.classList.add("hawk-v2-js");
    initMobileDrawer();
    initScrollHeader();
    softenLabels();
  });
})();
