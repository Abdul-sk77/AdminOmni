<?php


class UserModel extends CI_Model{
    public function getProfileData($user_id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$user_id);
        return $this->db->get()->result();
    }

    public function updateProfile( $id,$updateData){
        $this->db->where('id', $id);
        $this->db->update('users',$updateData);
        return true;
    }
}