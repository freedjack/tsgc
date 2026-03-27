<?php
// includes/analytics.php
if (!function_exists('e')) {
  function e(string $s): string { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
}
?>
<?php if (defined('GA4_MEASUREMENT_ID') && GA4_MEASUREMENT_ID): ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=<?= e(GA4_MEASUREMENT_ID) ?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){ dataLayer.push(arguments); }
  gtag('js', new Date());
  gtag('config', '<?= e(GA4_MEASUREMENT_ID) ?>', { anonymize_ip: true });

  // Helper to track contact form submissions (call after Web3Forms success)
  window.trackContactSubmit = function() {
    gtag('event', 'contact_submit', { event_category: 'engagement' });
  };

  // Optional: Web Vitals to GA4 (self-host web-vitals for strict CSP)
  // (function(){
  //   var s = document.createElement('script');
  //   s.src = '/assets/js/web-vitals.iife.min.js'; // self-hosted copy
  //   s.onload = function(){
  //     function sendToGA(metric) {
  //       var val = metric.name === 'CLS' ? Math.round(metric.value * 1000) : Math.round(metric.value);
  //       gtag('event', metric.name, {
  //         value: val,
  //         event_category: 'Web Vitals',
  //         event_label: metric.id,
  //         non_interaction: true
  //       });
  //     }
  //     webVitals.onCLS(sendToGA);
  //     webVitals.onLCP(sendToGA);
  //     webVitals.onINP(sendToGA);
  //   };
  //   document.head.appendChild(s);
  // })();
</script>
<?php endif; ?>
