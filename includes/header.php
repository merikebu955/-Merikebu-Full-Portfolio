<?php require_once __DIR__.'/../config/functions.php'; $siteName=setting($pdo,'site_name','Merikebu Gashu'); ?>
<!doctype html><html lang="en"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=e($pageTitle ?? $siteName)?> | Portfolio</title><meta name="description" content="Portfolio of Merikebu Gashu Mengesha, Full-Stack Web & Mobile Developer.">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
<link href="<?=BASE_URL?>/assets/css/style.css" rel="stylesheet"></head><body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top site-nav"><div class="container">
<a class="navbar-brand fw-bold" href="<?=BASE_URL?>/index.php"><span class="brand-mark">M</span> Merikebu<span class="accent">.</span></a>
<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="nav"><ul class="navbar-nav ms-auto align-items-lg-center">
<li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/#home">Home</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/about.php">About</a></li>
<li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/skills.php">Skills</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/#services">Services</a></li>
<li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/projects.php">Projects</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/certificates.php">Certificates</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/blog.php">Blog</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/experience.php">Journey</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/contact-page.php">Contact</a></li>
<li class="nav-item ms-lg-2"><button class="btn btn-sm btn-outline-light" id="themeToggle" aria-label="Toggle theme"><i class="fa-solid fa-sun"></i></button></li>
<?php if(logged_in()): ?><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/user/dashboard.php">My account</a></li><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/auth/logout.php">Logout</a></li>
<?php else: ?><li class="nav-item"><a class="nav-link" href="<?=BASE_URL?>/auth/login.php">Login</a></li><li class="nav-item"><a class="btn btn-accent btn-sm ms-lg-2" href="<?=BASE_URL?>/auth/register.php">Create account</a></li><?php endif; ?>
</ul></div></div></nav><main>
