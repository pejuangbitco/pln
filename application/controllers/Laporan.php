<?php 

/**
 * summary
 */
class Laporan extends MY_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        ini_set('max_execution_time', 0);
    	ini_set('memory_limit', -1);
    	$this->load->library('tanggal');
    }

    public function realisasi()
    {
    	$id = $this->uri->segment(3);
    	if ($id) {
    		$this->load->model('realisasi_m');
    		$this->data['realisasi'] = $this->realisasi_m->get_row(['id_realisasi' => $id]);
    		if ($this->data['realisasi']->status == 1) {
    			$this->load->model([
	    			'data_pelanggan_m',
	    			'meter_m',
	    			'modem_m',
	    			'pembatas_arus_m',
	    			'sim_card_m',
	    			'ct_m'
	    		]);
	    		$this->data['data'] = $this->data_pelanggan_m->get_row(['idpel' => $this->data['realisasi']->id_pelanggan]);
	    		$this->load->view('admin/laporan',$this->data);
    		}
    		else{
    			echo 'status masih pending';
    		}
    	}
    	else
    		echo 'ada kesalahan parameter';
    	
    }
}