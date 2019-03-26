<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_ruang extends CI_Model{

  private $_table = "tb_ruang";

   public $id;
   public $image = "default.jpg";
   public $no_ruang;
   public $status;

 function rules()
    {
        return [
            ['field' => 'no_ruang',
            'label' => 'Nomor ruang',
            'rules' => 'required'],


            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }


       function getAll()
      {
          return $this->db->get($this->_table)->result();
      }

       function getById($id)
      {
          return $this->db->get_where($this->_table, ["id" => $id])->row();
      }

      public function save()
      {
          $post = $this->input->post();
          $this->no_ruang = $post["no_ruang"];
          $this->status = $post["status"];
          $this->db->insert($this->_table, $this);
      }

      public function update($id) //variabel id diinclude di fungsi modelnya terus di cari pakai id nya
      { 
            // data yang diambil dari form terus di masukin ke databasenya
          $data = [
            'no_ruang' => $this->input->post('no_ruang'),
            'status' => $this->input->post('status')
          ];

          $this->db->where('id', $id);
          $this->db->update($this->_table, $data);
      }

      public function delete($id)
      {
          return $this->db->delete($this->_table, array("id" => $id));
      }
  }
