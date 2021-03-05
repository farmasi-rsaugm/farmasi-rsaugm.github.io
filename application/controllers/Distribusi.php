<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Distribusi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_sign_in();
    }

    public function index()
    {
        $data['title'] = 'DISTRIBUSI';
        $this->load->view('templates/header', $data);
        $this->load->view('distribusi/index');
        $this->load->view('templates/footer');
    }
}
