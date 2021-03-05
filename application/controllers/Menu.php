<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_sign_in();
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->User_model->user();
        $data['menu'] = $this->Menu_model->getMenu();
        $data['subMenu'] = $this->Menu_model->getSubMenu();

        $this->form_validation->set_rules('menu', 'Menu', 'required|regex_match[/^[a-zA-Z0 ]*$/]|is_unique[user_menu.menu]', ["required" => "Menu name is blank!", "is_unique" => "Menu already exists!", "regex_match" => "Menu name char only and space"]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addMenu();
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success mt-3" role="alert">
                      New menu has been <strong>Added</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>'
            );
            redirect('menu');
        }
    }

    public function editMenu()
    {


        $this->form_validation->set_rules('menu', 'Menu', 'required|regex_match[/^[a-zA-Z0 ]*$/]|is_unique[user_menu.menu]', ["required" => "Menu name is blank!", "is_unique" => "Menu already exists!", "regex_match" => "Menu name char only and space"]);

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $id = $this->input->post('id');
            $menu =  $this->input->post('menu');
            $this->Menu_model->editMenu($id, $menu);

            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-warning mt-3" role="alert">
                      Menu has been <strong>changed</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>'
            );
            redirect('menu');
        }
    }

    public function deleteMenu($id)
    {
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-danger mt-3" role="alert">
                  Menu has been <strong>Deleted</strong>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>'
        );
        redirect('menu');
    }

    public function subMenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->User_model->user();
        $data['menu'] = $this->Menu_model->getMenu();
        $data['subMenu'] = $this->Menu_model->getSubMenu();

        $this->form_validation->set_rules('title', 'Submenu', 'required|regex_match[/^[a-zA-Z0 ]*$/]|is_unique[user_sub_menu.title]', ["required" => "Submenu name is blank!", "is_unique" => "Submenu already exists!", "regex_match" => "Submenu name char only and space"]);

        $this->form_validation->set_rules('menu_id', 'Menu', 'required', ["required" => "Menu name is blank!"]);
        $this->form_validation->set_rules('url', 'Url', 'required', ["required" => "Url is blank!"]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', ["required" => "Icon is blank!"]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title', true),
                'menu_id' => $this->input->post('menu_id', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true)
            ];
            $this->Menu_model->addSubMenu($data);
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success mt-3" role="alert">
                      New submenu has been <strong>Added</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>'
            );
            redirect('menu/submenu');
        }
    }

    public function editSubMenu($id)
    {
        $data['user'] = $this->User_model->user();
        $data['menu'] = $this->Menu_model->getMenu();
        $data['subMenu'] = $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
        $data['title'] =  'Edit Sub Menu : ' . $data['subMenu']['title'];

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/editSubMenu', $data);
        $this->load->view('templates/footer');
    }

    public function changeSubMenu()
    {
        $this->form_validation->set_rules('title', 'Submenu', 'required|regex_match[/^[a-zA-Z0 ]*$/]', ["required" => "Submenu name is blank!", "regex_match" => "Submenu name char only and space"]);

        $this->form_validation->set_rules('menu_id', 'Menu', 'required', ["required" => "Menu name is blank!"]);
        $this->form_validation->set_rules('url', 'Url', 'required', ["required" => "Url is blank!"]);
        $this->form_validation->set_rules('icon', 'Icon', 'required', ["required" => "Icon is blank!"]);


        $id = $this->input->post('id');
        if ($this->form_validation->run() == false) {
            $this->editSubMenu($id);
        } else {
            $data = [
                'title' => $this->input->post('title', true),
                'menu_id' => $this->input->post('menu_id', true),
                'url' => $this->input->post('url', true),
                'icon' => $this->input->post('icon', true),
                'is_active' => $this->input->post('is_active', true)
            ];

            $this->Menu_model->changeSubMenu($id, $data);
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success mt-3" role="alert">
                      New submenu has been <strong>Changed</strong>.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                 </div>'
            );
            redirect('menu/submenu');
        }
    }



    public function deleteSubMenu($id)
    {
        $this->Menu_model->deleteSubMenu($id);
        $this->session->set_flashdata(
            'alert',
            '<div class="alert alert-danger mt-3" role="alert">
                  Submenu has been <strong>Deleted</strong>.
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
             </div>'
        );
        redirect('menu/submenu');
    }
}
