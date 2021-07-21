<?php
session_start();
include_once 'database-query.php';


if(!isset($_SESSION["login"])){
	header("Location: login.php");
	exit;
}


//Ambil data di URL
$id= abs((int)$_GET["id"]);

//query data pasien berdasarkan id
$psn = query("SELECT * FROM pasien_rumah_sakit WHERE id=$id")[0];



//cek apakah tombol submit sudah di tekan atau belum
if(isset($_POST["submit"])){
	
	
	
	//cek apakah data berhasil diubah atau tidak
	if(ubah($_POST)>0){
		echo "
		<script>
		alert('Data pasien berhasil diubah!');
		document.location.href='data-pasien.php';
		</script>
		";
	}else{
		echo "
		<script>
		alert('Data pasien gagal diubah!');
		document.location.href='ubah.php';
		</script>
		";
	}
}



?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Ubah Pasien</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link href="styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
			.judul-projek{
				color:white;
				margin-left:9px;
			}
			.potoku img{
				display:block;
				width:110px;
				margin-left:20px;
				border-radius:24px;
			}
			.rawat-inap{
				background-color:#FF80F6;
			}
			.border-form{
	
				border:1px solid #838383;
				padding:7px;
			}
			.tambah-pasien{
				border:2px solid #878787;
			}
			
			
		</style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <h4 class="judul-projek">Sistem Informasi Rumah Sakit</h4>
            <button class="btn btn-link btn-sm order-1 order-lg-0  ml-4" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">              
            </form>
            <!-- Navbar-->
           
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav" class="bg-dark text-light">
                <nav class="sb-sidenav accordion sb-sidenav-primary" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           <div class="potoku">
                            <center><img src="img/PR.ico"></center>
							</div>
                           <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Autentifikasi User</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Autentifikasi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="login.php">Login</a>
                                            <a class="nav-link" href="registrasi.php">Register</a>
                                            <a class="nav-link" href="lupa-password.php">Forgot Password</a>           				                                                      
                        </div>
                        
			  <div class="sb-sidenav-menu-heading">Rumah Sakit Ibu & Anak</div>
                        <a class="nav-link" href="data-pasien.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data Pasien
                            </a>
                            <a class="nav-link" href="tambah.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                              Halaman Tambah Pasien
                            </a>
				<a class="nav-link" href="profil-dokter.php">
                                <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                              Profil Dokter
                            </a>
                            <a class="nav-link" href="rawat-inap.php">
                                <div class="sb-nav-link-icon"> <i class="bi bi-subtract"></i></div>
                              Rawat Inap
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                   <div class="container mt-5 tambah-pasien mb-5">
		<div class="row text-center mb-3">
			<div class="col">			
				<h2>Ubah Data Pasien</h2>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
			<div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
		  <strong>Terimakasih!</strong> pesan anda sudah saya terima.
		  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
				<form action="" method="post">
			<input type="hidden" name="id" value="<?php echo $psn["id"]; ?>">
		  <div class="mb-3">
			<label for="nama" class="form-label">Nama Pasien</label>
			<input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama" autocomplete="off" value="<?php echo $psn["nama"]; ?>" required/>
		  </div>
		  <div class="mb-3">
			<label for="umur" class="form-label">Umur Pasien</label>
			<input type="text" class="form-control" id="umur" aria-describedby="umur" name="umur" autocomplete="off" value="<?php echo $psn["umur"]; ?>"  required/>
			<label for="gender" class="form-label">Gender Pasien</label>
			<input type="text" class="form-control" id="gender" aria-describedby="gender" name="gender" autocomplete="off" value="<?php echo $psn["gender"]; ?>" required/>
			<label for="tinggal" class="form-label">Pasien Tinggal</label>
			<input type="text" class="form-control" id="tinggal" aria-describedby="tinggal" name="tinggal" autocomplete="off" value="<?php echo $psn["tinggal"]; ?>" required/>
			<label for="check_in" class="form-label">Check In</label>
			<input type="text" class="form-control" id="check_in" aria-describedby="check_in" name="check_in" autocomplete="off" value="<?php echo $psn["check_in"]; ?>" required/>
			<label for="check_out" class="form-label">Check Out</label>
			<input type="text" class="form-control" id="check_out" aria-describedby="check_out" name="check_out" autocomplete="off" value="<?php echo $psn["check_out"]; ?>"  required/>
		  </div>
		 <div class="form-group col-md-4">
      <label for="kamar">Kamar Pasien</label>
      <select class="form-control" name="kamar" id="kamar" value="<?php echo $psn["kamar"]; ?>">
        <option>Kamar Pasien</option>
        <option>Melati</option>
        <option>Mawar</option>
      </select>
    </div>
		  <button type="submit" name="submit" class="btn btn-primary btn-kirim mb-3">Kirim</button>
		 
		</form>
			</div>
		</div>
	</div>
						</div>
                    </div>                   
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="scripts.js"></script>
    </body>
</html>

