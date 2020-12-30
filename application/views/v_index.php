<?php
  $this->load->view('konek');
  $db = new mysqli(db_host, db_user, db_pass, db_name);
  $sql = mysqli_query($db, "SELECT * FROM `berita` ORDER BY id DESC");
  if (mysqli_num_rows($sql) < 1) {
    echo '<br/><center><h4>Tidak ada berita!</h4></center>';
  }
  while ($q = mysqli_fetch_assoc($sql)) {
?>
    <div class="row justify-content-md-center">
      <div class="col-10 rounded-sm border border-3 border-info p-3 mt-3">
        <div class="row">
          <div class="col-3">
            <img width="100%" src="<?= base_url('uploads/pictures/berita/'.$q['id'].'.png'); ?>">
          </div>
          <div class="col-9">
            <h4><a style="text-decoration: none;" href="<?= base_url('berita?id='.$q['id']); ?>"><?= $q['judul']; ?></a></h4>
          </div>
        </div>
      </div>
    </div>
<?php
  }
?>