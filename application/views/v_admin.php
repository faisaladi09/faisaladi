<?php
  $db = new mysqli(db_host, db_user, db_pass, db_name);
  $sid = $this->session->userdata('id');
  $sql = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `user` WHERE id='$sid'"));
  $username = $sql['username'];
  $nama = $sql['nama'];
?>
<div class="row justify-content-md-center">
  <div class="col-10 rounded-sm border border-3 border-info p-3 mt-3">
    <h3>Selamat datang, <?= $nama; ?></h3>
    <h5>Username : <?= $username; ?></h5>
    <h5>Nama : <?= $nama; ?></h5>
    <br/>
    <a class="btn btn-success" href="<?= base_url('admin/tambah'); ?>">Tambah Berita</a>
    <a class="btn btn-danger" href="<?= base_url('login/logout'); ?>">Logout</a>
  </div>
</div>