<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(4);
?>
<?php
  $pengajuan = find_by_id('pengajuan',(int)$_GET['id']);
  $user = find_by_id('users',(int)$_SESSION['user_id']);
  if(!$pengajuan){
    $session->msg("d","Missing Pengajuan id.");
        if($user['user_level']==4){
           redirect('pengajuan_kppn.php', false);
        }else{
    redirect('pengajuan.php');
        }
  }
  $query  = "UPDATE pengajuan SET ";
        $query .= "status_kppn='0'";
        $query .= "WHERE id='{$pengajuan["id"]}'";
        $result = $db->query($query);
        //echo $query;
        $session->msg('s',' Berhasil di Batalkan');
        if($user['user_level']==4){
           redirect('pengajuan_kppn.php', false);
        }else{
      redirect('pengajuan.php', false);
        }
?>