<?php
session_start();
require '../config.php';
$tipe = "Daftar";

function dapetin($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data, true);
}
        if (isset($_POST['daftar'])) {
            $nama_depan = $conn->real_escape_string(filter($_POST['nama_depan']));
            $nama_belakang = $conn->real_escape_string(filter($_POST['nama_belakang']));
            $email = $conn->real_escape_string(filter($_POST['email']));
            $username = $conn->real_escape_string(filter($_POST['username']));
            $no_hp = $conn->real_escape_string(filter($_POST['no_hp']));
            $password = $conn->real_escape_string(filter($_POST['password']));
            $password2 = $conn->real_escape_string(filter($_POST['password2']));
            $pin = $conn->real_escape_string(filter($_POST['pin']));
            $kode_referral = $conn->real_escape_string(filter($_POST['kode_referral']));
            $kode_undangan = $conn->real_escape_string(filter($_POST['kode_undangan']));

            $secret_key = '6LeqbNEcAAAAAFtl0ilXaKjqqodxEVwhJ9ZQii5G'; //masukkan secret key-nya berdasarkan secret key masing-masing saat create api key nya
            $captcha = $_POST['g-recaptcha-response'];
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secret_key) . '&response=' . $captcha;
            $recaptcha = dapetin($url);

            $cek_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
            $cek_email_ulang = mysqli_num_rows($cek_email);
            $data_email = mysqli_fetch_assoc($cek_email);
            
            $cek_ref = $conn->query("SELECT * FROM setting_referral");
            $cek_ref_ulang = mysqli_num_rows($cek_ref);
            $data_ref = mysqli_fetch_assoc($cek_ref);
            
            $cek_ref_bonus = $conn->query("SELECT * FROM setting_referral WHERE status = 'Aktif'");
            $cek_ref_ulang_bonus = mysqli_num_rows($cek_ref_bonus);
            $data_ref_bonus = mysqli_fetch_assoc($cek_ref_bonus);
            $bonus_koin = $data_ref_bonus['jumlah'];

            $cek_pengguna = $conn->query("SELECT * FROM users WHERE username = '$username'");
            $cek_pengguna_ulang = mysqli_num_rows($cek_pengguna);
            $data_pengguna = mysqli_fetch_assoc($cek_pengguna);

            $cek_no_hp = $conn->query("SELECT * FROM users WHERE no_hp = '$no_hp'");
            $cek_no_hp_ulang = mysqli_num_rows($cek_no_hp);
            $data_no_hp = mysqli_fetch_assoc($cek_no_hp);

            $cek_kode = $conn->query("SELECT * FROM users WHERE kode_referral = '$kode_referral'");
            $cek_kode_ulang = mysqli_num_rows($cek_kode);
            $data_kode = mysqli_fetch_assoc($cek_kode);
            $pemilik_reff = $data_kode['username'];
            $koin_pemilik_reff = $data_kode['koin'];
            
            $cek_kodeundangan = $conn->query("SELECT * FROM kode_undangan WHERE kode = '$kode_undangan'");
            $cek_kodeundangan_ulang = mysqli_num_rows($cek_kodeundangan);
            $data_kodeundangan = mysqli_fetch_assoc($cek_kodeundangan);

            $uplink = $data_kode['username'];
            $level = $data_kodeundangan['level'];
            $kode_ref = acak(3).acak_nomor(4);

            $error = array();
            if (empty($nama_depan)) {
    		    $error ['nama_depan'] = '*Tidak Boleh Kosong';
            }
            if (empty($nama_belakang)) {
    		    $error ['nama_belakang'] = '*Tidak Boleh Kosong';
            }
            if (empty($email)) {
    		    $error ['email'] = '*Tidak Boleh Kosong';
            } else if ($cek_email->num_rows > 0) {
    		    $error ['email'] = '*Email Sudah Terdaftar';
            }
            if (empty($username)) {
    		    $error ['username'] = '*Tidak Boleh Kosong';
            } else if (strlen($username) < 5) {
    		    $error ['username'] = '*Nama Pengguna Minimal 5 Karakter';
            } else if ($cek_pengguna->num_rows > 0) {
    		    $error ['username'] = '*Nama Pengguna Sudah Terdaftar';
            }
            if (empty($no_hp)) {
    		    $error ['no_hp'] = '*Tidak Boleh Kosong';
    		    $error ['no_hp'] = '*Format Nomor HP Harus 628';
            } else if ($cek_no_hp->num_rows > 0) {
    		    $error ['no_hp'] = '*Nomor HP Sudah Terdaftar';
            }
            if (empty($password)) {
    		    $error ['password'] = '*Tidak Boleh Kosong';
            } else if (strlen($password) < 6) {
    		    $error ['password'] = '*Minimal 6 Karakter';
            }
            if (empty($password2)) {
    		    $error ['password2'] = '*Tidak Boleh Kosong';
            } else if ($password <> $password2) {
    		    $error ['password2'] = '*Konfirmasi Kata Sandi Tidak Sesuai';
            }
            if (empty($pin)) {
    		    $error ['pin'] = '*Tidak Boleh Kosong.';
            } else if (strlen($pin) <> 6 ){
    		    $error ['pin'] = '*PIN Harus 6 Digit.';
            } else {

	    if (mysqli_num_rows($cek_kode) == 0) {
	            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Kode Referral Tidak Ditemukan.<script>swal("Gagal!", "Kode Referral Tidak Ditemukan.", "error");</script>');
	    } else if ($_POST['accept'] !== "true") {
	            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Silahkan Setujui Ketentuan Layanan Kami Sebelum Mendaftar.<script>swal("Gagal!", "Silahkan Setujui Ketentuan Layanan Kami Sebelum Mendaftar.", "error");</script>');
	    } else if (mysqli_num_rows($cek_pengguna) == 1) {
	            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Nama Pengguna Sudah Terdaftar.<script>swal("Gagal!", "Nama Pengguna Sudah Terdaftar.", "error");</script>');
	    } else if (mysqli_num_rows($cek_no_hp) == 1) {
	            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Nomor HP Sudah Terdaftar.<script>swal("Gagal!", "Nomor HP Sudah Terdaftar.", "error");</script>');
	    } else if (mysqli_num_rows($cek_email) == 1) {
	            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Email Sudah Terdaftar.<script>swal("Gagal!", "Email Sudah Terdaftar.", "error");</script>');
	    } else {

                $hash_password = password_hash($password, PASSWORD_DEFAULT);
                $api_key =  acak(20);
                $bonus_reff = '3000';

                    if ($conn->query("INSERT INTO users VALUES ('', '$nama_depan', '$nama_belakang', '$nama_depan $nama_belakang', '$email', '$username', '$hash_password', '0', '0', '0', 'Member', 'Aktif', 'Sudah Verifikasi', '$pin', '$api_key', 'Pendaftaran Gratis', '$uplink', '$date', '$time', '0', '$no_hp', '', 'TFKD-$kode_ref', '', '0', '')") == true) {
                    $conn->query("UPDATE kode_undangan SET status = 'Sudah Dipakai' WHERE kode = '$kode_undangan'");
                    $conn->query("INSERT INTO riwayat_referral VALUES ('', '$username', '$uplink', '$kode_referral', '$bonus_reff', '$date', '$time')");
                    $conn->query("UPDATE users SET koin = $koin_pemilik_reff+$bonus_koin WHERE username = '$pemilik_reff'");
                    $conn->query("INSERT INTO riwayat_saldo_koin VALUES ('', '$pemilik_reff', 'Koin', 'Penambahan Koin', '$bonus_koin', 'Mendapatkan Koin Dari Kode Referal Oleh $nama_depan $nama_belakang, '$date', '$time')");
                        $_SESSION['hasil'] = array('alert' => 'success', 'pesan' => 'Sip, Akun Kamu Berhasil Di Daftarkan, Silahkan Masuk Untuk Mengakses Akun Kamu.<script>swal("Berhasil!", "Akun Kamu Berhasil Di Daftarkan.", "success");</script>');
                    } else {
                        $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Gagal! Sistem Kami Sedang Mengalami Gangguan.<script>swal("Ups Gagal!", "Sistem Kami Sedang Mengalami Gangguan.", "error");</script>');
                    }
                }
            }
        }

        require '../lib/header_home.php';

