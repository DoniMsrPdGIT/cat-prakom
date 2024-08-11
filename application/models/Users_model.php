<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
    
    public function getDatausers($id = null)
    {
        $this->datatables->select('users.id, username, first_name, last_name, users.email, FROM_UNIXTIME(created_on) as created_on, last_login, active,users.activation_code AS activation_code, groups.name as level, mahasiswa.nama, mahasiswa.no_peserta');
        $this->datatables->from('users_groups');
        $this->datatables->join('users', 'users_groups.user_id=users.id');
		 $this->datatables->join('mahasiswa', 'users.username=mahasiswa.nim');
        $this->datatables->join('groups', 'users_groups.group_id=groups.id');
        if($id !== null){
            $this->datatables->where('users.id !=', $id);
        }
        return $this->datatables->generate();
    }
}