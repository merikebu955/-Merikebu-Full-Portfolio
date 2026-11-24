<?php
require_once __DIR__.'/../config/functions.php';require_admin();$pageTitle='Admin dashboard';csrf_check();
$allowed=['projects'=>['title','description','technologies','project_url','image','is_published','sort_order'],'skills'=>['name','category','level','sort_order'],'services'=>['title','description','icon','is_active','sort_order'],'certificates'=>['title','issuer','category','description','skills_gained','issue_date','credential_url','certificate_file','sort_order'],'blog_posts'=>['title','slug','excerpt','content','category','published','published_at'],'experiences'=>['role','organization','period','description','highlights','sort_order'],'achievements'=>['label','value','description','sort_order']];
$tab=$_GET['tab']??'overview';if(!in_array($tab,['overview','projects','skills','services','certificates','blog_posts','experiences','achievements','users','messages'],true))$tab='overview';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $action=$_POST['action']??'';
  if($action==='delete_message'){$pdo->prepare('DELETE FROM messages WHERE id=?')->execute([(int)$_POST['id']]);}
  elseif($action==='delete_user'){$pdo->prepare("DELETE FROM users WHERE id=? AND role='user'")->execute([(int)$_POST['id']]);}
  elseif($action==='delete_record' && isset($allowed[$tab])){$pdo->prepare("DELETE FROM $tab WHERE id=?")->execute([(int)$_POST['id']]);}
  elseif(isset($allowed[$tab])){
    $fields=$allowed[$tab];$id=(int)($_POST['id']??0);$data=[];
    foreach($fields as $f){if(in_array($f,['is_published','is_active','published']))$data[$f]=isset($_POST[$f])?1:0;else $data[$f]=trim((string)($_POST[$f]??''));}
    if($tab==='certificates') unset($data['certificate_file']); // Keep the current file unless a new upload is supplied.
    if($tab==='skills')$data['level']=max(0,min(100,(int)$data['level']));
    if($tab==='blog_posts' && !$data['published_at'])$data['published_at']=date('Y-m-d H:i:s');
    if($tab==='projects' && isset($_FILES['image_file']) && $_FILES['image_file']['error']===UPLOAD_ERR_OK){
      $ext=strtolower(pathinfo($_FILES['image_file']['name'],PATHINFO_EXTENSION));
      if(in_array($ext,['jpg','jpeg','png','webp']) && $_FILES['image_file']['size']<4*1024*1024){
        $new='assets/uploads/'.bin2hex(random_bytes(8)).'.'.$ext;move_uploaded_file($_FILES['image_file']['tmp_name'],dirname(__DIR__).'/'.$new);$data['image']=$new;
      }
    }
    if($tab==='certificates' && isset($_FILES['certificate_upload']) && $_FILES['certificate_upload']['error']!==UPLOAD_ERR_NO_FILE){
      $upload=$_FILES['certificate_upload'];
      if($upload['error']!==UPLOAD_ERR_OK){http_response_code(400);exit('Certificate upload failed. Please try again.');}
      if($upload['size']>8*1024*1024){http_response_code(400);exit('Certificate file must be 8MB or smaller.');}
      $finfo=new finfo(FILEINFO_MIME_TYPE);$mime=$finfo->file($upload['tmp_name']);
      $types=['application/pdf'=>'pdf','image/jpeg'=>'jpg','image/png'=>'png','image/webp'=>'webp'];
      if(!isset($types[$mime])){http_response_code(400);exit('Only PDF, JPG, PNG and WebP certificate files are allowed.');}
      $folder=dirname(__DIR__).'/assets/uploads/certificates';
      if(!is_dir($folder) && !mkdir($folder,0755,true)){http_response_code(500);exit('Could not create certificate upload folder.');}
      $filename=bin2hex(random_bytes(16)).'.'.$types[$mime];
      if(!move_uploaded_file($upload['tmp_name'],$folder.'/'.$filename)){http_response_code(500);exit('Could not save the uploaded certificate.');}
      $data['certificate_file']='assets/uploads/certificates/'.$filename;
    }
    if($id){$sets=implode(',',array_map(fn($f)=>"$f=?",array_keys($data)));$vals=array_values($data);$vals[]=$id;$pdo->prepare("UPDATE $tab SET $sets WHERE id=?")->execute($vals);}
    else{$cols=array_keys($data);$sql="INSERT INTO $tab (".implode(',',$cols).") VALUES (".implode(',',array_fill(0,count($cols),'?')).")";$pdo->prepare($sql)->execute(array_values($data));}
  }
  go('/admin/index.php?tab='.$tab);
}
$counts=[];foreach(['projects','skills','services','certificates','blog_posts','experiences','achievements','users','messages'] as $t)$counts[$t]=(int)$pdo->query("SELECT COUNT(*) FROM $t")->fetchColumn();
$rows=[];$editRow=null;
if(in_array($tab,['projects','skills','services','certificates','blog_posts','experiences','achievements','users','messages'])){$rows=$pdo->query("SELECT * FROM $tab ORDER BY id DESC LIMIT 200")->fetchAll();}
if(isset($allowed[$tab]) && isset($_GET['edit'])){$q=$pdo->prepare("SELECT * FROM $tab WHERE id=?");$q->execute([(int)$_GET['edit']]);$editRow=$q->fetch() ?: null;}
include __DIR__.'/../includes/header.php';
?>
<section class="admin-wrap"><div class="container-fluid"><div class="d-flex flex-wrap justify-content-between align-items-center mb-4"><div><span class="eyebrow">CONTROL CENTER</span><h1 class="h2">Admin dashboard</h1></div><a class="btn btn-outline-light" href="<?=BASE_URL?>/auth/logout.php">Logout</a></div>
<div class="admin-tabs"><?php foreach(['overview','projects','skills','services','certificates','blog_posts','experiences','achievements','users','messages'] as $t):?><a class="<?=($tab===$t?'active':'')?>" href="?tab=<?=$t?>"><?=ucfirst($t)?></a><?php endforeach;?></div>
<?php if($tab==='overview'):?><div class="row g-3"><?php foreach($counts as $k=>$v):?><div class="col-6 col-lg-2"><div class="stat-card"><span><?=ucfirst($k)?></span><strong><?=$v?></strong></div></div><?php endforeach;?></div><div class="admin-panel mt-4"><h3>Welcome, <?=e($_SESSION['user_name'])?></h3><p class="muted">Manage portfolio content, registered users and contact messages. Changes are saved directly to MySQL.</p></div>
<?php elseif(isset($allowed[$tab])):?>
<div class="admin-panel mb-4"><h3><?= $editRow ? 'Edit' : 'Add' ?> <?=rtrim($tab,'s')?></h3><form method="post" enctype="multipart/form-data" class="row g-3"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="id" value="<?= (int)($editRow['id'] ?? 0) ?>">
<?php foreach($allowed[$tab] as $f): if($f==='image' || ($tab==='certificates' && $f==='certificate_file'))continue;?><div class="col-md-6"><label class="form-label"><?=ucwords(str_replace('_',' ',$f))?></label><?php if(in_array($f,['description','excerpt','content','skills_gained','highlights'])):?><textarea class="form-control" name="<?=$f?>" rows="2"><?=e($editRow[$f] ?? '')?></textarea><?php elseif(in_array($f,['is_published','is_active','published'])):?><div class="form-check"><input class="form-check-input" type="checkbox" name="<?=$f?>" <?=(!$editRow || !empty($editRow[$f]))?'checked':''?> ><label class="form-check-label">Enabled</label></div><?php else:?><input class="form-control" name="<?=$f?>" value="<?=e($editRow[$f] ?? '')?>" <?=in_array($f,['title','name'])?'required':''?>></div><?php endif; ?></div><?php endforeach;?>
<?php if($tab==='projects'):?><div class="col-md-6"><label class="form-label">Project image (JPG/PNG/WebP, max 4MB)</label><input class="form-control" type="file" name="image_file" accept=".jpg,.jpeg,.png,.webp"></div><?php endif;?>
<?php if($tab==='certificates'):?><div class="col-md-8"><label class="form-label">Upload certificate scan (PDF, JPG, PNG or WebP — max 8MB)</label><input class="form-control" type="file" name="certificate_upload" accept=".pdf,.jpg,.jpeg,.png,.webp,application/pdf,image/jpeg,image/png,image/webp"><div class="form-text text-secondary">Optional. Upload a verified certificate. Leave empty to keep the existing file.</div><?php if(!empty($editRow['certificate_file'])):?><p class="mt-2"><a href="<?=BASE_URL.'/'.e($editRow['certificate_file'])?>" target="_blank" rel="noopener">Open current uploaded file</a></p><?php endif;?></div><?php endif;?><div class="col-12"><button class="btn btn-accent"><?= $editRow ? 'Save changes' : 'Add new' ?></button><?php if($editRow): ?><a class="btn btn-outline-light ms-2" href="?tab=<?=$tab?>">Cancel</a><?php endif; ?></div></form></div>
<div class="admin-panel"><h3>Existing <?=e($tab)?></h3><div class="table-responsive"><table class="table table-dark table-hover align-middle"><thead><tr><th>ID</th><th>Details</th><th>Action</th></tr></thead><tbody><?php foreach($rows as $r):?><tr><td><?=$r['id']?></td><td><strong><?=e($r['title']??$r['name']??$r['role']??$r['label']??'')?></strong><div class="small text-secondary"><?=e($r['description']??$r['category']??$r['technologies']??$r['issuer']??$r['organization']??'')?></div></td><td><a class="btn btn-sm btn-outline-info me-1" href="?tab=<?=$tab?>&edit=<?=$r['id']?>">Edit</a><form class="d-inline" method="post" onsubmit="return confirm('Delete this record?')"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="action" value="delete_record"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="btn btn-sm btn-outline-danger" onclick="this.form.action.value='delete_record';this.form.submit();return false;">Delete</button></form></td></tr><?php endforeach;?></tbody></table></div><p class="small muted">You can add, edit and delete records. Project images and certificate scans can be uploaded when adding or editing records. Certificate files accept PDF, JPG, PNG and WebP up to 8MB.</p></div>
<?php elseif($tab==='users'):?><div class="admin-panel"><h3>Registered users</h3><div class="table-responsive"><table class="table table-dark"><tr><th>Name</th><th>Email</th><th>Joined</th><th>Action</th></tr><?php foreach($rows as $r):if($r['role']==='admin')continue;?><tr><td><?=e($r['name'])?></td><td><?=e($r['email'])?></td><td><?=e($r['created_at'])?></td><td><form method="post" onsubmit="return confirm('Delete this user?')"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="action" value="delete_user"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr><?php endforeach;?></table></div></div>
<?php else:?><div class="admin-panel"><h3>Contact messages</h3><div class="table-responsive"><table class="table table-dark"><tr><th>From</th><th>Subject</th><th>Message</th><th>Date</th><th></th></tr><?php foreach($rows as $r):?><tr><td><?=e($r['name'])?><br><small><?=e($r['email'])?></small></td><td><?=e($r['subject'])?></td><td><?=e($r['message'])?></td><td><?=e($r['created_at'])?></td><td><form method="post"><input type="hidden" name="csrf" value="<?=e(csrf_token())?>"><input type="hidden" name="action" value="delete_message"><input type="hidden" name="id" value="<?=$r['id']?>"><button class="btn btn-sm btn-outline-danger">Delete</button></form></td></tr><?php endforeach;?></table></div></div><?php endif;?>
</div></section><?php include __DIR__.'/../includes/footer.php'; ?>
