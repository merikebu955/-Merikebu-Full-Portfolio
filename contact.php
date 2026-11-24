<?php
require_once __DIR__.'/config/functions.php';
if($_SERVER['REQUEST_METHOD']!=='POST') go('/#contact');
csrf_check();
$name=trim($_POST['name']??''); $email=trim($_POST['email']??''); $subject=trim($_POST['subject']??''); $message=trim($_POST['message']??'');
if($name===''||!filter_var($email,FILTER_VALIDATE_EMAIL)||$subject===''||$message===''){flash('success','Please complete every field with a valid email address.');go('/#contact');}
$stmt=$pdo->prepare('INSERT INTO messages(name,email,subject,message,created_at) VALUES(?,?,?,?,NOW())');
$stmt->execute([$name,$email,$subject,$message]); flash('success','Thank you! Your message has been sent successfully.'); go('/#contact');
