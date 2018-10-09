<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function listing(){
        	$query=$this->db->get('users');
        	return $query->result();
        }

        public function detail($id_user){
        	$query=$this->db->get_where('users',array('id_user'=>$id_user));
        	return $query->row();
        }
        public function lihat($email){
            $query=$this->db->get_where('users',array('email'=>$email));
            return $query->row();
        }
        public function tambah($data){
        	$this->db->insert('users',$data);

        }
        public function edit($data){
        	$this->db->where('id_user',$data['id_user']);
        	$this->db->update('users', $data);
        }
        
        public function delete($data){
        	$this->db->where('id_user',$data['id_user']);
        	$this->db->delete('users', $data);
        }
        public function cek_user($login) {
            $query = $this->db->get_where('users', $login);
            return $query;
        }
        
}