<?php
session_start();
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>PENGURUSAN ASET SYSTEM KOLEJ KEDIAMAN PAGOH</title>
  <link rel="stylesheet" href="css/style.css">
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <style>
    /* General Styles */

    * {
      box-sizing: border-box;
    }

    :root {
      --clr-white: rgb(255, 255, 255);
      --clr-black: rgb(0, 0, 0);
      --clr-light: rgb(245, 248, 255);
      --clr-light-gray: rgb(196, 195, 196);
      --clr-blue: rgb(63, 134, 255);
      --clr-light-blue: rgb(171, 202, 255);
    }

    /* End General Styles */

    /* Upload Area */
    .upload-area {
      width: 100%;
      max-width: 25rem;
      background-color: var(--clr-white);
      box-shadow: 0 10px 60px rgb(218, 229, 255);
      border: 2px solid var(--clr-light-blue);
      border-radius: 24px;
      padding: 2rem 1.875rem 5rem 1.875rem;
      margin: 0 auto;
      text-align: center;
    }

    .upload-area--open {
      /* Slid Down Animation */
      animation: slidDown 500ms ease-in-out;
    }

    @keyframes slidDown {
      from {
        height: 28.125rem;
        /* 450px */
      }

      to {
        height: 35rem;
        /* 560px */
      }
    }

    /* Header */
    .upload-area__header {}

    .upload-area__title {
      font-size: 1.8rem;
      font-weight: 500;
      margin-bottom: 0.3125rem;
    }

    .upload-area__paragraph {
      font-size: 0.9375rem;
      color: var(--clr-light-gray);
      margin-top: 0;
    }

    .upload-area__tooltip {
      position: relative;
      color: var(--clr-light-blue);
      cursor: pointer;
      transition: color 300ms ease-in-out;
    }

    .upload-area__tooltip:hover {
      color: var(--clr-blue);
    }

    .upload-area__tooltip-data {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -125%);
      min-width: max-content;
      background-color: var(--clr-white);
      color: var(--clr-blue);
      border: 1px solid var(--clr-light-blue);
      padding: 0.625rem 1.25rem;
      font-weight: 500;
      opacity: 0;
      visibility: hidden;
      transition: none 300ms ease-in-out;
      transition-property: opacity, visibility;
    }

    .upload-area__tooltip:hover .upload-area__tooltip-data {
      opacity: 1;
      visibility: visible;
    }

    /* Drop Zoon */
    .upload-area__drop-zoon {
      position: relative;
      height: 11.25rem;
      /* 180px */
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      border: 2px dashed var(--clr-light-blue);
      border-radius: 15px;
      margin-top: 2.1875rem;
      cursor: pointer;
      transition: border-color 300ms ease-in-out;
    }

    .upload-area__drop-zoon:hover {
      border-color: var(--clr-blue);
    }

    .drop-zoon__icon {
      display: flex;
      font-size: 3.75rem;
      color: var(--clr-blue);
      transition: opacity 300ms ease-in-out;
    }

    .drop-zoon__paragraph {
      font-size: 0.9375rem;
      color: var(--clr-light-gray);
      margin: 0;
      margin-top: 0.625rem;
      transition: opacity 300ms ease-in-out;
    }

    .drop-zoon:hover .drop-zoon__icon,
    .drop-zoon:hover .drop-zoon__paragraph {
      opacity: 0.7;
    }

    .drop-zoon__loading-text {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: none;
      color: var(--clr-light-blue);
      z-index: 10;
    }

    .drop-zoon__preview-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: contain;
      padding: 0.3125rem;
      border-radius: 10px;
      display: none;
      z-index: 1000;
      transition: opacity 300ms ease-in-out;
    }

    .drop-zoon:hover .drop-zoon__preview-image {
      opacity: 0.8;
    }

    .drop-zoon__file-input {
      display: none;
    }

    /* (drop-zoon--over) Modifier Class */
    .drop-zoon--over {
      border-color: var(--clr-blue);
    }

    .drop-zoon--over .drop-zoon__icon,
    .drop-zoon--over .drop-zoon__paragraph {
      opacity: 0.7;
    }

    /* (drop-zoon--over) Modifier Class */
    .drop-zoon--Uploaded {}

    .drop-zoon--Uploaded .drop-zoon__icon,
    .drop-zoon--Uploaded .drop-zoon__paragraph {
      display: none;
    }

    /* File Details Area */
    .upload-area__file-details {
      height: 0;
      visibility: hidden;
      opacity: 0;
      text-align: left;
      transition: none 500ms ease-in-out;
      transition-property: opacity, visibility;
      transition-delay: 500ms;
    }

    /* (duploaded-file--open) Modifier Class */
    .file-details--open {
      height: auto;
      visibility: visible;
      opacity: 1;
    }

    .file-details__title {
      font-size: 1.125rem;
      font-weight: 500;
      color: var(--clr-light-gray);
    }

    /* Uploaded File */
    .uploaded-file {
      display: flex;
      align-items: center;
      padding: 0.625rem 0;
      visibility: hidden;
      opacity: 0;
      transition: none 500ms ease-in-out;
      transition-property: visibility, opacity;
    }

    /* (duploaded-file--open) Modifier Class */
    .uploaded-file--open {
      visibility: visible;
      opacity: 1;
    }

    .uploaded-file__icon-container {
      position: relative;
      margin-right: 0.3125rem;
    }

    .uploaded-file__icon {
      font-size: 3.4375rem;
      color: var(--clr-blue);
    }

    .uploaded-file__icon-text {
      position: absolute;
      top: 1.5625rem;
      left: 50%;
      transform: translateX(-50%);
      font-size: 0.9375rem;
      font-weight: 500;
      color: var(--clr-white);
    }

    .uploaded-file__info {
      position: relative;
      top: -0.3125rem;
      width: 100%;
      display: flex;
      justify-content: space-between;
    }

    .uploaded-file__info::before,
    .uploaded-file__info::after {
      content: '';
      position: absolute;
      bottom: -0.9375rem;
      width: 0;
      height: 0.5rem;
      background-color: #ebf2ff;
      border-radius: 0.625rem;
    }

    .uploaded-file__info::before {
      width: 100%;
    }

    .uploaded-file__info::after {
      width: 100%;
      background-color: var(--clr-blue);
    }

    /* Progress Animation */
    .uploaded-file__info--active::after {
      animation: progressMove 800ms ease-in-out;
      animation-delay: 300ms;
    }

    @keyframes progressMove {
      from {
        width: 0%;
        background-color: transparent;
      }

      to {
        width: 100%;
        background-color: var(--clr-blue);
      }
    }

    .uploaded-file__name {
      width: 100%;
      max-width: 6.25rem;
      /* 100px */
      display: inline-block;
      font-size: 1rem;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .uploaded-file__counter {
      font-size: 1rem;
      color: var(--clr-light-gray);
    }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="banner-area">
    <h2>SISTEM PENGURUSAN ASET KOLEJ KEDIAMAN PAGOH</h2>
  </div>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">PASKKP</div>
    </div>
    <ul class="nav_list">
      <li>
        <a href="">
          <span class="links_name">Profil</span></i>
        </a>
      </li>
      <li>
        <a href="">
          <span class="links_name">Muat Naik Excel</span></i>
        </a>
      </li>
      <li>
        <a href="penerimaan.php">
          <span class="links_name">Penerimaan aset</span>
        </a>
      </li>
      <li>
        <a href="pemulangan.php">
          <span class="links_name">Pemulangan aset</span>
        </a>
      </li>
      <li>
        <a href="index.php">
          <span class="links_name">Keluar</span></i>
        </a>
      </li>
    </ul>
  </div>
  <div class="content">
    <h2 style="text-align: center">Selamat datang Penyelia KKKP UTHM.</h2>
    <div style="margin-top: 5%;">
      <!-- Upload Area -->
      <div style="text-align: center;" id="uploadArea" class="upload-area">
        <!-- Header -->
        <div class="upload-area__header">
          <h1 class="upload-area__title">Upload your file</h1>
          <p class="upload-area__paragraph">
            <strong class="upload-area__tooltip">
              <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
            </strong>
          </p>
        </div>
        <!-- End Header -->

        <!-- Drop Zoon -->
        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
          <span class="drop-zoon__icon">
            <i class='bx bxs-file-image'></i>
          </span>
          <p class="drop-zoon__paragraph">Drop your file here or Click to browse</p>
          <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
          <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
          <input type="file" id="fileInput" class="drop-zoon__file-input" accept="image/*">
        </div>
        <!-- End Drop Zoon -->

        <!-- File Details -->
        <div id="fileDetails" class="upload-area__file-details file-details">
          <h3 class="file-details__title">Uploaded File</h3>

          <div id="uploadedFile" class="uploaded-file">
            <div class="uploaded-file__icon-container">
              <i class='bx bxs-file-blank uploaded-file__icon'></i>
              <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
            </div>

            <div id="uploadedFileInfo" class="uploaded-file__info">
              <span class="uploaded-file__name">Proejct 1</span>
              <span class="uploaded-file__counter">0%</span>
            </div>
          </div>
        </div>
        <!-- End File Details -->
      </div>
      <!-- End Upload Area -->
    </div>

  </div>

  <script defer>
    // Design By
    // - https://dribbble.com/shots/13992184-File-Uploader-Drag-Drop

    // Select Upload-Area
    const uploadArea = document.querySelector('#uploadArea')

    // Select Drop-Zoon Area
    const dropZoon = document.querySelector('#dropZoon');

    // Loading Text
    const loadingText = document.querySelector('#loadingText');

    // Slect File Input 
    const fileInput = document.querySelector('#fileInput');

    // Select Preview Image
    const previewImage = document.querySelector('#previewImage');

    // File-Details Area
    const fileDetails = document.querySelector('#fileDetails');

    // Uploaded File
    const uploadedFile = document.querySelector('#uploadedFile');

    // Uploaded File Info
    const uploadedFileInfo = document.querySelector('#uploadedFileInfo');

    // Uploaded File  Name
    const uploadedFileName = document.querySelector('.uploaded-file__name');

    // Uploaded File Icon
    const uploadedFileIconText = document.querySelector('.uploaded-file__icon-text');

    // Uploaded File Counter
    const uploadedFileCounter = document.querySelector('.uploaded-file__counter');

    // ToolTip Data
    const toolTipData = document.querySelector('.upload-area__tooltip-data');

    // Images Types
    const imagesTypes = [
      "jpeg",
      "png",
      "svg",
      "gif"
    ];

    // Append Images Types Array Inisde Tooltip Data
    toolTipData.innerHTML = [...imagesTypes].join(', .');

    // When (drop-zoon) has (dragover) Event 
    dropZoon.addEventListener('dragover', function(event) {
      // Prevent Default Behavior 
      event.preventDefault();

      // Add Class (drop-zoon--over) On (drop-zoon)
      dropZoon.classList.add('drop-zoon--over');
    });

    // When (drop-zoon) has (dragleave) Event 
    dropZoon.addEventListener('dragleave', function(event) {
      // Remove Class (drop-zoon--over) from (drop-zoon)
      dropZoon.classList.remove('drop-zoon--over');
    });

    // When (drop-zoon) has (drop) Event 
    dropZoon.addEventListener('drop', function(event) {
      // Prevent Default Behavior 
      event.preventDefault();

      // Remove Class (drop-zoon--over) from (drop-zoon)
      dropZoon.classList.remove('drop-zoon--over');

      // Select The Dropped File
      const file = event.dataTransfer.files[0];

      // Call Function uploadFile(), And Send To Her The Dropped File :)
      uploadFile(file);
    });

    // When (drop-zoon) has (click) Event 
    dropZoon.addEventListener('click', function(event) {
      // Click The (fileInput)
      fileInput.click();
    });

    // When (fileInput) has (change) Event 
    fileInput.addEventListener('change', function(event) {
      // Select The Chosen File
      const file = event.target.files[0];

      // Call Function uploadFile(), And Send To Her The Chosen File :)
      uploadFile(file);
    });

    // Upload File Function
    function uploadFile(file) {
      // FileReader()
      const fileReader = new FileReader();
      // File Type 
      const fileType = file.type;
      // File Size 
      const fileSize = file.size;

      // If File Is Passed from the (File Validation) Function
      if (fileValidate(fileType, fileSize)) {
        // Add Class (drop-zoon--Uploaded) on (drop-zoon)
        dropZoon.classList.add('drop-zoon--Uploaded');

        // Show Loading-text
        loadingText.style.display = "block";
        // Hide Preview Image
        previewImage.style.display = 'none';

        // Remove Class (uploaded-file--open) From (uploadedFile)
        uploadedFile.classList.remove('uploaded-file--open');
        // Remove Class (uploaded-file__info--active) from (uploadedFileInfo)
        uploadedFileInfo.classList.remove('uploaded-file__info--active');

        // After File Reader Loaded 
        fileReader.addEventListener('load', function() {
          // After Half Second 
          setTimeout(function() {
            // Add Class (upload-area--open) On (uploadArea)
            uploadArea.classList.add('upload-area--open');

            // Hide Loading-text (please-wait) Element
            loadingText.style.display = "none";
            // Show Preview Image
            previewImage.style.display = 'block';

            // Add Class (file-details--open) On (fileDetails)
            fileDetails.classList.add('file-details--open');
            // Add Class (uploaded-file--open) On (uploadedFile)
            uploadedFile.classList.add('uploaded-file--open');
            // Add Class (uploaded-file__info--active) On (uploadedFileInfo)
            uploadedFileInfo.classList.add('uploaded-file__info--active');
          }, 500); // 0.5s

          // Add The (fileReader) Result Inside (previewImage) Source
          previewImage.setAttribute('src', fileReader.result);

          // Add File Name Inside Uploaded File Name
          uploadedFileName.innerHTML = file.name;

          // Call Function progressMove();
          progressMove();
        });

        // Read (file) As Data Url 
        fileReader.readAsDataURL(file);
      } else { // Else

        this; // (this) Represent The fileValidate(fileType, fileSize) Function

      };
    };

    // Progress Counter Increase Function
    function progressMove() {
      // Counter Start
      let counter = 0;

      // After 600ms 
      setTimeout(() => {
        // Every 100ms
        let counterIncrease = setInterval(() => {
          // If (counter) is equle 100 
          if (counter === 100) {
            // Stop (Counter Increase)
            clearInterval(counterIncrease);
          } else { // Else
            // plus 10 on counter
            counter = counter + 10;
            // add (counter) vlaue inisde (uploadedFileCounter)
            uploadedFileCounter.innerHTML = `${counter}%`
          }
        }, 100);
      }, 600);
    };


    // Simple File Validate Function
    function fileValidate(fileType, fileSize) {
      // File Type Validation
      let isImage = imagesTypes.filter((type) => fileType.indexOf(`image/${type}`) !== -1);

      // If The Uploaded File Type Is 'jpeg'
      if (isImage[0] === 'jpeg') {
        // Add Inisde (uploadedFileIconText) The (jpg) Value
        uploadedFileIconText.innerHTML = 'jpg';
      } else { // else
        // Add Inisde (uploadedFileIconText) The Uploaded File Type 
        uploadedFileIconText.innerHTML = isImage[0];
      };

      // If The Uploaded File Is An Image
      if (isImage.length !== 0) {
        // Check, If File Size Is 2MB or Less
        if (fileSize <= 2000000) { // 2MB :)
          return true;
        } else { // Else File Size
          return alert('Please Your File Should be 2 Megabytes or Less');
        };
      } else { // Else File Type 
        return alert('Please make sure to upload An Image File Type');
      };
    };

    // :)
  </script>
</body>

</html>

<?php


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}



?>