<?php
  session_start();
  include('../koneksi.php');
  $timeout = 12; // setting timeout dalam menit
  $logout = "../login.php"; // redirect halaman logout

  $timeout = $timeout * 60; // menit ke detik

  if($_SESSION['status']!="login"){
      header("location:../login.php?pesan=belum_login");
  }else{
    if(isset($_SESSION['start_session'])){
      $elapsed_time = time()-$_SESSION['start_session'];
      if($elapsed_time >= $timeout){
        session_destroy();
        echo "<script type='text/javascript'>alert('Sesi telah berakhir');window.location='$logout'</script>";
      }
    }
    $_SESSION['start_session']=time();
  }
?>