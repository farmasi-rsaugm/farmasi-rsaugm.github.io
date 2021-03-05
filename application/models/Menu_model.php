<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getMenu()
    {
        return $this->db->get('user_menu')->result_array();
    }

    public function addMenu()
    {
        $menu = [
            'menu' => $this->input->post('menu', true)
        ];

        $this->db->insert('user_menu', $menu);
    }

    public function editMenu($id, $menu)
    {
        $this->db->set('menu', $menu);
        $this->db->where('id', $id);
        $this->db->update('user_menu');
    }


    public function deleteMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
    }

    public function getSubMenu()
    {
        $query = "SELECT usm.*, um.menu
                    FROM user_sub_menu AS usm JOIN user_menu AS um
                      ON usm.menu_id = um.id
                 ";

        return $this->db->query($query)->result_array();
    }

    public function addSubMenu($data)
    {

        $this->db->insert('user_sub_menu', $data);
    }

    public function changeSubMenu($id, $data)
    {

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user_sub_menu');
    }

    public function deleteSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
    }
}
