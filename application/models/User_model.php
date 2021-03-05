<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function signin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();

        if ($user) {
            //user ada
            if ($user['is_active']  == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('warehouse/inventory');
                    } else {
                        redirect('warehouse/inventory');
                    }
                } else {
                    $this->session->set_flashdata(
                        "message",
                        "<div class='alert alert-danger' role='alert'>
                        Incorrect password!
                </div>"
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    "message",
                    "<div class='alert alert-danger' role='alert'>
                    Please check your email to activate your account!
            </div>"
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                "message",
                "<div class='alert alert-danger' role='alert'>
            Username doesn't exist. Enter a different username or get one!
        </div>"
            );
            redirect('auth');
        }
    }

    public function signup()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'name' => htmlspecialchars($this->input->post('name', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'ppdefault.jpg.',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('user', $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
            Your account has been created. Please sign in!
        </div>'
        );
        redirect('auth');
    }

    public function signout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
            You have been signed out. Thank you!
        </div>'
        );
        redirect('auth');
    }

    public function user()
    {
        return $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    }

    public function userRole()
    {
        return $this->db->get_where('user_role', ['id' => $this->session->userdata('role_id')])->row_array();
    }

    public function editPP($id, $new_image)
    {
        $this->db->set('image', $new_image);
        $this->db->where('id', $id);
        $this->db->update('user');
        redirect('user');
    }
    public function editProfile($id, $username, $name, $email)
    {
        $data = [
            'username' => $username,
            'name' => $name,
            'email' => $email
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');

        if ($this->session->userdata['username'] == $username) {
            redirect('user');
        } else {
            $this->session->unset_userdata('username');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                You have been change username. Please sign in with your new username!
                </div>'
            );
            redirect('auth');
        }
    }

    public function changePassword($newPassword)
    {
        $this->db->set('password', password_hash($newPassword, PASSWORD_DEFAULT));
        $this->db->where('username', $this->session->userdata('username'));
        $this->db->update('user');

        $this->session->unset_userdata('username');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                You have been change password. Please sign in with your new password!
            </div>'
        );
        redirect('auth');
    }

    public function getUserRole()
    {
        return $this->db->get('user_role')->result_array();
    }

    public function addUserRole()
    {
        $menu = [
            'role' => $this->input->post('role', true)
        ];

        $this->db->insert('user_role', $menu);
    }

    public function getUserRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    public function editUserAccess($roleId, $menu_id)
    {
        $data = [
            'role_id' => $roleId,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-success mt-3" role="alert">
                        Access user menu has been <strong>Added</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                 </div>'
            );
        } else {
            $this->db->delete('user_access_menu', $data);

            $this->session->set_flashdata(
                'alert',
                '<div class="alert alert-danger mt-3" role="alert">
                  Access user menu has been <strong>Deleted</strong>.
             </div>'
            );
        }
    }

    public function deleteUserRole($id)
    {
        $this->db->delete('user_role', ['id' => $id]);
    }
}
