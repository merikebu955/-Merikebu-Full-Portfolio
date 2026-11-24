<?php
require_once __DIR__.'/config/functions.php';
$email='admin@merikebu.local';$password='ChangeMe@12345';$name='Portfolio Administrator';
$q=$pdo->prepare("SELECT id FROM users WHERE email=?");$q->execute([$email]);
if($q->fetch()){exit('Admin already exists. Delete this setup_admin.php file now.');}
$pdo->prepare("INSERT INTO users(name,email,password_hash,role,created_at) VALUES(?,?,?,'admin',NOW())")->execute([$name,$email,password_hash($password,PASSWORD_DEFAULT)]);
echo 'Admin created successfully.<br>Email: '.$email.'<br>Password: '.$password.'<br><b>IMPORTANT: Log in, then delete setup_admin.php from your project folder and change this password.</b>';
