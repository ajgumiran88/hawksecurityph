/**
 * HAWK Security v2.3 — restructure hero CTA and soften tactical labels
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

  function onReady(fn) {
    if (document.readyState === "loading") {
      document.addEventListener("DOMContentLoaded", fn);
    } else {
      fn();
    }
  }

  function injectHeaderCta() {
    if (document.querySelector(".pix-menu-center-logo-right .hawk-v2-header-cta")) {
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
    a.textContent = "Get a Quote";
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

  function upgradeSliderCta() {
    var links = document.querySelectorAll("sr7-content a.sr7-layer");
    links.forEach(function (a) {
      var t = (a.textContent || "").replace(/\s+/g, " ").trim().toUpperCase();
      if (t === "ABOUT US" || t.indexOf("ABOUT US") !== -1) {
        if (a.textContent !== cfg.quoteLabel) {
          a.textContent = cfg.quoteLabel;
        }
        a.setAttribute("href", cfg.contactUrl);
        a.classList.add("hawk-v2-slider-cta");
      }
    });
  }

  function watchSliderCta() {
    upgradeSliderCta();
    var content = document.querySelector("sr7-content");
    if (!content || content.getAttribute("data-hawk-cta") === "1") {
      return;
    }
    content.setAttribute("data-hawk-cta", "1");
    var obs = new MutationObserver(upgradeSliderCta);
    obs.observe(content, { childList: true, subtree: true, characterData: true });
    window.setTimeout(upgradeSliderCta, 400);
    window.setTimeout(upgradeSliderCta, 1200);
  }

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

  function onScroll() {
    if (window.scrollY > 8) {
      document.body.classList.add("hawk-v2-scrolled");
    } else {
      document.body.classList.remove("hawk-v2-scrolled");
    }
  }

  onReady(function () {
    document.body.classList.add("hawk-v2");
    injectHeaderCta();
    injectMobileCta();
    watchSliderCta();
    softenLabels();
    onScroll();
    window.addEventListener("scroll", onScroll, { passive: true });
  });
})();
