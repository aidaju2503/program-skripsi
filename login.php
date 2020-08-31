<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sentimen Analisis Komentar Trailer Film</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" type="text/css" href="assets/css/sweet.css">
    <link rel="shortcut icon" href="../../assets/img/2.jpg" />

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                    <div class="panel-body" style="text-align:center;">
                        <form role="form" action="cek_login.php" method="post">
                        <hr/>
                            <h3>Sentimen Analisis Komentar Trailer Film</h3>
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" name="username" placeholder="Username " />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control" name="password"  placeholder="Password" />
                                </div>
                            <button class="btn btn-primary ">Login</button>
                        </form>
                        <hr/>
                    </div>
                   
                </div>
                
        </div>
    </div>

</body>
</html>

<script src="assets/js/sweetalert.min.js"></script>
<script src="assets/js/sweet.js"></script>
    
    <?php 
      if(isset($_GET['pesan'])){
          if($_GET['pesan'] == "logout"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'success',
                    title: 'Logout',
                    text: 'Silahkan Login Kembali',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "password_gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Password Gagal Diubah',
                    text: 'Password Lama Salah',
                  })
              </script>
          <?php
          }else if($_GET['pesan'] == "gagal"){
          ?>
              <script type="text/javascript">
                  Swal.fire({
                    type: 'warning',
                    title: 'Login Gagal',
                    text: 'Silahkan Periksa Kembali Username dan Password Anda',
                  })
              </script>
          <?php
          }
      }
    ?>