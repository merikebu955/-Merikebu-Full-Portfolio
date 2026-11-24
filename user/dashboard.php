<?php
require_once __DIR__.'/../config/functions.php';require_login();$pageTitle='My account';
$q=$pdo->prepare('SELECT name,email,created_at FROM users WHERE id=?');$q->execute([$_SESSION['user_id']]);$me=$q->fetch();
include __DIR__.'/../includes/header.php'; ?>
<section class="auth-section"><div class="auth-card wide"><span class="eyebrow">MEMBER AREA</span><h2>Hello, <?=e($me['name']??$_SESSION['user_name'])?></h2><p class="muted">Your portfolio member account is active.</p><div class="info-panel"><div><strong>Name</strong><span><?=e($me['name']??'')?></span></div><div><strong>Email</strong><span><?=e($me['email']??'')?></span></div><div><strong>Member since</strong><span><?=e($me['created_at']??'')?></span></div><div><strong>Account type</strong><span>Registered user</span></div></div><a class="btn btn-outline-light mt-4" href="<?=BASE_URL?>/index.php">Back to portfolio</a> <a class="btn btn-accent mt-4" href="<?=BASE_URL?>/auth/logout.php">Logout</a></div></section>
<?php include __DIR__.'/../includes/footer.php'; ?>
