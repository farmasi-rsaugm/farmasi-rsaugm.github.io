<?php

function is_sign_in()
{
    $ci_this = get_instance();
    if (!$ci_this->session->userdata('username')) {
        redirect('auth');
    } else {
        $role_id = $ci_this->session->userdata('role_id');
        $menu = $ci_this->uri->segment(1);

        $queryMenu = $ci_this->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];

        $userAccess = $ci_this->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1) {
            redirect('auth/blocked');
        }
    }
}

function check_access($userRole_id, $menu_id)
{
    $ci_this = get_instance();

    $result = $ci_this->db->get_where('user_access_menu', ['role_id' => $userRole_id, 'menu_id' => $menu_id]);
    if ($result->num_rows() > 0) {
        return "checked = 'checked' ";
    }
}
