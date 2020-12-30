<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin extends CI_Controller {

    function __construct(){
      parent::__construct();
      date_default_timezone_set('Asia/Jakarta');
      if(!$this->session->userdata('authenticated')) {
        redirect('login');
      }
      $this->load->view('konek');
    }

    public function index() {
      $this->load->view('v_header');
      $this->load->view('v_admin');
    }

    public function tambah() {
      $this->load->view('v_header');
      $this->load->view('v_tambah');
    }

    public function tambah_aksi() {
      $db = new mysqli(db_host, db_user, db_pass, db_name);
      $gid = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `berita` ORDER BY id desc"));
      $id = $gid['id']+1;
      $user_id = $this->session->userdata('id');
      $judul = $this->input->post('judul');
      $isi = $this->input->post('isi');

      mysqli_query($db, "INSERT INTO berita SET id='$id', user_id='$user_id', judul='$judul', isi='$isi'");

      $config['upload_path'] = 'uploads/pictures/berita/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
      $config['file_name'] = $id.'.png';
      $config['overwrite'] = TRUE;

      $this->load->library('upload', $config);

      $this->upload->do_upload('thumbnail');
      $gbr = $this->upload->data();

      $config['image_library'] = 'gd2';
      $config['source_image'] = 'uploads/pictures/berita/'.$gbr['file_name'];
      $config['create_thumb'] = FALSE;
      $config['maintain_ratio'] = TRUE;
      $config['width'] = 512;
      $config['new_image'] = 'uploads/pictures/berita/'.$gbr['file_name'];
      $this->load->library('image_lib', $config);
      $this->image_lib->resize();

      redirect('admin');
    }
  }
?>