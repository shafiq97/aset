<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
require_once 'conn.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap");

    .frame {
      position: relative;
      top: 25%;
      left: 40%;
      width: 400px;
      height: 400px;
      margin-top: -200px;
      margin-left: -200px;
      border-radius: 2px;
      box-shadow: 4px 8px 16px 0 rgba(0, 0, 0, 0.1);
      overflow: hidden;
      background: #CA7C4E;
      background: linear-gradient(to top right, #EEBE6C 0%, #CA7C4E 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#EEBE6C", endColorstr="#CA7C4E", GradientType=1);
      color: #333;
      font-family: "Poppins", Helvetica, sans-serif;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
    }

    .center {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .profile {
      background: #fff;
      height: 18.5em;
      width: 20em;
      border-radius: 3px;
      display: flex;
      flex-direction: row;
      justify-content: center;
    }

    .profile .profile-info {
      height: 100%;
      width: 60%;
    }

    .profile .profile-info .image-div img {
      position: relative;
      border-radius: 50%;
      top: 2.5em;
      left: 3.5em;
      cursor: pointer;
    }

    .profile .profile-info .image-div .circle1,
    .profile .profile-info .image-div .circle2 {
      position: absolute;
      width: 76px;
      height: 76px;
      top: 2.28em;
      left: 3.2em;
      border-width: 1px;
      border-style: solid;
      border-color: #002720 #002720 #002720 transparent;
      border-radius: 50%;
      transition: all 1s ease-in-out;
    }

    .profile .profile-info .image-div .circle2 {
      width: 82px;
      height: 82px;
      top: 2.05em;
      left: 3em;
      border-color: #002720 transparent #002720 #002720;
    }

    .profile .profile-info .image-div:hover .circle1,
    .profile .profile-info .image-div:hover .circle2 {
      transform: rotate(360deg);
    }

    .profile .profile-info .image-div:hover .circle2 {
      transform: rotate(-360deg);
    }

    .profile .profile-info .details {
      display: flex;
      flex-direction: column;
      text-align: center;
      margin-top: 3em;
    }

    .profile .profile-info .details .name {
      font-size: 0.9rem;
      margin: 0.5em 0 0 0;
      font-weight: 500;
    }

    .profile .profile-info .details .desc {
      margin-top: 0.2em;
      font-size: 0.8rem;
      font-weight: 300;
    }

    .profile .profile-info .activity {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 1.6em;
      color: #333;
    }

    .profile .profile-info .activity button {
      width: 60%;
      margin: 0.3em 0;
      height: 1.8em;
      border: 1px solid #333;
      border-radius: 10px;
      font-weight: 500;
      display: flex;
      justify-content: center;
      align-items: flex-end;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .profile .profile-info .activity button:hover {
      background: #333;
      color: #fff;
    }

    .profile .stats {
      height: 100%;
      width: 40%;
    }

    .profile .stats .box {
      height: 6em;
      width: 100%;
      background: #F5E8DF;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      transition: all 0.5s ease;
    }

    .profile .stats .box:hover {
      background: #E1CFC2;
    }

    .profile .stats .box .value {
      font-size: 1rem;
    }

    .profile .stats .box .param {
      font-size: 0.9rem;
    }

    .profile .stats .one {
      border-radius: 0 3px 0 0;
    }

    .profile .stats .two {
      margin: 4px 0;
    }

    .profile .stats .three {
      border-radius: 0 0 3px 0;
    }

    .sidenav {
      height: 100%;
      width: 200px;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    /* Style the sidenav links and the dropdown button */
    .sidenav a,
    .dropdown-btn {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 20px;
      color: #818181;
      display: block;
      border: none;
      background: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
      outline: none;
    }

    /* On mouse-over */
    .sidenav a:hover,
    .dropdown-btn:hover {
      color: #f1f1f1;
    }

    /* Main content */
    .main {
      margin-left: 200px;
      /* Same as the width of the sidenav */
      font-size: 20px;
      /* Increased text to enable scrolling */
      padding: 0px 10px;
    }

    /* Add an active class to the active dropdown button */
    .active {
      background-color: green;
      color: white;
    }

    /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
    .dropdown-container {
      display: none;
      background-color: #262626;
      padding-left: 8px;
    }

    /* Optional: Style the caret down icon */
    .fa-caret-down {
      float: right;
      padding-right: 8px;
    }

    /* Some media queries for responsiveness */
    @media screen and (max-height: 450px) {
      .sidenav {
        padding-top: 15px;
      }

      .sidenav a {
        font-size: 18px;
      }
    }

    /* Header/Logo Title */
    .header {
      padding: 10px;
      text-align: center;
      background: #76B0E3;
      color: black;
      font-size: 30px;
    }

    /* Page Content */
    .content {
      padding: 10px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <div class="sidenav">

    <ul class="nav_list">
      <a href="profil_pelajar.php">
        <span class="links_name">Profil</span>
      </a>
      <a href="penerimaan.php">
        <span class="links_name">Penerimaan aset</span>
      </a>

      <a href="pemulangan.php">
        <span class="links_name">Pemulangan aset</span>
      </a>

      <a href="index.php">
        <span class="links_name">Keluar</span></i>
      </a>

      </li>
    </ul>
  </div>

  <div class="content">
    <div class="wrapper">
      <table id="example" class="display" style="width:100%">
        <thead>
          <tr>
            <th>Id Akuan</th>
            <th>Id Staff</th>
            <th>Id PPAS</th>
            <th>Lokasi</th>
            <th>Tarikh Aduan</th>
            <th>Status</th>
            <th>Status Tilam</th>
            <th>Catatan Tilam</th>
            <th>Status Katil</th>
            <th>Catatan Katil</th>
            <th>Status Kerusi</th>
            <th>Catatan Kerusi</th>
            <th>Status Almari</th>
            <th>Catatan Almari</th>
            <th>Status MBBR</th>
            <th>Catatan MBBR</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $sql = "SELECT * FROM AKUAN WHERE no_matrik='$_SESSION[no_matrik]'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                ?>
                  <tr>
                    <td><?php echo $row['id_akuan'] ?></td>
                    <td><?php echo $row['id_staff'] ?></td>
                    <td><?php echo $row['id_ppas'] ?></td>
                    <td><?php echo $row['lokasi'] ?></td>
                    <td><?php echo $row['tarikh_akuan'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><?php echo $row['tilam_status'] ?></td>
                    <td><?php echo $row['tilam_catatan'] ?></td>
                    <td><?php echo $row['katil_status'] ?></td>
                    <td><?php echo $row['katil_catatan'] ?></td>
                    <td><?php echo $row['kerusi_status'] ?></td>
                    <td><?php echo $row['kerusi_catatan'] ?></td>
                    <td><?php echo $row['almari_status'] ?></td>
                    <td><?php echo $row['almari_catatan'] ?></td>
                    <td><?php echo $row['mbbr_status'] ?></td>
                    <td><?php echo $row['mbbr_catatan'] ?></td>
                  </tr>
                <?php
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $('#example').DataTable({
        scrollX: true,
        scrollY: true
      });
    });
  </script>
</body>

</html>