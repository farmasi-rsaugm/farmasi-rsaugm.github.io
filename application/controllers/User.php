<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_sign_in();
    }

    public function index()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->User_model->user();
        $data['role'] = $this->User_model->userRole();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('username', '"Username"', 'required|alpha_numeric');
        $this->form_validation->set_rules('name', '"Full Name"', 'required|regex_match[/^[a-zA-Z0 ]*$/]', ["regex_match" => "Full name must contain char only and space"]);
        $this->form_validation->set_rules('email', '"Email"', 'required|valid_email');

        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->User_model->editProfile($id, $username, $name, $email);
        }
    }

    public function editPP()
    {
        $data['user'] = $this->User_model->user();
        $id = $this->input->post('id');
        $upload_image = $_FILES['fileImg']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('fileImg')) {
                $old_image = $data['user']['image'];
                if ($old_image != 'ppdefault.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->User_model->editPP($id, $new_image);
            } else {
                echo $this->upload->display_errors();
            }
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->User_model->user();

        $this->form_validation->set_rules('newPassword1', '"New Password"', 'required|trim|min_length[6]|matches[newPassword2]', ["matches" => "Password doesn't match!", "min_length" => "Password too short!"]);

        $this->form_validation->set_rules('newPassword2', '"Confirm New Password"', 'required|trim|min_length[6]|matches[newPassword1]', ["matches" => "Password doesn't match!", "min_length" => "Password too short!"]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('currentPassword');
            $newPassword = $this->input->post('newPassword1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger mt-3" role="alert">
                    <strong>Cannot Proceed!</strong> Wrong current password.
                    </div>'
                );
                redirect('user/changePassword');
            } elseif ($newPassword == $current_password) {
                $this->session->set_flashdata(
                    'alert',
                    '<div class="alert alert-danger mt-3" role="alert">
                    <strong>Cannot Proceed!</strong> New password same as current password.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('user/changePassword');
            } else {
                $this->User_model->changePassword($newPassword);
            }
        }
    }
}
