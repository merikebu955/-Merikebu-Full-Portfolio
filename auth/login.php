<?php
require_once __DIR__.'/../config/functions.php'; $pageTitle='Login';$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){csrf_check();$email=trim($_POST['email']??'');$password=$_POST['password']??'';$q=$pdo->prepare('SELECT * FROM users WHERE email=? LIMIT 1');$q->execute([$email]);$u=$q->fetch();
if($u&&password_verify($password,$u['password_hash'])){session_regenerate_id(true);$_SESSION['user_id']=(int)$u['id'];$_SESSION['user_name']=$u['name'];$_SESSION['user_email']=$u['email'];$_SESSION['role']=$u['role'];go($u['role']==='admin'?'/admin/index.php':'/user/dashboard.php');}else $error='Incorrect email or password.';}
include __DIR__.'/../includes/header.php'; ?>
<section class="auth-section"><div class="auth-card"><h2>Welcome back</h2><p class="muted">Sign in to your account.</p><?php if($error):?><div class="alert alert-danger"><?=e($error)?></div><?php endif;?>
<form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><label>Email</label><input class="form-control mb-3" type="email" name="email" required><label>Password</label><input class="form-control mb-3" type="password" name="password" required><button class="btn btn-accent w-100">Login</button></form><p class="mt-3 mb-0">New here? <a href="register.php">Create an account</a></p><p class="small muted mt-3">Administrator? Use your administrator account here or open <a href="../admin/login.php">Admin login</a>.</p></div></section>
<?php include __DIR__.'/../includes/footer.php'; ?>
