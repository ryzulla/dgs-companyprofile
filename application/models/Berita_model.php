<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function news($per_page,$row){
                $this->db->select('berita.*,  users.nama_user, users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->where('berita.status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $this->db->limit($per_page,$row);
                $query=$this->db->get();
                return $query->result();
        }
        public function berita_home(){
                $this->db->select('berita.*,  users.nama_user, users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->where('berita.status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $this->db->limit(3);
                $query=$this->db->get();
                return $query->result();
        }

        public function listing(){
                $this->db->select('berita.*,  users.nama_user, users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->like('berita.status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
        	$query=$this->db->get();
        	return $query->result();
        }

        public function jenis_berita($jenis_berita)
        {
                $this->db->select('berita.*,  users.nama_user,users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->like('berita.id_jenis_berita', $jenis_berita);
                $this->db->like('status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $query=$this->db->get();
                return $query->result();

        }

        public function kategori_berita($kategori_berita)
        {
                $this->db->select('berita.*,  users.nama_user,users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->like('berita.id_kategori_berita', $kategori_berita);
                $this->db->like('status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $query=$this->db->get();
                return $query->result();

        }

                public function jenis_laporan($id_user)
        {
                $this->db->select('berita.*, users.nama_user,users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->like('berita.id_user', $id_user);
                $this->db->like('status_berita', 'Publish');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $query=$this->db->get();
                return $query->result();

        }

        public function draft($id_user)
        {
                $this->db->select('berita.*,  users.nama_user,users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->like('berita.id_user', $id_user);
                $this->db->like('status_berita', 'Draft');
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $query=$this->db->get();
                return $query->result();

        }
         public function read($slug_berita){
                $this->db->select('berita.*,  users.nama_user, users.email, jenis_berita.nama_jenis_berita');
                $this->db->from('berita');
                $this->db->where('berita.status_berita', 'Publish');
                $this->db->where('berita.slug_berita', $slug_berita);
                $this->db->join('jenis_berita', 'jenis_berita.id_jenis_berita=berita.id_jenis_berita','LEFT');
                $this->db->join('users', 'users.id_user=berita.id_user','LEFT');
                $this->db->order_by('tanggal','DESC');
                $query=$this->db->get();
                return $query->row();
        }

        public function detail($id_berita){
                $query=$this->db->get_where('berita',array('id_berita'=>$id_berita));
                return $query->row();
        }

        public function akhir(){
                $query=$this->db->query('SELECT*FROM berita ORDER BY id_berita DESC');
                return $query->row();
        }

        public function tambah($data){
        	$this->db->insert('berita',$data);

        }
        public function edit($data){
        	$this->db->where('id_berita',$data['id_berita']);
        	$this->db->update('berita', $data);
        }
        public function delete($data){
        	$this->db->where('id_berita',$data['id_berita']);
        	$this->db->delete('berita', $data);
        }
        public function cek_berita($log) {
            $query = $this->db->get_where('berita', $log);
            return $query;
        }
}
