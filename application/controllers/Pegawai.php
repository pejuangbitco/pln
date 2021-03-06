<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends MY_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        // 

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
        $this->load->model('target_operasional_m');
        $this->load->model('data_pelanggan_m');
    }

    public function index($value='')
    {
        $this->load->model('realisasi_m');
        $this->data['realisasi']    = $this->realisasi_m->get(['status' => 1]);
        $this->data['kesimpulan'] = [
            'HAR'   => 0,
            'INSPEKSI'  => 0,
            'APP'   => 0,
            'AMR'   => 0
        ];
        foreach ($this->data['realisasi'] as $key) {
            switch ($key->kesimpulan) {
                case 'HAR':
                    $this->data['kesimpulan']['HAR']++;
                    break;
                case 'INSPEKSI':
                    $this->data['kesimpulan']['INSPEKSI']++;
                    break;
                case 'APP':
                    $this->data['kesimpulan']['APP']++;
                    break;
                case 'AMR':
                    $this->data['kesimpulan']['AMR']++;
                    break;
            }
        }
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data,$this->data);
    }

    /*
        input data realisasi dari Target operasional
        such as : ganti modem dll diinput disini
    */
    public function realisasi($value='')
    {
        $this->load->model('realisasi_m');
        $this->load->model('geotag_m');
        $this->data['realisasi']    = $this->target_operasional_m->get([ 'pegawai' => $this->data['username'] ]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'pegawai/realisasi_pegawai';
        $this->template($this->data);
    }

    public function input_realisasi($value='')
    {
        $this->load->model([ 'realisasi_m','modem_m','pembatas_arus_m','ct_m','sim_card_m','meter_m','target_operasional_m' ]);        

        $id_to = $this->uri->segment(3);
        if(!isset($id_to)) {
            redirect('pegawai/realisasi','refresh');
            exit();
        }
        if($this->POST('submit')) {
            if($this->POST('ganti_modem') == 1) {
                $this->data['modem'] = [
                'imei'          => $this->POST('imeimodem'),
                'merk'          => $this->POST('merkmodem'),
                'tipe'          => $this->POST('tipemodem'),
                'id_pelanggan'  => $this->POST('idpel')
            ];  
            if (empty($this->modem_m->get_row(['imei' => $this->POST('imeimodem')]))) {
                $this->modem_m->insert($this->data['modem']);
            }
            else{
                $this->flashmsg('Mohon Masukan Data Imei Yang lain' , 'warning');
                redirect('pegawai/realisasi','refresh');
                exit();
            }
                
            }            
            if($this->POST('ganti_meter') == 1) {
                $this->data['meter'] = [
                'id_meter' => $this->POST('idmeter'),
                'merk'  => $this->POST('merkmeter'),
                'tipe'  => $this->POST('tipemeter'),
                'kelas' => $this->POST('kelasmeter'),
                'tahun_buat' => $this->POST('tahunbuat'),
                'arus'  => $this->POST('arusmeter'),
                'idpel' => $this->POST('idpel')             
            ];
            if (empty($this->meter_m->get_row(['id_meter'=> $this->POST('idmeter')]))) {
                
                $this->meter_m->insert($this->data['meter']);
            } else {
                # code...
                $this->flashmsg('Mohon Masukan Data Meteran Yang lain' , 'warning');
                redirect('pegawai/realisasi','refresh');
                exit();
            }
            
            }
            if($this->POST('ganti_pembatas') == 1) {
                $this->data['pembatas'] = [
                'merk'  => $this->POST('merkpembatas'),
                'tipe'  => $this->POST('tipepembatas'),
                'arus'  => $this->POST('aruspembatas'),
                'id_pelanggan'  => $this->POST('idpel')
            ];
                $this->pembatas_arus_m->insert($this->data['pembatas']);
            }
            if($this->POST('ganti_sim') == 1) {
                $this->data['sim'] = [
                'nomor'       => $this->POST('nomortlp'),
                'provider'    => $this->POST('provider'),
                'id_pelanggan'=> $this->POST('idpel')                
            ];
            if (empty($this->sim_card_m->get_row(['nomor' => $this->POST('nomortlp')]))) {
                $this->sim_card_m->insert($this->data['sim']);
            } else {
                # code...
                $this->flashmsg('Mohon Masukan Data SIM CARD Yang lain' , 'warning');
                redirect('pegawai/realisasi','refresh');
                exit();
            }
                
            }
            if($this->POST('ganti_ct') == 1) {
                $this->data['ct'] = [
                'jenis'       => $this->POST('jenis_ct'),
                'id_pelanggan'  => $this->POST('idpel')
            ];
            
                $this->ct_m->insert($this->data['ct']);
            }
            $this->data['realisasi'] = [
                'id_to'           => $id_to,
                'arus_r'          => $this->POST('arus_r'),
                'arus_s'          => $this->POST('arus_s'),
                'arus_t'          => $this->POST('arus_t'),
                'tegangan_r'      => $this->POST('tegangan_r'),
                'tegangan_s'      => $this->POST('tegangan_s'),
                'tegangan_t'      => $this->POST('tegangan_t'),
                'stand_total'     => $this->POST('stand_total'),
                'tanggal'         => $this->POST('tanggal'),
                'ganti_modem'     => $this->POST('ganti_modem'),
                'ganti_meter'     => $this->POST('ganti_meter'),
                'ganti_sim'       => $this->POST('ganti_sim'),
                'ganti_pembatas'  => $this->POST('ganti_pembatas'),
                'ganti_ct'        => $this->POST('ganti_ct'),
                'id_pelanggan'    => $this->POST('idpel'),
                'status'          => 0,
                'kesimpulan'       => $this->POST('kesimpulan'),
                'rincian'       => $this->POST('rincian')
            ];
            $this->realisasi_m->insert($this->data['realisasi']);
            $this->flashmsg('Sukses Input Data.');
            redirect('pegawai/realisasi','refresh');
            exit();
        }

        $this->data['realisasi']    = $this->target_operasional_m->get_row([ 'id_to' => $id_to ]);
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'pegawai/realisasi_pegawai_update';
        $this->template($this->data);
    }

    public function geotag()
    {
        $this->load->model('geotag_m');
        $this->load->model('Data_pelanggan_m');

        if ($this->POST('simpan')) {
            // echo json_encode($_FILES['foto']);exit;
            $data = [
                'lon'   => $this->POST('longitude'),
                'lat'   => $this->POST('latitude'),
                'idpel' => $this->POST('idpel')
            ];
            $this->geotag_m->insert($data);
            $this->upload($this->db->insert_id(), '/img/geotag/', 'foto');

            redirect('pegawai/geotag');
            exit;
        }

        if ($this->POST('get')) {
            echo json_encode($this->geotag_m->get_row(['id' => $this->POST('id')]));
            exit;
        }
        if ($this->POST('hapus')) {
            $this->geotag_m->delete($this->POST('id'));
            exit;
        }
        if ($this->POST('edit')) {
            $this->geotag_m->update($this->POST('id'),[
                'lon'   => $this->POST('longitude'),
                'lat'   => $this->POST('latitude'),
                // 'idpel' => $this->POST('idpel')
            ]);
            
            if (!empty($_FILES['foto']['name']))
                $this->upload($this->POST('id'),'/img/geotag', 'foto');

            redirect('pegawai/geotag');exit;
        }
        $this->data['data']    = $this->geotag_m->get();        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'pegawai/geotag';
        $this->template($this->data);
        
    }

    public function detail_geotag($value='')
    {
        $id = $this->uri->segment(3);
        if (!isset($id)) {
            redirect('pegawai/geotag','refresh');
            exit;
        }
        $this->load->model('geotag_m');
        $this->load->model('data_pelanggan_m');
        $this->data['data']         = $this->geotag_m->get_row(['id' => $id]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'pegawai/map_geotag';
        $this->template($this->data);
        # code...
    }

    public function map_geotag($value='')
    {
        $id = $this->uri->segment(3);
        if (!isset($id)) {
            redirect('pegawai/geotag','refresh');
            exit;
        }
        $this->load->model('geotag_m');
        $this->load->model('data_pelanggan_m');
        $this->data['data']         = $this->geotag_m->get_row(['idpel' => $id]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'pegawai/map_geotag';
        $this->template($this->data);
        # code...
    }
}