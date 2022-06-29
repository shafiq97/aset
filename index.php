<?php
session_start();
$msg = '';
include "code.php";
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
  <style>
    .header {
      text-align: center;
      background: #76b0e3;
      color: black;
      font-size: 30px;
      width: 100%;
    }
  </style>
  <title>Multi User Login</title>
</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 bg-light mt-5 px-0">
        <form action="auth/login.php" method="post">
          <h2 class="text-center text-light bg-danger p-3">LOG MASUK</h2>
          <hr>
          <div class="form-group">
            <label>Username: </label>
            <input type="email" name="username" class="form-control form-control-lg" placeholder="Enter you email" required>
          </div>
          <div class="form-group">
            <label>Kata Laluan: </label>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
          </div>
          <div class="form-group lead">
            <input type="radio" name="userType" value="pelajar" class="custom-radio" required>&#9;Student&#9;
            <input type="radio" name="userType" value="penyelia" class="custom-radio" required>&nbsp;Penyelia
            <input type="radio" name="userType" value="PPAS" class="custom-radio" required>&nbsp;PPAS
            <input type="radio" name="userType" value="admin" class="custom-radio" required>&nbsp;Admin
          </div>
          <div class="form-group text-right">
            <input type="submit" name="submit" class="btn btn-primary float-right" value="Login">
            <a href="auth/forgot_password.php" class="btn btn-warning">Forgot password</a>
          </div>
          <h5 class="text-danger text-center"><? $msg; ?></h5>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>