<?php
session_start();
require "../conn.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="../css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="../css/admin.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <?php include "ppas_sidenav.php" ?>
  <div class="content_profile">
    <form method="POST">
      <input type="hidden" name="ppas_id" value="<?php echo $_SESSION['id_ppas'] ?>">
      <div class="form-group mb-3">
        <label for="student_email">Kata Laluan Lama</label>
        <input type="password" name="password_old" class="form-control" placeholder="Kata Laluan Lama">
      </div>
      <div class="form-group mb-3">
        <label for="student_email">Kata Laluan Baru</label>
        <input type="password" name="password_new" class="form-control" placeholder="Kata Laluan Lama">
      </div>
      <button name="simpan" type="submit" class="btn btn-success">Simpan</button>
    </form>
  </div>
</body>

</html>

<?php
require '../conn.php';
if (isset($_POST['simpan'])) {
  $password_old = $_POST['password_old'];
  $password_new = $_POST['password_new'];
  $ppas_id = $_POST['ppas_id'];

  $sql = "select kata_laluan_s from ppas where id_ppas = '$ppas_id' and kata_laluan_s = '$password_old'";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $sql = "update ppas set kata_laluan_s = '$password_new' where id_ppas = '$ppas_id'";
    
    $receiver = $_SESSION['email_ppas'];
    if ($conn->query($sql) === TRUE) {
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Mailer = "smtp";
    
      $mail->SMTPDebug  = 0;
      $mail->SMTPAuth   = TRUE;
      $mail->SMTPSecure = "tls";
      $mail->Port       = 587;
      $mail->Host       = "smtp.gmail.com";
      $mail->Username   = "kkputhmpagoh@gmail.com";
      $mail->Password   = "tylhzryypmxogizl";
    
      $mail->IsHTML(true);
      $mail->AddAddress($receiver, "recipient-name");
      $mail->SetFrom("system-admin@gmail.com", "Admin");
      $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
      $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
      $mail->Subject = "PASSWORD UPDATED";
      $content = "<b>Your password is '".$password_new."'</b>";
  
      $mail->MsgHTML($content);
      if (!$mail->Send()) {
        echo "Error while sending Email.";
        var_dump($mail);
      } else {
        // echo "Email sent successfully";
        ?>
        <script>
          alert('Kata laluan telah dikemaskini, sila log masuk semula')
          window.location.href = '../index.php';
        </script>
        <?php
      }
    } else {
      ?>
      <script>
        alert("Error updating record")
      </script>
      <?php
    }
  } else {
    ?>
    <script>
      alert("Tiada kata laluan ditemui")
    </script>
    <?php
  }

  $conn->close();
}
?>
  <script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
      dropdown[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
          dropdownContent.style.display = "none";
        } else {
          dropdownContent.style.display = "block";
        }
      });
    }
  </script>
</body>

</html>