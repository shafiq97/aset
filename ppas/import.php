<?php

//import.php

include '../vendor/autoload.php';

$connect = new PDO("mysql:host=localhost;dbname=spakkp", "root", "");

if ($_FILES["import_excel"]["name"] != '') {
  $allowed_extension = array('xls', 'csv', 'xlsx');
  $file_array = explode(".", $_FILES["import_excel"]["name"]);
  $file_extension = end($file_array);

  if (in_array($file_extension, $allowed_extension)) {
    $file_name = time() . '.' . $file_extension;
    move_uploaded_file($_FILES['import_excel']['tmp_name'], $file_name);
    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

    $spreadsheet = $reader->load($file_name);

    unlink($file_name);

    $data = $spreadsheet->getActiveSheet()->toArray();

    foreach ($data as $row) {
      try{
        if ($row[0] != "" && !empty($row[0])) {
          $insert_data = array(
            ':no_matrik'  => $row[0],
            ':nama_pelajar'  => $row[1],
            ':email_pelajar'  => $row[2],
            ':kata_laluan_p'  => $row[3],
            ':sem_no'  => $row[4],
            ':tahun'  => $row[5],
            ':no_telefon_p'  => $row[6],
            ':kkp' => $row[7],
            ':aras' => $row[8],
            ':no_rumah' => $row[9],
            ':blok' => $row[10],
            ':status' => $row[11]
          );
  
          $query = "
                    INSERT INTO pelajar 
                      (
                      no_matrik, 
                      nama_pelajar, 
                      email_pelajar, 
                      kata_laluan_p, 
                      sem_no, 
                      tahun, 
                      no_telefon_p,
                      kkp,
                      aras,
                      no_rumah,
                      blok,
                      status
                      ) 
                    VALUES 
                      (
                      :no_matrik, 
                      :nama_pelajar, 
                      :email_pelajar, 
                      :kata_laluan_p, 
                      :sem_no, 
                      :tahun, 
                      :no_telefon_p,
                      :kkp,
                      :aras,
                      :no_rumah,
                      :blok,
                      :status
                      )
                    ";
  
          $statement = $connect->prepare($query);
          $statement->execute($insert_data);
        }
      }catch(Exception $e){
        // echo $e;
        continue;
      }

    }
    $message = '<div class="alert alert-success">Data Imported Successfully</div>';
  } else {
    $message = '<div class="alert alert-danger">Only .xls .csv or .xlsx file allowed</div>';
  }
} else {
  $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
