<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        $array = array(
            'username' => 'syad',
            'role'  => 2
        );
        
        $this->session->set_userdata( $array );
        $this->data['username']   = $this->session->userdata('username');
        $this->data['role']       = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
        if ($this->data['role'] != 2)
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
    }

    public function index($value='')
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    /*
        input data realisasi dari Target operasional
        such as : ganti modem dll diinput disini
    */
    public function realisasi($value='')
    {
        $this->load->model('target_operasional_m');
        $this->data['realisasi']    = $this->target_operasional_m->get([ 'pegawai' => $this->data['username'] ]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/realisasi_pegawai';
        $this->template($this->data);
    }

    public function edit_realisasi($value='')
    {
        $this->load->model('realisasi_m');
        $this->load->model('pegawai_m');
        $this->load->model('target_operasional_m');

        $id_to = $this->uri->segment(3);
        if(!isset($id_to)) {
            redirect('pegawai/realisasi','refresh');
            exit();
        }
        if($this->POST('submit')) {            
            $this->data['realisasi'] = [
                'ganti_modem'     => $this->POST('ganti_modem'),
                'ganti_meter'     => $this->POST('ganti_meter'),
                'ganti_sim'       => $this->POST('ganti_sim'),
                'ganti_pembatas'  => $this->POST('ganti_pembatas'),
                'ganti_ct'        => $this->POST('ganti_ct')
            ];
            $this->realisasi_m->insert($this->data['realisasi']);
            $this->flashmsg('Sukses Input Data.');
            redirect('pegawai/realisasi','refresh');
            exit();
        }

        $this->data['realisasi']    = $this->realisasi_m->get_row([ 'id_to' => $id_to ]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/realisasi_pegawai_update';
        $this->template($this->data);
    }
}