<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
session_start();
require '../conn.php';

$sql = "select KKP from ppas where id_ppas = '$_SESSION[id_ppas]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $ppas_kkp = $row['KKP'];
  }
}

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
  <link rel="stylesheet" href="../css/paparan.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  </div>
  <?php include 'ppas_sidenav.php' ?>

  <div class="content">
    <table id="example" class="display nowrap" style="width:100%">
      <thead>
        <tr>
          <th>No Matrik</th>
          <th>Nama Pelajar</th>
          <th>Sem</th>
          <th>Tahun</th>
          <th>No Telefon</th>
          <th>KKP</th>
          <th>Blok</th>
          <th>No Rumah</th>
          <th>No Kunci</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM pelajar where kkp = '$ppas_kkp'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo $row['no_matrik'] ?></td>
              <td><?php echo $row['nama_pelajar'] ?></td>
              <td><?php echo $row['sem_no'] ?></td>
              <td><?php echo $row['tahun'] ?></td>
              <td><?php echo $row['no_telefon_p'] ?></td>
              <td><?php echo $row['kkp'] ?></td>
              <td><?php echo $row['blok'] ?></td>
              <td><?php echo $row['no_rumah'] ?></td>
              <td><?php echo $row['kkp'] . "-" . $row['aras'] . "-" . $row['blok'] . "-" . $row['no_rumah']; ?></td>
              <?php
              if ($row['status'] == 0) {
              ?>
                <td>Not Active</td>
              <?php
              } else {
              ?>
                <td>Active</td>
              <?php
              }
              ?>
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
  <script>
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');

      var table = $('#example').DataTable({
        dom: 'Brtip',
        scrollX: true,
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function() {
          var api = this.api();
          // For each column
          api
            .columns()
            .eq(0)
            .each(function(colIdx) {
              // Set the header cell to contain the input element
              if (colIdx == 6 || colIdx == 7) {
                api.columns([colIdx]).every(function() {
                  var column = this;
                  console.log(this.index())
                  var select = $('<br><select><option value=""></option></select>')
                    .appendTo($('thead tr:eq(1) th:eq(' + this.index() + ')'))
                    .on('change', function() {
                      var val = $.fn.dataTable.util.escapeRegex(
                        $(this).val()
                      );

                      column
                        .search(val ? '^' + val + '$' : '', true, false)
                        .draw();
                    });

                  column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                  });
                });
              } else {
                if (colIdx != 5) {
                  var cell = $('.filters th').eq(
                    $(api.column(colIdx).header()).index()
                  );
                  var title = $(cell).text();
                  $(cell).html('<input type="text" placeholder="' + title + '" />');

                  // On every keypress in this input
                  $(
                      'input',
                      $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                    .off('keyup change')
                    .on('change', function(e) {
                      // Get the search value
                      $(this).attr('title', $(this).val());
                      var regexr = '({search})'; //$(this).parents('th').find('select').val();

                      var cursorPosition = this.selectionStart;
                      // Search the column for that value
                      api
                        .column(colIdx)
                        .search(
                          this.value != '' ?
                          regexr.replace('{search}', '(((' + this.value + ')))') :
                          '',
                          this.value != '',
                          this.value == ''
                        )
                        .draw();
                    })
                    .on('keyup', function(e) {
                      e.stopPropagation();

                      $(this).trigger('change');
                      $(this)
                        .focus()[0]
                        .setSelectionRange(cursorPosition, cursorPosition);
                    });
                }
              }
            });
        },
      });
    });
  </script>

</body>

</html>