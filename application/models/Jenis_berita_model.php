<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_berita_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function listing(){
                $query=$this->db->get('jenis_berita');
                return $query->result();
        }

        public function detail($id_jenis_berita){
                $query=$this->db->get_where('jenis_berita',array('id_jenis_berita'=>$id_jenis_berita));
                return $query->row();
        }
        public function tambah($data){
                $this->db->insert('jenis_berita',$data);

        }
        public function edit($data){
                $this->db->where('id_jenis_berita',$data['id_jenis_berita']);
                $this->db->update('jenis_berita', $data);
        }
        public function delete($data){
                $this->db->where('id_jenis_berita',$data['id_jenis_berita']);
                $this->db->delete('jenis_berita', $data);
        }
}