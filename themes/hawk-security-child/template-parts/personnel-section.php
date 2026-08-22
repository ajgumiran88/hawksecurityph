<?php
/**
 * Template part for displaying the Executive "Our Personnel" Tactical Showcase.
 *
 * @package Hawk_Security_Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="hawk-personnel-portal" aria-labelledby="hawk-personnel-heading">
  <div class="hawk-personnel-container">
    
    <header class="hawk-personnel-header">
      <div class="hawk-personnel-badge-cluster">
        <span class="hawk-pill">
          <span class="hawk-status-ping" aria-hidden="true"></span> HAWK TACTICAL FORCE • EST. 1987
        </span>
      </div>
      <h2 id="hawk-personnel-heading" class="hawk-main-title">Our <span class="hawk-text-accent">Personnel</span></h2>
      <p class="hawk-portal-desc">
        Employing rigorously vetted, highly trained security professionals affiliated with prestigious defense organizations. Equipped with modern tactical tools, continuous threat response drills, and recognized for steadfast vigilance.
      </p>
    </header>

    <div class="hawk-personnel-grid">

      <!-- Left Column: Core Competency Feature Matrix -->
      <div class="hawk-personnel-features">
        
        <div class="hawk-feature-card">
          <div class="hawk-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
          </div>
          <div class="hawk-feature-body">
            <h3>Affiliated with Prominent Security Organizations</h3>
            <p>Active standing with PADPAO and registered under PNP-SOSIA with strict compliance to national private security regulatory standards.</p>
          </div>
        </div>

        <div class="hawk-feature-card">
          <div class="hawk-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
          </div>
          <div class="hawk-feature-body">
            <h3>Up-to-Date Industry Knowledge</h3>
            <p>Continuous education in modern security protocols, cyber-physical threat vectors, and evolving risk mitigation practices.</p>
          </div>
        </div>

        <div class="hawk-feature-card">
          <div class="hawk-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
          </div>
          <div class="hawk-feature-body">
            <h3>Expertise in Security Operations</h3>
            <p>Specialized deployment across commercial towers, industrial cargo warehouses, gated residential communities, and VIP close protection.</p>
          </div>
        </div>

        <div class="hawk-feature-card">
          <div class="hawk-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
          </div>
          <div class="hawk-feature-body">
            <h3>Equipped & Ready for Duty</h3>
            <p>Fully uniform-standardized, equipped with encrypted comms, non-lethal and licensed firearms, and 24/7 central dispatch integration.</p>
          </div>
        </div>

        <div class="hawk-feature-card">
          <div class="hawk-feature-icon" aria-hidden="true">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          </div>
          <div class="hawk-feature-body">
            <h3>Recognized & Awarded</h3>
            <p>Decades of commended security service protecting top Philippine enterprises with zero critical breach incidents.</p>
          </div>
        </div>

      </div>

      <!-- Right Column: Visual Sliding Detachment Showcase -->
      <div class="hawk-personnel-visual">
        <div class="hawk-personnel-frame">
          <div class="hawk-bracket-tl" aria-hidden="true"></div>
          <div class="hawk-bracket-tr" aria-hidden="true"></div>
          <div class="hawk-bracket-bl" aria-hidden="true"></div>
          <div class="hawk-bracket-br" aria-hidden="true"></div>
          
          <!-- Image Slider / Carousel -->
          <div class="hawk-personnel-slider" id="hawkPersonnelSlider" data-autoplay="true" data-interval="4500" aria-label="HAWK Security Personnel Carousel">
            <div class="hawk-slider-track">
              <div class="hawk-slide active">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-20-21-351.jpg' ) ); ?>" alt="HAWK Security Guard Force In Formation">
              </div>
              <div class="hawk-slide">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-20-12-317.jpg' ) ); ?>" alt="HAWK Security Officers Briefing">
              </div>
              <div class="hawk-slide">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-20-06-185.jpg' ) ); ?>" alt="HAWK Security Detachment Inspection">
              </div>
              <div class="hawk-slide">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-20-19-635.jpg' ) ); ?>" alt="HAWK Security Guard Parade Readiness">
              </div>
              <div class="hawk-slide">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-20-10-992.jpg' ) ); ?>" alt="HAWK Security Detachment Operations">
              </div>
              <div class="hawk-slide">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2025/04/viber_image_2025-03-17_11-19-12-191.jpg' ) ); ?>" alt="HAWK Security Officers on Duty">
              </div>
            </div>

            <!-- Gradient Vignette -->
            <div class="hawk-personnel-overlay" aria-hidden="true"></div>

            <!-- Slider Navigation Controls -->
            <button class="hawk-slider-nav hawk-slider-prev" aria-label="Previous Detachment Photo" type="button">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="15 18 9 12 15 6"></polyline></svg>
            </button>
            <button class="hawk-slider-nav hawk-slider-next" aria-label="Next Detachment Photo" type="button">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </button>

            <!-- Slider Pagination Indicators -->
            <div class="hawk-slider-dots" role="tablist" aria-label="Slider Pagination">
              <button class="hawk-dot active" aria-label="Slide 1" data-index="0" type="button"></button>
              <button class="hawk-dot" aria-label="Slide 2" data-index="1" type="button"></button>
              <button class="hawk-dot" aria-label="Slide 3" data-index="2" type="button"></button>
              <button class="hawk-dot" aria-label="Slide 4" data-index="3" type="button"></button>
              <button class="hawk-dot" aria-label="Slide 5" data-index="4" type="button"></button>
              <button class="hawk-dot" aria-label="Slide 6" data-index="5" type="button"></button>
            </div>
          </div>

          <!-- Top Floating Badge -->
          <div class="hawk-personnel-badge-top" aria-hidden="true">
            <span class="hawk-status-ping"></span>
            <span>24/7 ACTIVE WATCH • FIELD READY</span>
          </div>

          <!-- Bottom Floating Stat Card -->
          <div class="hawk-personnel-stat-card" aria-hidden="true">
            <div class="hawk-stat-header">
              <strong>STANDARDS OF EXCELLENCE</strong>
            </div>
            <div class="hawk-stat-row">
              <div class="hawk-stat-item">
                <span class="hawk-stat-num">100%</span>
                <span class="hawk-stat-lbl">SOSIA Licensed</span>
              </div>
              <div class="hawk-stat-item">
                <span class="hawk-stat-num">35+</span>
                <span class="hawk-stat-lbl">Years Trusted</span>
              </div>
              <div class="hawk-stat-item">
                <span class="hawk-stat-num">24/7</span>
                <span class="hawk-stat-lbl">Dispatch Ready</span>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
