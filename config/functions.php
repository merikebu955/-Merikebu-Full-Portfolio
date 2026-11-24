<?php
require_once __DIR__.'/config.php';
function e($v): string { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
function go(string $path): never { header('Location: '.BASE_URL.$path); exit; }
function csrf_token(): string { if(empty($_SESSION['csrf'])) $_SESSION['csrf']=bin2hex(random_bytes(32)); return $_SESSION['csrf']; }
function csrf_check(): void {
    if($_SERVER['REQUEST_METHOD']==='POST' && !hash_equals($_SESSION['csrf'] ?? '', $_POST['csrf'] ?? '')) {
        http_response_code(419); exit('Invalid request token. Please go back and try again.');
    }
}
function logged_in(): bool { return !empty($_SESSION['user_id']); }
function is_admin(): bool { return ($_SESSION['role'] ?? '') === 'admin'; }
function require_login(): void { if(!logged_in()) go('/auth/login.php'); }
function require_admin(): void { if(!is_admin()) go('/admin/login.php'); }
function setting(PDO $pdo, string $key, string $default=''): string {
    $s=$pdo->prepare('SELECT setting_value FROM settings WHERE setting_key=?'); $s->execute([$key]); return (string)($s->fetchColumn() ?: $default);
}
function flash(string $key, ?string $value=null): ?string {
    if($value!==null){$_SESSION['flash'][$key]=$value;return null;}
    $v=$_SESSION['flash'][$key]??null; unset($_SESSION['flash'][$key]); return $v;
}
