<?php
require '../conn.php';
if (isset($_POST['submit_tilam'])) {

  $tilam_status = $_POST['tilam_status'];
  $tilam_catatan = $_POST['catatan_tilam'];
  $akuan_id = $_POST['akuan_id'];

  $sql = "update akuan set tilam_status = '$tilam_status', tilam_catatan = '$tilam_catatan' where id_akuan = '$akuan_id'";


  if($conn->query($sql)){
    ?>
    <script>
    alert('berjaya dikemaskini!')
    window.location.href = 'edit_aset.php?tilam=<?php echo $akuan_id?>';
    </script>
    <?php
  }
}

if (isset($_POST['submit_katil'])) {

  $katil_status = $_POST['katil_status'];
  $katil_catatan = $_POST['catatan_katil'];
  $akuan_id = $_POST['akuan_id'];

  $sql = "update akuan set katil_status = '$katil_status', katil_catatan = '$katil_catatan' where id_akuan = '$akuan_id'";


  if($conn->query($sql)){
    ?>
    <script>
    alert('berjaya dikemaskini!')
    window.location.href = 'edit_aset.php?katil=<?php echo $akuan_id?>';
    </script>
    <?php
  }
}

if (isset($_POST['submit_almari'])) {

  $almari_status = $_POST['almari_status'];
  $almari_catatan = $_POST['catatan_almari'];
  $akuan_id = $_POST['akuan_id'];

  $sql = "update akuan set almari_status = '$almari_status', almari_catatan = '$almari_catatan' where id_akuan = '$akuan_id'";


  if($conn->query($sql)){
    ?>
    <script>
    alert('berjaya dikemaskini!')
    window.location.href = 'edit_aset.php?almari=<?php echo $akuan_id?>';
    </script>
    <?php
  }
}

if (isset($_POST['submit_kerusi'])) {

  $kerusi_status = $_POST['kerusi_status'];
  $kerusi_catatan = $_POST['catatan_kerusi'];
  $akuan_id = $_POST['akuan_id'];

  $sql = "update akuan set kerusi_status = '$kerusi_status', kerusi_catatan = '$kerusi_catatan' where id_akuan = '$akuan_id'";


  if($conn->query($sql)){
    ?>
    <script>
    alert('berjaya dikemaskini!')
    window.location.href = 'edit_aset.php?kerusi=<?php echo $akuan_id?>';
    </script>
    <?php
  }
}

if (isset($_POST['submit_mbbr'])) {

  $mbbr_status = $_POST['mbbr_status'];
  $mbbr_catatan = $_POST['catatan_mbbr'];
  $akuan_id = $_POST['akuan_id'];

  $sql = "update akuan set mbbr_status = '$mbbr_status', mbbr_catatan = '$mbbr_catatan' where id_akuan = '$akuan_id'";


  if($conn->query($sql)){
    ?>
    <script>
    alert('berjaya dikemaskini!')
    window.location.href = 'edit_aset.php?mbbr=<?php echo $akuan_id?>';
    </script>
    <?php
  }
}
?>