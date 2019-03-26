<?php

class Auth extends CI_Controller
{
  public function __construct ()
  {
    parent::__construct();
    $this->load->library('form_validation');
  }

  public function index()
  {
    $this->form_validation->set_rules('nim', 'Nim', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {

      $data['judul'] = 'Login';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer');
    } else {
      // validasinya sukses
      $this->_login();
    }
  }

  private function _login()
  {
    $nim = $this->input->post('nim');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

    // jika usernya ada
    if ($user) {
      // cek password
      if (password_verify($password, $user['password'])) {

          $data = [
            'nim' => $user['nim'],
            'role_id' => $user['role_id']
          ];
          $this->session->set_userdata($data);
          redirect('home');

      } else {
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                                      Password Salah!</div>');
        redirect('auth');
      }

    } else {
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
                                    Nim Belum Terdaftar</div>');
      redirect('auth');
    }
  }

  public function registration() //
  {
    $this->form_validation->set_rules('nim', 'Nim', 'required|trim|is_unique[user.nim]', [
      'is_unique' => 'Nim Sudah pernah digunakan!'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
    $this->form_validation->set_rules('fakultas', 'Fakultas', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => 'Email Sudah pernah digunakan!'
    ]);
    $this->form_validation->set_rules('no_telpon', 'No_telpon', 'required|trim');
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
      'matches' => 'password tidak sama!',
      'min_length' => 'password terlalu singkat!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


    if ($this->form_validation->run() ==  false){
      $data['judul'] = 'Registration';
      $this->load->view('templates/auth_header', $data);
      $this->load->view('auth/registration');
      $this->load->view('templates/auth_footer');
    } else {
      $data  = [
        'nim' => htmlspecialchars($this->input->post('nim', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
        'email' => htmlspecialchars($this->input->post('email', true)),
        'no_telpon' => htmlspecialchars($this->input->post('no_telpon', true)),
        'image' => 'default.jpg',
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'role_id' => 2,
        'is_active' => 1,
        'date_created' => time(),
      ];

      $this->db->insert('user', $data);
      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                                    Register Berhasil! Silahkan Login</div>');
      redirect('auth');

  }
}

    public function logout()
    {
      $this->session->unset_userdata('nim');
      $this->session->unset_userdata('role_id');

      $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
                                    Berhasil Log Out!</div>');
      redirect('auth');
    }
}
