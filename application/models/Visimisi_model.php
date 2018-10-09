<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function listing(){
                $query=$this->db->get('visimisi');
                return $query->result();
        }

        public function detail($id_visimisi){
                $query=$this->db->get_where('visimisi',array('id_visimisi'=>$id_visimisi));
                return $query->row();
        }
        public function tambah($data){
                $this->db->insert('visimisi',$data);

        }
        public function edit($data){
                $this->db->where('id_visimisi',$data['id_visimisi']);
                $this->db->update('visimisi', $data);
        }
        public function delete($data){
                $this->db->where('id_visimisi',$data['id_visimisi']);
                $this->db->delete('visimisi', $data);
        }
}
