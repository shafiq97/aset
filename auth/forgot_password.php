<?php
session_start();
$msg = '';
include "../code.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/phpmailer/phpmailer/src/Exception.php';
require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../vendor/phpmailer/phpmailer/src/SMTP.php';

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Multi User Login</title>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 bg-light mt-5 px-0">
        <form action="" method="post">
          <h2 class="text-center text-light bg-danger p-3">KEMASKINI KATA LALUAN</h2>
          <hr>
          <div class="form-group">
            <label>Email: </label>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter email" required>
          </div>
          <br>
          <div class="form-group text-right">
            <!-- <a href="auth/forgot_password.php" class="btn btn-warning">Kemaskini</a> -->
            <input class="btn btn-success" type="submit" name="submit" value="Kemaskini">
            <a class="btn btn-warning" href="../index.php">Kembali</a>
          </div>
          <h5 class="text-danger text-center"><? $msg; ?></h5>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

  $receiver = $_POST['email'];
  $email_found = false;

  // $six_digit_random_number = random_int(100000, 999999);

  $sql = "select email_pelajar, kata_laluan_p from pelajar where email_pelajar = '".$receiver."' ";
  $userPassword = "";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $userPassword = $row['kata_laluan_p'];
    }
    $email_found = true;
    // $sql = "update pelajar set kata_laluan_p = '".$six_digit_random_number."' where email_pelajar = '".$receiver."'";
    // if ($conn->query($sql) === TRUE) {
    //   // echo "Record updated successfully";
    // } else {
    //   echo "Error updating record: " . $conn->error;
    // }
  }

  $sql = "select email_staff, kata_laluan_s from penyelia where email_staff = '".$receiver."' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $email_found = true;
    while($row = $result->fetch_assoc()) {
      $userPassword = $row['kata_laluan_s'];
    }
  }

  $sql = "select email_ppas, kata_laluan_ppas from ppas where email_ppas = '".$receiver."' ";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $email_found = true;
    while($row = $result->fetch_assoc()) {
      $userPassword = $row['kata_laluan_ppas'];
    }
  }

  if($email_found){

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
    $mail->Subject = "FORGOT PASSWORD";
    $content = "<b>Your password is '".$userPassword."'</b>";
  
    $mail->MsgHTML($content);
    if (!$mail->Send()) {
      echo "Error while sending Email.";
      var_dump($mail);
    } else {
      // echo "Email sent successfully";
      header("location: ../index.php");
    }
  }
  else{
    ?>
    <script>alert('email not found!')</script>
    <?php
  }

}
?>