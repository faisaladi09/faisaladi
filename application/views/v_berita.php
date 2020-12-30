<?php
  $this->load->view('konek');
  $db = new mysqli(db_host, db_user, db_pass, db_name);
  $id = $_GET['id'];
  $sql = mysqli_query($db, "SELECT * FROM `berita` WHERE id='$id'");
  $q = mysqli_fetch_assoc($sql);
  if (mysqli_num_rows($sql) < 1) {
    redirect();
  }
?>
<div class="row justify-content-md-center">
  <div class="col-10 rounded-sm border border-3 border-info p-3 mt-3">
    <center><img width="40%" src="<?= base_url('uploads/pictures/berita/'.$q['id'].'.png'); ?>"></center>
    <br/>
    <h4><?= $q['judul']; ?></h4>
    <br/>
    <?= str_replace('
', '<br/>', $q['isi']); ?>
  </div>
</div>