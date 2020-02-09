<?php include './header.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- hapus-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Registrasi Pengguna</title>
    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/regis-main.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper bg-skyblue p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registrasi Akun</h2>
                    <form action="proses-regis.php" method="POST">
                        <div class="input-group">
							<input class="input--style-2" type="text" placeholder="Username" name="username" required>
						</div>
                        <div class="input-group">
							<input class="input--style-2" type="password" placeholder="Password" name="password" required>
						</div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nama" name="nama" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="email" placeholder="E-mail" name="email" required>
                        </div>
                        <div class="row row-space">
                            <div class="col-6">
                                <div class="input-group">
                                    <input class="input--style-2 js-datepicker" type="text" placeholder="Tanggal Lahir" name="tgl_lahir" required>
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="input-group">
                                    <div class="input--style-1 rs-select2 js-select-simple select--no-search">
                                        <select name="jns_kelamin" required>
                                            <option disabled="disabled" selected="selected">Jenis Kelamin</option>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-13">
                                    <textarea class="textarea--style-2" style="max-width:110%;" rows="3" placeholder="ALAMAT" name="alamat" required></textarea>
                                  </div>
                                  <div class="p-t-30">
                                      <button class="btn btn--radius btn--blue" name="register" type="submit">Daftar</button>
                                  </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
