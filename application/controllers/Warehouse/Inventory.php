<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_sign_in();
    }

    public function index()
    {
        $data['title'] = 'Inventory List';

        $data['user'] = $this->User_model->user();
        $data['inventory'] = $this->Warehouse_model->getAllInventory();

        if ($this->input->post('keyword')) {
            $data['inventory'] = $this->Warehouse_model->searchDataInventory();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('warehouse/index', $data);
        $this->load->view('templates/footer');
    }


    // public function newMaster()
    // {
    //     $data['title'] = 'MASTER BARU';

    //     $this->form_validation->set_rules('itemName', '"Nama Barang"', 'required');
    //     $this->form_validation->set_rules('itemDetail', '"Detail Barang"', 'required');
    //     $this->form_validation->set_rules('unitlg', '"Satuan Terbesar"', 'required');
    //     $this->form_validation->set_rules('unitsm', '"Satuan Terkecil"', 'required');
    //     $this->form_validation->set_rules('qtysm', '"Jumlah Terkecil"', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('warehouse/newMaster');
    //         $this->load->view('templates/footer');
    //     } else {
    //         $this->Warehouse_model->addNewMaster();
    //         $this->session->set_flashdata('flash', 'ditambahkan');
    //         redirect('inventory');
    //     }
    // }

    public function editMaster($id)
    {
        $data['title'] = 'EDIT MASTER';
        $data['invid'] = $this->Warehouse_model->getInventoryById($id);
        // $data['inventory'] = $this->Warehouse_model->getAllInventory();
        $data['unitlg'] = ['CYLINDER', 'M3'];
        $data['unitsm'] = ['KG', 'M3', 'LITER'];

        $this->form_validation->set_rules('itemName', '"Nama Barang"', 'required');
        $this->form_validation->set_rules('itemDetail', '"Detail Barang"', 'required');
        $this->form_validation->set_rules('unitlg', '"Satuan Terbesar"', 'required');
        $this->form_validation->set_rules('unitsm', '"Satuan Terkecil"', 'required');
        $this->form_validation->set_rules('qtysm', '"Jumlah Terkecil"', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('warehouse/editMaster', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Warehouse_model->editMaster();
            $this->session->set_flashdata('flash', 'diubah');
            redirect('warehouse');
        }
    }

    public function delete($id)
    {
        $this->Warehouse_model->deleteDataInventory($id);
        $this->session->set_flashdata('flash', 'dihapus');
        redirect('warehouse');
    }
}
