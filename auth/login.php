<?php
session_start();
require '../config.php';
$tipe = "Masuk";

        if (isset($_SESSION['user'])) {
            header("Location: ".$config['web']['url']);
        } else {

            if (isset($_POST['masuk'])) {
                $username = $conn->real_escape_string(trim(filter($_POST['username'])));
                $password = $conn->real_escape_string(trim(filter($_POST['password'])));

                $cek_username = $conn->query("SELECT * FROM users WHERE username = '$username'");
                $cek_pengguna_ulang = mysqli_num_rows($cek_username);
                $data_pengguna = mysqli_fetch_assoc($cek_username);

                $verif_password = password_verify($password, $data_pengguna['password']);

                $error = array();
                if (empty($username)) {
        		    $error ['username'] = '*Tidak Boleh Kosong';
                } else if ($cek_pengguna_ulang == 0) {
        		    $error ['username'] = '*Username Tidak Terdaftar';
                }
                if (empty($password)) {
        		    $error ['password'] = '*Tidak Boleh Kosong';
                } else if ($verif_password <> $data_pengguna['password']) {
        		    $error ['password'] = '*Kata Sandi Anda Salah';
        	} else {

                if ($data_pengguna['status'] == "Tidak Aktif") {
                    $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Akun Sudah Tidak Aktif.<script>swal("Gagal!", "Akun Sudah Tidak Aktif.", "error");</script>');

                } else if ($data_pengguna['status_akun'] == "Belum Verifikasi") {
                    $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Akun Kamu Belum Di Verifikasi.<script>swal("Gagal!", "Akun Kamu Belum Di Verifikasi.", "error");</script>');

                } else {

                        if ($cek_pengguna_ulang == 1) {
                            if ($verif_password == true) {
                                $conn->query("INSERT INTO aktifitas VALUES ('','$username', 'Masuk', '".get_client_ip()."','$date','$time')");
                                $_SESSION['user'] = $data_pengguna;
                                exit(header("Location: ".$config['web']['url']));
                            } else {
                                $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Gagal! Sistem Kami Sedang Mengalami Gangguan.<script>swal("Ups Gagal!", "Sistem Kami Sedang Mengalami Gangguan.", "error");</script>');
                            }
                        }
                    }
                }
            }
        }

        require '../lib/header_home.php';

?>

        <!-- Start Page Login -->
        <div class="login-2" style="background-color : #fba70b;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-section">
                            <h3>Masuk</h3>
                            <p>Anda Butuh Bantuan ?<a href="https://wa.me/6287735605394" style="color:RED;"> Klik Disini</a></p>
                            <br />
                            <?php
                            if (isset($_SESSION['hasil'])) {
                            ?>
                            <div class="alert alert-<?php echo $_SESSION['hasil']['alert'] ?> alert-dismissible" role="alert">
                                <?php echo $_SESSION['hasil']['pesan'] ?>
                            </div>
                            <?php
                            unset($_SESSION['hasil']);
                            }
                            ?>
                            <div class="login-inner-form">
                                <form class="form-horizontal" role="form" method="POST">
                                    <input type="hidden" name="csrf_token" value="<?php echo $config['csrf_token'] ?>">
                                    <div class="form-group form-box">
                                        <input type="text" name="username" class="input-text" placeholder="Masukkan Username" value="<?php echo $username; ?>">
                                        <i class="flaticon-user"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['email']) ? $error['username'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="password" name="password" class="input-text" placeholder="Masukkan Password">
                                        <i class="flaticon-password"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['password']) ? $error['password'] : '';?></small>
                                    </div>
                                    <div class="checkbox clearfix">
                                        <!--<div class="form-check checkbox-theme">-->
                                        <!--    <input class="form-check-input" type="checkbox" value="" id="rememberMe">-->
                                        <!--    <label class="form-check-label" for="rememberMe">-->
                                        <!--        I am not robot-->
                                        <!--    </label>-->
                                        <!--</div>-->
                                        <span class="pull-right"><a href="<?php echo $config['web']['url'] ?>/auth/forgot-password.php">Lupa Kata Sandi ?</a></span>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-success btn-block" name="masuk">Masuk</button>
                                  <br />
                                    <div class="form-group mb-0">
                                        <a href="<?php echo $config['web']['url'] ?>auth/register.php" <button type="submit" class="btn btn-warning btn-block" name="daftar">Daftar</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Login -->

<?php
require '../lib/footer_home.php';
?>