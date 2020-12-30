<?php

  defined('BASEPATH') OR exit('No direct script access allowed');

  class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function index() {
    if($this->session->userdata('authenticated')) {
      redirect('admin');
    }
    $this->load->view('v_header');
    $this->load->view('v_login');
  }

  public function login() {
    $this->load->view('konek');
    $db = new mysqli(db_host, db_user, db_pass, db_name);
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $pra_sql = mysqli_query($db, "SELECT * FROM `user` WHERE username='$username'");
    $sql = mysqli_fetch_assoc($pra_sql);
    if (mysqli_num_rows($pra_sql) > 0) {
      if ($password == $sql['password']) {
        $session = array(
          'authenticated'=>true,
          'id'=>$sql['id']
        );
        $this->session->set_userdata($session);
        redirect('admin');
      } else {
        $this->session->set_flashdata('message', 'Password salah');
        redirect('login');
      }
    } else {
      $this->session->set_flashdata('message', 'Username tidak ditemukan');
      redirect('login');
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect('login');
  }
}