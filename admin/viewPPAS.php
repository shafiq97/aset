<?php
require "../conn.php";
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
  <?php include "admin_sidenav.php" ?>
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
    <table id="example" class="display table" style="width:100%">
      <thead>
        <tr>
          <th>Id PPAS</th>
          <th>Nama</th>
          <th>KKP</th>
          <th>Email</th>
          <th>No telefon</th>
          <th>Status</th>
          <th>Activate/Deactivate</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM ppas";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo $row['id_ppas'] ?></td>
              <td><?php echo $row['nama_ppas'] ?></td>
              <td><?php echo $row['KKP'] ?></td>
              <td><?php echo $row['email_ppas'] ?></td>
              <td><?php echo $row['no_telefon_ppas'] ?></td>
              <td>
                <?php 
                  if ($row['status'] == 0) {
                    echo "Not active";
                  }else{
                    echo "Active";
                  }
                ?>
              </td>
              <td>
                <?php
                if ($row['status'] == 0) {
                ?>
                  <a class="btn btn-success w-100" onclick="return confirm('Are you sure you want to activate this user?')" href="activate.php?id_ppas=<?php echo $row['id_ppas'] ?>">
                    Activate
                  </a>
                <?php
                }
                else{
                  ?>
                  <a class="btn btn-warning w-100" onclick="return confirm('Are you sure you want to deactivate this user?')" href="deactivate.php?id_ppas=<?php echo $row['id_ppas'] ?>">
                    Deactivate
                  </a>
                <?php
                }
                ?>
              </td>
              <td>
              <a class="btn btn-danger w-100" href="delete.php?ppas_id=<?php echo $row['id_ppas'] ?>" onclick="return confirm('Are you sure you want to delete this user?')">
                Delete
              </a>
              </td>
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
            });
        },
      });
    });
  </script>
</body>

</html>