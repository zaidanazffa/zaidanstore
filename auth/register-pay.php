<?php
session_start();
require '../config.php';
$tipe = "Daftar";

    if (isset($_POST['daftar'])) {
        $nama_depan = $conn->real_escape_string(trim(filter($_POST['nama_depan'])));
        $nama_belakang = $conn->real_escape_string(trim(filter($_POST['nama_belakang'])));
        $email = $conn->real_escape_string(trim(filter($_POST['email'])));
        $username = $conn->real_escape_string(trim(filter($_POST['username'])));
        $no_hp = $conn->real_escape_string(trim(filter($_POST['no_hp'])));
        $password = $conn->real_escape_string(trim(filter($_POST['password'])));
        $password2 = $conn->real_escape_string(trim(filter($_POST['password2'])));
        $pin = $conn->real_escape_string(trim(filter($_POST['pin'])));
        $kode = $conn->real_escape_string(trim(filter($_POST['kode'])));

        $cek_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
        $cek_email_ulang = mysqli_num_rows($cek_email);
        $data_email = mysqli_fetch_assoc($cek_email);

        $cek_pengguna = $conn->query("SELECT * FROM users WHERE username = '$username'");
        $cek_pengguna_ulang = mysqli_num_rows($cek_pengguna);
        $data_pengguna = mysqli_fetch_assoc($cek_pengguna);

        $cek_no_hp = $conn->query("SELECT * FROM users WHERE no_hp = '$no_hp'");
        $cek_no_hp_ulang = mysqli_num_rows($cek_no_hp);
        $data_no_hp = mysqli_fetch_assoc($cek_no_hp);

        $cek_kode = $conn->query("SELECT * FROM kode_undangan WHERE kode = '$kode' AND status = 'Belum Dipakai'");
        $cek_kode_ulang = mysqli_num_rows($cek_kode);
        $data_kode = mysqli_fetch_assoc($cek_kode);

        $error = array();
        if (empty($nama_depan)) {
		    $error ['nama_depan'] = '*Tidak Boleh Kosong';
        }
        if (empty($nama_belakang)) {
		    $error ['nama_belakang'] = '*Tidak Boleh Kosong';
        }
        if (empty($email)) {
		    $error ['email'] = '*Tidak Boleh Kosong';
        } else if ($cek_email_ulang == 0) {
		    $error ['email'] = '*Email Sudah Terdaftar';
        }
        if (empty($username)) {
		    $error ['username'] = '*Tidak Boleh Kosong';
        } else if (strlen($username) < 5) {
		    $error ['username'] = '*Nama Pengguna Minimal 5 Karakter';
        } else if ($cek_pengguna_ulang == 0) {
		    $error ['username'] = '*Nama Pengguna Sudah Terdaftar';
        }
        if (empty($no_hp)) {
		    $error ['no_hp'] = '*Tidak Boleh Kosong';
        } else if ($cek_no_hp == 0) {
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
        }
        if (empty($kode)) {
		    $error ['kode'] = '*Tidak Boleh Kosong';
        } else if (mysqli_num_rows($cek_kode) == 0) {
		    $error ['email'] = '*Kode Undangan Tidak Ditemukan';
        } else {

        $hash_password = password_hash($password, PASSWORD_DEFAULT);
        $api_key =  acak(32);

        if ($conn->query("INSERT INTO users VALUES ('', '$nama_depan', '$nama_belakang', '$nama_depan $nama_belakang', '$email', '$username', '$hash_password', '".$data_kode['saldo_sosmed']."', '".$data_kode['saldo_top_up']."', '0', 'Member', 'Aktif', 'Belum Verifikasi', '$pin', '$api_key', 'Pendaftaran Gratis', '$date', '$time', '0', '$no_hp', '', '0', '0')") == true) {
            $conn->query("UPDATE kode_undangan SET status = 'Sudah Dipakai' WHERE kode = '$kode'");
            $_SESSION['hasil'] = array('alert' => 'success', 'pesan' => 'Sip, Akun Kamu Berhasil Di Daftarkan.<script>swal("Berhasil!", "Akun Kamu Berhasil Di Daftarkan.", "success");</script>');
        } else {
            $_SESSION['hasil'] = array('alert' => 'danger', 'pesan' => 'Ups, Gagal! Sistem Kami Sedang Mengalami Gangguan.<script>swal("Ups Gagal!", "Sistem Kami Sedang Mengalami Gangguan.", "error");</script>');
        }
    }
}

require '../lib/header_home.php';
?>

        <!-- Start Page Register -->
        <div class="login-2" style="background-image: url('<?php echo $config['web']['url'] ?>assets/media/bg/bg-5.png');">
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
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['nama_depan']) ? $error['nama_depan'] : '';?></small>
                                        </div>
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="text" class="input-text" placeholder="Nama Belakang" name="nama_belakang" value="<?php echo $nama_belakang; ?>">
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['nama_belakang']) ? $error['nama_belakang'] : '';?></small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="email" class="input-text" placeholder="Email Aktif" name="email" value="<?php echo $email; ?>">
                                            <i class="flaticon-email"></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['email']) ? $error['email'] : '';?></small>
                                        </div>
                                        <div class="form-group form-box col-md-6 col-12">
                                            <input type="number" class="input-text" placeholder="Nomor HP" name="no_hp" value="<?php echo $no_hp; ?>">
                                            <i class="flaticon2-phone"></i>
                                            <small class="text-danger font-13 pull-right"><?php echo ($error['no_hp']) ? $error['no_hp'] : '';?></small>
                                        </div>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="text" class="input-text" placeholder="Nama Pengguna" name="username" value="<?php echo $username; ?>">
                                        <i class="flaticon-user"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['username']) ? $error['username'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="password" class="input-text" placeholder="Kata Sandi" name="password">
                                        <i class="flaticon-password"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['password']) ? $error['password'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="password" class="input-text" placeholder="Konfirmasi Kata Sandi" name="password2">
                                        <i class="flaticon-password"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['password2']) ? $error['password2'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="number" class="input-text" placeholder="PIN Transaksi Harus 6 Digit" name="pin" value="<?php echo $pin; ?>">
                                        <i class="fa fa-key"></i>
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['pin']) ? $error['pin'] : '';?></small>
                                    </div>
                                    <div class="form-group form-box">
                                        <input type="number" class="input-text" placeholder="Kode Undangan" name="kode" value="<?php echo $kode; ?>">
                                        <small class="text-danger font-13 pull-right"><?php echo ($error['kode']) ? $error['kode'] : '';?></small>
                                    </div>
                                    <div class="checkbox clearfix">
                                        <div class="form-check checkbox-theme">
                                            <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                            <label class="form-check-label" for="rememberMe">
                                                Saya Setuju Dengan Ketentuan Layanan
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-block" name="daftar">Daftar</button>
                                    </div>
                                    <br />
                                    <p>Sudah Punya Akun ?<a href="<?php echo $config['web']['url'] ?>auth/login"> Masuk</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Page Register -->

<?php
require '../lib/footer_home.php';
?>