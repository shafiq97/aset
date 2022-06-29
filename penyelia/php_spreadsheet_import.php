<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();

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
  <link rel="stylesheet" href="../css/profil_penyelia.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  </div>
  <?php
  include 'penyelia_sidenav.php';
  ?>

  <div class="content">

    <body>
      <center>
        <div class="container">
          <br />
          <h3 align="center">Import Data Pelajar(Excel)</h3>
          <br />
          <div class="panel panel-default">
            <div class="panel-heading" style="font-size: 25px;">Import Data Pelajar(Excel) atau Fail CSV ke Mysql menggunakan PHPSpreadsheet</div>
            <div class="panel-body">
              <div class="table-responsive">
                <span id="message"></span>
                <form method="post" id="import_excel_form" enctype="multipart/form-data">
                  <table class="table">
                    <tr>
                      <td width="25%" align="right">Sila pilih fail Excel</td>
                      <td width="50%">
                      <input id="file" class="btn btn-success" type="file" name="import_excel" /></td>
                      <td width="25%"><input type="submit" name="import" id="import" class="btn btn-primary" value="Muat Naik" /></td>
                    </tr>
                  </table>
                </form>
                <br />
              </div>
            </div>
          </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      </center>
    </body>



  </div>

  <script>
    $(document).ready(function() {
      $('#import_excel_form').on('submit', function(event) {
        event.preventDefault();
        $.ajax({
          url: "import.php",
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
            $('#import').attr('disabled', 'disabled');
            $('#import').val('Importing...');
          },
          success: function(data) {
            $('#message').html(data);
            $('#import_excel_form')[0].reset();
            $('#import').attr('disabled', false);
            $('#import').val('Import');
          }
        })
      });
    });
  </script>
  ?
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