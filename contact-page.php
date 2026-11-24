<?php
$pageTitle = 'Contact';
require_once __DIR__.'/includes/header.php';
?>
<section class="contact-hero"><div class="container">
  <div class="contact-kicker"><span class="pulse-dot"></span> AVAILABLE FOR SELECT PROJECTS</div>
  <div class="row align-items-end gy-4"><div class="col-lg-8">
    <h1>Let's make<br><span>something meaningful.</span></h1>
    <p class="contact-lead">Have an idea, a project, or an opportunity? Tell me what you're building. I’ll get back to you as soon as I can.</p>
  </div><div class="col-lg-4 text-lg-end"><div class="contact-orbit"><i class="fa-solid fa-paper-plane"></i></div></div></div>
</div></section>
<section class="contact-page-section"><div class="container"><div class="row g-4 g-xl-5">
 <div class="col-lg-5"><div class="contact-info-card h-100">
  <span class="eyebrow">GET IN TOUCH</span><h2>Let’s talk about<br>your next idea.</h2>
  <p class="muted">I’m open to internships, junior developer roles, freelance work, collaborations and conversations about technology.</p>
  <a class="contact-detail" href="mailto:merikebgashu@gmail.com"><span class="contact-icon"><i class="fa-solid fa-envelope"></i></span><span><small>EMAIL</small><strong>merikebgashu@gmail.com</strong></span><i class="fa-solid fa-arrow-up-right-from-square ms-auto"></i></a>

  <a class="contact-detail" href="https://t.me/MerinovaComputer" target="_blank" rel="noopener"><span class="contact-icon"><i class="fa-brands fa-telegram"></i></span><span><small>TELEGRAM</small><strong>@MerinovaComputer</strong></span><i class="fa-solid fa-arrow-up-right-from-square ms-auto"></i></a>
  <div class="contact-socials">
   <a aria-label="GitHub" href="https://github.com/merikebu955" target="_blank" rel="noopener"><i class="fa-brands fa-github"></i></a>
   <a aria-label="LinkedIn" href="https://www.linkedin.com/in/merikebu-gashu-379061433" target="_blank" rel="noopener"><i class="fa-brands fa-linkedin-in"></i></a>
   <a aria-label="Instagram" href="https://www.instagram.com/merikewege" target="_blank" rel="noopener"><i class="fa-brands fa-instagram"></i></a>
   <a aria-label="X" href="https://x.com/MerikebG99484" target="_blank" rel="noopener"><i class="fa-brands fa-x-twitter"></i></a>
   <a aria-label="Facebook" href="https://web.facebook.com/merikewege" target="_blank" rel="noopener"><i class="fa-brands fa-facebook-f"></i></a>
  </div><div class="contact-note"><i class="fa-solid fa-shield-halved"></i> Your message is submitted securely and stored for the portfolio administrator.</div>
 </div></div>
 <div class="col-lg-7"><div class="contact-form-card">
  <div class="d-flex justify-content-between align-items-start gap-3 mb-4"><div><span class="eyebrow">SEND A MESSAGE</span><h2>Start a conversation</h2></div><span class="form-step">01 <i class="fa-solid fa-minus"></i> 04</span></div>
  <?php if($m=flash('success')): ?><div class="alert alert-success"><?=e($m)?></div><?php endif; ?>
  <form method="post" action="<?=BASE_URL?>/contact.php" class="smart-contact-form">
   <input type="hidden" name="csrf" value="<?=e(csrf_token())?>">
   <div class="row g-3">
    <div class="col-md-6"><label for="contactName">Your name</label><input id="contactName" class="form-control" name="name" placeholder="Your full name" required maxlength="100"></div>
    <div class="col-md-6"><label for="contactEmail">Your email</label><input id="contactEmail" class="form-control" type="email" name="email" placeholder="you@example.com" required maxlength="190"></div>
    <div class="col-12"><label for="contactSubject">What is this about?</label><input id="contactSubject" class="form-control" name="subject" placeholder="Project collaboration, opportunity..." required maxlength="180"></div>
    <div class="col-12"><label for="contactMessage">Tell me about it</label><textarea id="contactMessage" class="form-control" name="message" rows="6" placeholder="A little context about your idea, goals and timeline..." required maxlength="5000"></textarea><div class="form-hint">Please do not include passwords or sensitive personal information.</div></div>
    <div class="col-12 d-flex flex-wrap align-items-center justify-content-between gap-3 pt-2"><button class="btn btn-accent btn-lg px-4" type="submit">Send message <i class="fa-solid fa-arrow-right ms-2"></i></button><span class="form-hint"><i class="fa-regular fa-clock me-1"></i> I’ll reply as soon as possible</span></div>
   </div>
  </form>
 </div></div>
</div></div></section>
<?php require_once __DIR__.'/includes/footer.php'; ?>
