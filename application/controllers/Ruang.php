<?php

class Ruang extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("m_ruang");
    $this->load->library('form_validation');
  }
  public function index()
  {
    $data['judul'] = 'Ruang Diskusi';
    $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
    $data["tb_ruang"] = $this->m_ruang->getAll();

    $this->load->view('templates/header', $data);
    $this->load->view('ruang/index', $data);
    $this->load->view('templates/footer');
  }

   function add()
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['judul'] = 'Tambah Ruang';
       $tb_ruang = $this->m_ruang;
       $validation = $this->form_validation;
       $validation->set_rules($tb_ruang->rules());

       if ($validation->run()) {
           $tb_ruang->save();
           $this->session->set_flashdata('success', 'Berhasil disimpan');
       }

       $this->load->view('templates/admin_header', $data);
       $this->load->view("admin/new_ruang");
       $this->load->view('templates/admin_footer');
   }

    function edit($id)
   {
      $data['user'] = $this->db->get_where('user', ['nim' => $this->session->userdata('nim')])->row_array();
      $data['judul'] = 'Edit Ruang';

       if (!isset($id)) redirect('admin');

       $tb_ruang = $this->m_ruang;
       $validation = $this->form_validation;
       $validation->set_rules($tb_ruang->rules());

       if ($validation->run()) {
        $tb_ruang->update($id);  //variabel $id ditambahin buat ngambil id di urlnya
           $this->session->set_flashdata('success', 'Berhasil disimpan'); //sessionnya belum bisa, silahkan di coba
           redirect('admin'); //selesai proses di redirect 
       }

       $data["tb_ruang"] = $tb_ruang->getById($id);
       if (!$data["tb_ruang"]) show_404();

       $this->load->view('templates/admin_header', $data);
       $this->load->view('admin/edit_ruang', $data);
       $this->load->view('templates/admin_footer');

   }

    function delete($id = null)
   {
       if (!isset($id)) show_404();

       if ($this->m_ruang->delete($id)) {
           redirect('admin/index');
       }
   }

   private function _uploadImage()
{
    $config['upload_path']          = './asset/img/ruang/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['file_name']            = $this->id;
    $config['overwrite']		      	= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }

    return "default.jpg";
}

}
