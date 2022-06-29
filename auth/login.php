<?php
session_start();
require_once "../conn.php";

function validateEmail($email, $user_type)
{
  if ($user_type === "penyelia" || $user_type === "ppas") {
    $pattern = "/uthm.edu.my/i";
    if (preg_match($pattern, $email)) {
      return true;
    }
  } else if ($user_type === "pelajar") {
    $pattern = "/siswa.uthm.edu.my/i";
    if (preg_match($pattern, $email)) {
      return true;
    }
  }
  return false;
}

if (isset($_POST['submit'])) {

  $user_type = $_POST['userType'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  validateEmail($username, $user_type);

  if ($user_type === "pelajar") {
    $sql = "SELECT * FROM pelajar WHERE email_pelajar = '$username' AND kata_laluan_p = '$password' and status = 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION['nama_pelajar'] = $row['nama_pelajar'];
        $_SESSION['no_matrik'] = $row['no_matrik'];
        $_SESSION['email_pelajar'] = $row['email_pelajar'];
        $_SESSION['sem_no'] = $row['sem_no'];
        $_SESSION['tahun'] = $row['tahun'];
        $_SESSION['no_telefon_p'] = $row['no_telefon_p'];
        $_SESSION['no_kunci'] = $row['kkp'].$row['blok'].$row['aras'].$row['no_rumah'];
        $_SESSION['kkp_student'] = $row['kkp'];
      }
      header("location: ../pelajar.php");
    } else {
      ?>
      <script>
        alert("Salah jenis pengguna atau akaun tidak aktif. Sila rujuk pejabat kolej kediaman pelajar.");
        window.location.href = '../index.php';
      </script>
      <?php
    }
  } else if ($user_type === "penyelia") {
    $sql = "SELECT 
      `id_staff`, 
      `nama_staff`, 
      `email_staff`, 
      `kata_laluan_s`, 
      `no_telefon_s`, 
      `jenis_pengguna`,
      `KKP`
      FROM `penyelia`
      WHERE email_staff = '" . $username . "'
      AND kata_laluan_s = '" . $password . "'
      AND jenis_pengguna = 'penyelia'
      AND status = 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION['nama_staff'] = $row['nama_staff'];
        $_SESSION['id_staff'] = $row['id_staff'];
        $_SESSION['email_staff'] = $row['email_staff'];
        $_SESSION['no_telefon_s'] = $row['no_telefon_s'];
        $_SESSION['kkp'] = $row['KKP'];
      }
      header("location: ../penyelia/penyelia.php");
    } else {
      ?>
      <script>
        alert("Salah jenis pengguna atau akaun tidak aktif. Sila rujuk pejabat kolej kediaman pelajar.");
        window.location.href = '../index.php';
      </script>
      <?php
    }
  } 
  else if($user_type == "admin"){
    $sql = "SELECT *
      FROM `admin`
      WHERE username = '" . $username . "'
      AND kata_laluan_a = '" . $password . "'
      AND jenis_pengguna = 'admin'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION['nama_admin'] = $row['nama_admin'];
        $_SESSION['id_admin'] = $row['id_admin'];
        $_SESSION['email_admin'] = $row['email_admin'];
        $_SESSION['no_telefon_a'] = $row['no_telefon_a'];
        $_SESSION['username'] = $row['username'];
      }
      header("location: ../admin/admin.php");
    } else {
      ?>
      <script>
        alert("Salah jenis pengguna atau akaun tidak aktif. Sila rujuk pejabat kolej kediaman pelajar.");
        window.location.href = '../index.php';
      </script>
      <?php
    }
  }
  else {

    $sql = "SELECT 
      `id_ppas`, 
      `nama_ppas`, 
      `email_ppas`, 
      `kata_laluan_ppas`, 
      `no_telefon_ppas`,
      `KKP`
      FROM `ppas` 
      WHERE email_ppas = '" . $username . "'
      AND kata_laluan_ppas = '" . $password . "'
      AND jenis_pengguna = 'ppas'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $_SESSION['nama_ppas'] = $row['nama_ppas'];
        $_SESSION['id_ppas'] = $row['id_ppas'];
        $_SESSION['email_ppas'] = $row['email_ppas'];
        $_SESSION['no_telefon_ppas'] = $row['no_telefon_ppas'];
        $_SESSION['username'] = $row['email_ppas'];
        $_SESSION['kkp'] = $row['KKP'];
        // echo $_SESSION['kkp'];
      }
      header("location: ../ppas/ppas.php");
    } else {
      ?>
      <script>
        alert("Salah jenis pengguna atau akaun tidak aktif. Sila rujuk pejabat kolej kediaman pelajar.");
        window.location.href = '../index.php';
      </script>
      <?php
    }
  }
}
?>