?>

        <!-- Start Page Register -->
        <div class="login-2" style="background-color : #fba70b;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-section">
                            <h3>Daftar Akun</h3>
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
                                    <div class="row">
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="text" class="input-text" placeholder="Nama Depan" name="nama_depan" value="<?php echo $nama_depan; ?>">
                                            <i class=""></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['nama_depan']) ? $error['nama_depan'] : '';?></small>
                                        </div>
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="text" class="input-text" placeholder="Nama Belakang" name="nama_belakang" value="<?php echo $nama_belakang; ?>">
                                            <i class=""></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['nama_belakang']) ? $error['nama_belakang'] : '';?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="email" class="input-text" placeholder="Email Aktif" name="email" value="<?php echo $email; ?>">
                                            <i class=""></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['email']) ? $error['email'] : '';?></small>
                                        </div>
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="number" class="input-text" placeholder="Nomor Hp ( 62 )" name="no_hp" value="<?php echo $no_hp; ?>">
                                            <i class=""></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['no_hp']) ? $error['no_hp'] : '';?></small>
                                        </div>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="text" class="input-text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                                        <i class="flaticon-user"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['username']) ? $error['username'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="password" class="input-text" placeholder="Password" name="password" value="<?php echo $password; ?>">
                                        <i class="flaticon-password"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['password']) ? $error['password'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="password" class="input-text" placeholder="Konfirmasi Password" name="password2" value="<?php echo $password2; ?>">
                                        <i class="flaticon-password"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['password2']) ? $error['password2'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="number" class="input-text" placeholder="PIN Transaksi Harus 6 Digit" name="pin" value="<?php echo $pin; ?>">
                                        <i class="flaticon-key"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['pin']) ? $error['pin'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="text" class="input-text" placeholder="Kode Referral ( isi jika ada )" name="kode_referral" value="<?php echo $kode_referral; ?>">
                                        <i class="fa fa-gift"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['kode_referral']) ? $error['kode_referral'] : '';?></small>
                                    </div>
                                    <div class="checkbox clearfix">
                                        <div class="form-check checkbox-theme">
                                            <input class="form-check-input" type="checkbox" value="true" name="accept" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">
                                                Saya bersedia mengikuti aturan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-success btn-block" name="daftar">Daftar</button>
                                    </di>
                                  <br />
                                    <div class="form-group mb-0">
                                        <a href="<?php echo $config['web']['url'] ?>auth/login.php" <button type="submit" class="btn btn-warning btn-block" name="masuk">Masuk</button></a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Register -->

        <script src='https://www.google.com/recaptcha/api.js'></script>

<?php
require '../lib/footer_home.php';
?>