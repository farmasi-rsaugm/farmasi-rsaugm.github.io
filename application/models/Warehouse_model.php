<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warehouse_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->wrhdb  = $this->load->database('warehouse', TRUE);
    }

    public function getAllInventory()
    {

        return $this->wrhdb->get('inventory')->result_array();
    }

    public function addNewMaster()
    {
        $data = array(
            'itemName' => $this->input->post('itemName', true),
            'itemDetail' => $this->input->post('itemDetail', true),
            'unitlg' => $this->input->post('unitlg', true),
            'qtysm' => $this->input->post('qtysm', true),
            'unitsm' => $this->input->post('unitsm', true)
        );

        $wrhdb = $this->load->database('warehouse', TRUE);
        $wrhdb->insert('inventory', $data);
    }

    public function deleteDataInventory($id)
    {
        $wrhdb = $this->load->database('warehouse', TRUE);
        $wrhdb->delete('inventory', ['id' => $id]);
    }

    public function getInventoryById($id)
    {
        $wrhdb = $this->load->database('warehouse', TRUE);
        return $wrhdb->get_where('inventory', ['id' => $id])->row_array();
    }

    public function editMaster()
    {
        $data = [
            'itemName' => $this->input->post('itemName', true),
            'itemDetail' => $this->input->post('itemDetail', true),
            'unitlg' => $this->input->post('unitlg', true),
            'qtysm' => $this->input->post('qtysm', true),
            'unitsm' => $this->input->post('unitsm', true)
        ];

        $wrhdb = $this->load->database('warehouse', TRUE);
        $wrhdb->where('id', $this->input->post('id', true));
        $wrhdb->update('inventory', $data);
    }

    public function searchDataInventory()
    {
        $wrhdb = $this->load->database('warehouse', TRUE);

        $keyword = $this->input->post('keyword');
        $wrhdb->like('itemName', $keyword);
        $wrhdb->or_like('itemDetail', $keyword);
        $wrhdb->or_like('unitlg', $keyword);
        $wrhdb->or_like('unitsm', $keyword);

        return $wrhdb->get('inventory')->result_array();
    }
}
