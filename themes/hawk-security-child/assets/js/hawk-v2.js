/**
 * HAWK Security v2 — light interaction helpers
 * Respects prefers-reduced-motion
 */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (reduceMotion) {
    return;
  }

  document.documentElement.classList.add('hawk-v2-js');

  // Placeholder for approved redesign motion (intersection fades, etc.)
})();
