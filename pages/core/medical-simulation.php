<?php
// SEO settings
$page_title = 'Medical Simulation Training | OSCE & Clinical Communication';
$page_description = 'High-fidelity medical simulation training using professional actors for OSCEs, clinical communication, and patient interaction scenarios.';
$page_keywords = 'medical simulation, OSCE training, clinical communication, simulated patients, healthcare training, patient safety';

include __DIR__ . '/../../app/views/partials/header.php';
?>

<!-- Hero Section -->
<?php 
$hero_image = 'assets/images/optimized/large/jpg/SCIENTISTS.jpg'; // Using an existing suitable image
$hero_title = 'Medical Simulation & OSCE';
$hero_subtitle = 'High-fidelity clinical scenarios with professional simulated patients';
include __DIR__ . '/../../app/views/partials/hero.php';
?>

<!-- Introduction -->
<div class="container">
    <div class="content-card">
        <div class="text-content">
            <h2>The "Flight Simulator" for Healthcare</h2>
            <p>In medicine, a mistake can be life-changing. That’s why we provide a safe, high-stakes environment where healthcare professionals can practice critical skills before they touch a real patient.</p>
            <p>Our medical simulation training focuses on the human element of healthcare: clinical communication, breaking bad news, obtaining consent, and managing angry or distressed patients.</p>
        </div>
    </div>
</div>

<!-- Our Method Include -->
<?php include __DIR__ . '/../../app/views/partials/method-section.php'; ?>

<!-- Specific Offerings -->
<div class="container">
    <div class="content-grid">
        <div class="content-card">
            <h2>OSCE & Examinations</h2>
            <div class="outcomes">
                <p>We provide highly standardized simulated patients (SPs) for Objective Structured Clinical Examinations. Our actors are trained to:</p>
                <ul>
                    <li>Deliver consistent performances for every candidate</li>
                    <li>Portray specific clinical signs and emotional states</li>
                    <li>Provide constructive feedback from the patient's perspective</li>
                </ul>
            </div>
        </div>
        
        <div class="content-card">
            <h2>Clinical Communication</h2>
            <div class="outcomes">
                <p>Technical skill is only half the battle. We train clinicians in:</p>
                <ul>
                    <li><strong>Breaking Bad News:</strong> Delivering difficult diagnoses with empathy and clarity.</li>
                    <li><strong>De-escalation:</strong> Managing aggression or distress in A&E settings.</li>
                    <li><strong>Shared Decision Making:</strong> Navigating complex ethical dilemmas with families.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Contact CTA -->
<?php include __DIR__ . '/../../app/views/partials/cta-contact.php'; ?>

<?php include __DIR__ . '/../../app/views/partials/footer.php'; ?>
