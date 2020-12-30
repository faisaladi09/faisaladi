<div class="row justify-content-md-center">
  <div class="col-10 rounded-sm border border-3 border-info p-3 mt-3">
    <h2 class="text-center">Tambah Berita</h2>
    <br/>
    <form action="<?= base_url('admin/tambah_aksi'); ?>" method="POST" enctype="multipart/form-data">
      <b>Thumbnail :</b>
      <input type="file" name="thumbnail" class="form-control">
      <br/>
      <b>Judul :</b>
      <input placeholder="Judul Berita" type="text" name="judul" class="form-control">
      <br/>
      <b>Isi :</b>
      <textarea placeholder="Isi Berita" class="form-control" name="isi" style="min-height: 150px;"></textarea>
      <br/>
      <input type="submit" class="btn btn-success" value="Posting">
    </form>
  </div>
</div>