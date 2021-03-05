<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_sign_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->User_model->user();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function userRole()
    {
        $data['title'] = 'User Role';
        $data['user'] = $this->User_model->user();
        $data['userRole'] = $this->User_model->getUserRole();
        $data['menu'] = $this->Menu_model->getMenu();

        $this->form_validation->set_rules('role', 'User Role', 'required|regex_match[/^[a-zA-Z0 ]*$/]|is_unique[user_role.role]', ["required" => "User Role is blank!", "is_unique" => "User Role already exists!", "regex_match" => "User Role char only and space"]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/userRole', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->addUserRole();
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success mt-3" role="alert">
                    New user role has been <strong>Added</strong>.
                    <button type="button" class="close ml-3" aria-label="Close" data-dismiss="alert">
                        <span aria-hidden="true">&times;</span>
                    </button>
                 </div>'
            );
            redirect('admin/userRole');
        }
    }


    public function roleAccsess($id)
    {
        $data['title'] = 'Role Accsess';
        $data['user'] = $this->User_model->user();
        $data['userRole'] = $this->User_model->getUserRoleById($id);
        $this->db->where('id !=', 1);
        $this->db->where('id !=', 2);
        $data['menu'] = $this->Menu_model->getMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $roleId = $this->input->post('roleId');

        $this->User_model->editUserAccess($roleId, $menu_id);
    }

    public function deleteUserRole($id)
    {
        $this->User_model->deleteUserRole($id);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-danger mt-3" role="alert">
                  User Role has been <strong>Added</strong>.
                  <button type="button" class="close ml-3" aria-label="Close" data-dismiss="alert">
                      <span aria-hidden="true">&times;</span>
                  </button>
             </div>'
        );
        redirect('admin/userRole');
    }
}
