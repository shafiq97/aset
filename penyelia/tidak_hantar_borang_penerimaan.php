<?php
require "../conn.php";
session_start();
$sql = "select KKP from penyelia where id_staff = '$_SESSION[id_staff]'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $penyelia_kkp = $row['KKP'];
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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/penerimaan_penyelia.css">
</head>

<body>
  <div class="header">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;E-DECLARE</h3>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</p>
  </div>
  <?php include 'penyelia_sidenav.php' ?>
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

  <div class="content">
    <h3>Senarai Pelajar Tidak Hantar Borang Penerimaan</h3>
    <table id="example" class="display table" style="width:100%">
      <thead>
        <tr>
          <th>Nama Pelajar</th>
          <th>Email Pelajar</th>
          <th>No Telefon</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "select distinct pelajar.nama_pelajar, pelajar.email_pelajar, pelajar.no_telefon_p from pelajar inner join akuan where pelajar.no_matrik not in (select akuan.no_matrik from akuan) and pelajar.kkp = '$_SESSION[kkp]'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo $row['nama_pelajar'] ?></td>
              <td><?php echo $row['email_pelajar'] ?></td>
              <td><?php echo $row['no_telefon_p'] ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>

  <script>
    $(document).ready(function() {
      // Setup - add a text input to each footer cell
      $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');

      var table = $('#example').DataTable({
        scrollX: true,
        dom: 'Brtip',
        buttons: [
          'print'
        ],
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function() {
          var api = this.api();

          // For each column
          api
            .columns()
            .eq(0)
            .each(function(colIdx) {
              if (colIdx == 4 || colIdx == 5 || colIdx == 7) {
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
                // Set the header cell to contain the input element
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
            });
        },
      });
    });
  </script>
</body>

</html>