<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->form_validation->set_rules('username', '"Username"', 'required|trim|alpha_numeric');
        $this->form_validation->set_rules('password', '"Password"', 'required|trim|min_length[6]', ["min_length" => "Password too short!"]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SIGN IN';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/signIn');
            $this->load->view('templates/auth_footer');
        } else {
            $this->User_model->signin();
        }

        if ($this->session->userdata('username')) {
            redirect('warehouse/inventory');
        }
    }

    public function signup()
    {
        if ($this->session->userdata('username')) {
            redirect('user');
        }
        $this->form_validation->set_rules('username', '"Username"', 'required|trim|alpha_numeric|is_unique[user.username]', ["is_unique" => "Username already exists!"]);
        $this->form_validation->set_rules('name', '"Full Name"', 'required|trim|alpha');
        $this->form_validation->set_rules('email', '"Email"', 'required|trim|valid_email|is_unique[user.email]', ["is_unique" => "Email already exists!"]);
        $this->form_validation->set_rules('password1', '"Password"', 'required|trim|min_length[6]|matches[password2]', ["matches" => "Password doesn't match!", "min_length" => "Password too short!"]);
        $this->form_validation->set_rules('password2', '"Password"', 'required|trim|min_length[6]|matches[password1]', ["matches" => "Password doesn't match!", "min_length" => "Password too short!"]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SIGN UP';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/signUp');
            $this->load->view('templates/auth_footer');
        } else {
            $this->User_model->signup();
        }
    }

    public function signout()
    {
        $this->User_model->signout();
    }

    public function blocked()
    {
        $data['title'] = 'ACCESS DENIED';
        $data['user'] = $this->User_model->user();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}
