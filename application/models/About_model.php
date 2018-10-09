<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function listing(){
                $query=$this->db->get('about');
                return $query->result();
        }

        public function detail($id_about){
                $query=$this->db->get_where('about',array('id_about'=>$id_about));
                return $query->row();
        }
        public function tambah($data){
                $this->db->insert('about',$data);

        }
        public function edit($data){
                $this->db->where('id_about',$data['id_about']);
                $this->db->update('about', $data);
        }
        public function delete($data){
                $this->db->where('id_about',$data['id_about']);
                $this->db->delete('about', $data);
        }
}
