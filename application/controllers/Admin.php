<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $array = array(
        //     'username' => 'adminn',
        //     'role' => 1
        // );
        
        // $this->session->set_userdata( $array );
        $this->data['username']      = $this->session->userdata('username');
        $this->data['role']  = $this->session->userdata('role');
        if (!isset($this->data['username'], $this->data['role']))
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
        if ($this->data['role'] != 1)
        {
            $this->session->sess_destroy();
            redirect('login');
            exit;
        }
        $this->load->model('data_pelanggan_m');
    }
    
    /*
        tampilkan charts realisasi berdasarkan data yg udah diupdate statusnya menjadi selesai

    */
    public function index()
    {
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/dashboard';
        $this->template($this->data);
    }

    /*
        input data pelanggan
        data modem pelanggan
        data meteran
        data simcard
    */

    public function data_pelanggan()
    {
        $this->load->model('data_pelanggan_m');
        
        $this->data['pelanggan']    = $this->data_pelanggan_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/data_pelanggan';
        $this->template($this->data);
    }

    public function edit_pelanggan()
    {
        $this->load->model('data_pelanggan_m');
        $this->load->model('sim_card_m');
        $this->load->model('modem_m');
        $this->load->model('meter_m');
        $this->load->model('pembatas_arus_m');
        $this->load->model('ct_m');

        $idpel = $this->uri->segment(3);
        if(!isset($idpel)) {
            redirect('admin/data_pelanggan','refresh');
            exit();
        }

        if($this->POST('edit')) {
            $this->data['pelanggan'] = [
                'unitupi'   => $this->POST('unitupi'),
                'unitap'    => $this->POST('unitap'),
                'unitup'    => $this->POST('unitup'),                
                'nama'      => $this->POST('nama'),
                'alamat'    => $this->POST('alamatpel'),
                'tarif'     => $this->POST('tarif') ,
                'daya'      => $this->POST('daya'),
                'status'    => $this->POST('status')
            ];
            $this->data_pelanggan_m->update_where(['idpel' => $idpel],$this->data['pelanggan']);
            $this->flashmsg('Sukses Edit Data.');
            redirect('admin/edit_pelanggan/'.$idpel,'refresh');
            exit();
        }

        $this->data['pelanggan']    = $this->data_pelanggan_m->get_row([ 'idpel' => $idpel ]);
        $this->data['sim_card']     = $this->sim_card_m->get([ 'id_pelanggan' => $idpel ]);
        $this->data['modem']        = $this->modem_m->get([ 'id_pelanggan' => $idpel ]);
        $this->data['meter']        = $this->meter_m->get([ 'idpel' => $idpel ]);
        $this->data['pembatas']     = $this->pembatas_arus_m->get([ 'id_pelanggan' => $idpel ]);
        $this->data['ct']           = $this->ct_m->get([ 'id_pelanggan' => $idpel ]);
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/edit_pelanggan';
        $this->template($this->data);
    }    

    public function pelanggan()
    {
        $this->load->model('data_pelanggan_m');
        $this->load->model('modem_m');
        $this->load->model('sim_card_m');
        $this->load->model('ct_m');
        $this->load->model('pembatas_arus_m');
        $this->load->model('meter_m');

        if($this->POST('jenis_ct')) {
            $this->data['sim'] = [
                'nomor'       => $this->POST('nomortlp'),
                'provider'    => $this->POST('provider'),
                'id_pelanggan'=> $this->POST('idpel')                
            ];
            $this->data['meter'] = [
                'id_meter' => $this->POST('idmeter'),
                'merk'  => $this->POST('merkmeter'),
                'tipe'  => $this->POST('tipemeter'),
                'kelas' => $this->POST('kelasmeter'),
                'tahun_buat' => $this->POST('tahunbuat'),
                'arus'  => $this->POST('arusmeter'),
                'idpel' => $this->POST('idpel')             
            ];
            $this->data['modem'] = [
                'imei'          => $this->POST('imeimodem'),
                'merk'          => $this->POST('merkmodem'),
                'tipe'          => $this->POST('tipemodem'),
                'id_pelanggan'  => $this->POST('idpel')
            ];        
            $this->data['pelanggan'] = [
                'unitupi'   => $this->POST('unitupi'),
                'unitap'    => $this->POST('unitap'),
                'unitup'    => $this->POST('unitup'),
                'idpel'     => $this->POST('idpel'),
                'nama'      => $this->POST('nama'),
                'alamat'    => $this->POST('alamatpel'),
                'tarif'     => $this->POST('tarif') ,
                'daya'      => $this->POST('daya'),
                'status'    => $this->POST('status')
            ];
            $this->data['pembatas_arus'] = [
                'merk'  => $this->POST('merkpembatas'),
                'tipe'  => $this->POST('tipepembatas'),
                'arus'  => $this->POST('aruspembatas'),
                'id_pelanggan'  => $this->POST('idpel')
            ];
            $this->data['ct'] = [
                'jenis'       => $this->POST('jenis_ct'),
                'id_pelanggan'  => $this->POST('idpel')
            ];
            
            $this->data_pelanggan_m->insert($this->data['pelanggan']);
            if (!$this->sim_card_m->insert($this->data['sim'])) {
                $this->data_pelanggan_m->delete($this->data['pelanggan']['id_pelanggan']);
                $this->flashmsg('duplicate entry','warning');
                redirect('admin/pelanggan','refresh');
                exit();
            }
            if (!$this->meter_m->insert($this->data['meter'])) {
                $this->data_pelanggan_m->delete($this->data['pelanggan']['id_pelanggan']);
                $this->sim_card_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->flashmsg('duplicate entry','warning');
                redirect('admin/pelanggan','refresh');
                exit();
            }
            if (!$this->modem_m->insert($this->data['modem'])) {
                $this->data_pelanggan_m->delete($this->data['pelanggan']['id_pelanggan']);
                $this->sim_card_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->meter_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->flashmsg('duplicate entry','warning');
                redirect('admin/pelanggan','refresh');
                exit();
            }
            if (!$this->pembatas_arus_m->insert($this->data['pembatas_arus'])) {
                $this->data_pelanggan_m->delete($this->data['pelanggan']['id_pelanggan']);
                $this->sim_card_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->meter_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->modem_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->flashmsg('duplicate entry','warning');
                redirect('admin/pelanggan','refresh');
                exit();
            }
            if (!$this->ct_m->insert($this->data['ct'])) {
                $this->data_pelanggan_m->delete($this->data['pelanggan']['id_pelanggan']);
                $this->sim_card_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->meter_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->modem_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->pembatas_arus_m->delete_by(['id_pelanggan' => $this->data['pelanggan']['id_pelanggan']]);
                $this->flashmsg('duplicate entry','warning');
                redirect('admin/pelanggan','refresh');
                exit();
            }
            
            $this->flashmsg('Sukses Input Data.');
            redirect('admin/pelanggan','refresh');
            exit();
        }

        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/pelanggan';
        $this->template($this->data);
    }

/*
        input data pegawai
        
    */
    public function pegawai()
    {
        $this->load->model('pegawai_m');
        $this->load->model('user_m');

        $action = $this->uri->segment(3);
        if(isset($action) && $action=='delete') {
            $id = $this->uri->segment(4);
            $this->pegawai_m->delete($id);
            $this->user_m->delete($id);
            $this->flashmsg('Sukses Delete Data.');
            redirect('admin/pegawai','refresh');
            exit();
        }

        if($this->POST('submit')) {
            $this->data['user'] = [
                'username'  => $this->POST('username'),
                'password'  => md5($this->POST('password')),
                'role'      => 2
            ];            
            $this->data['pegawai'] = [
                'username'  => $this->POST('username'),
                'nama'      => $this->POST('nama'),
                'nama_team' => $this->POST('nama_team')               
            ];
            $this->user_m->insert($this->data['user']);
            $this->pegawai_m->insert($this->data['pegawai']);
            $this->flashmsg('Sukses Input Data.');
            redirect('admin/pegawai','refresh');
            exit();
        }

        $this->data['pegawai']      = $this->pegawai_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/pegawai';
        $this->template($this->data);
    }

    public function edit_pegawai()
    {
        $this->load->model('pegawai_m');
        $this->load->model('user_m');

        $id = $this->uri->segment(3);
        if(!isset($id)) {
            redirect('pegawai','refresh');
            exit();
        }

        if($this->POST('edit')) {
            if($this->POST('password')) {
                $this->data['user'] = [
                'username'  => $this->POST('username'),
                'password'  => $this->POST('password')                
                ];    
            } else {
                $this->data['user'] = [
                'username'  => $this->POST('username')                
                ];
            }
                        
            $this->data['pegawai'] = [
                'username'  => $this->POST('username'),
                'nama'      => $this->POST('nama'),
                'nama_team' => $this->POST('nama_team')               
            ];
            $this->user_m->update($id,$this->data['user']);
            $this->pegawai_m->update($id,$this->data['pegawai']);
            $this->flashmsg('Sukses Update Data.');
            redirect('admin/pegawai','refresh');
            exit();
        }

        $this->data['pegawai']      = $this->pegawai_m->get_row([ 'username' => $id ]);
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/edit_pegawai';
        $this->template($this->data);
    }

    /*
        input TO ke pegawai mana yg ingin di target melakukan        
    */
    public function data_target_operasional()
    {
        $this->load->model('target_operasional_m');
        
        $action = $this->uri->segment(3);
        if(isset($action) && $action=='delete') {
            $id = $this->uri->segment(4);
            $this->target_operasional_m->delete($id);            
            $this->flashmsg('Sukses Delete Data.');
            redirect('admin/data_target_operasional','refresh');
            exit();
        }

        $this->data['target_operasional'] = $this->target_operasional_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/data_target_operasional';
        $this->template($this->data);
    }

    public function edit_target_operasional()
    {
        $this->load->model('target_operasional_m');
        $this->load->model('data_pelanggan_m');

        $id = $this->uri->segment(3);
        if(!isset($id)) {
            redirect('admin/data_target_operasional','refresh');
            exit();
        }

        if($this->POST('edit')) {
            $this->data['target'] = [
                'id_pelanggan'  => $this->POST('id_pelanggan'),
                'alasan'        => $this->POST('alasan'),                
                'keterangan'    => $this->POST('keterangan'),
                'pegawai'       => $this->POST('pegawai'),
                // 'status'        => $this->POST('status')
            ];
            $this->target_operasional_m->update($id,$this->data['target']);
            $this->flashmsg('Sukses Edit Data.');
            redirect('admin/edit_target_operasional/'.$id,'refresh');
            exit();
        }

        $this->data['target_operasional'] = $this->target_operasional_m->get_row([ 'id_to' => $id ]);
        $this->data['this_pelanggan']    = $this->data_pelanggan_m->get_row([ 'idpel' => $this->data['target_operasional']->id_pelanggan ]);
        
        $this->data['pelanggan']    = $this->data_pelanggan_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/edit_target_operasional';
        $this->template($this->data);
    }    

    public function target_operasional()
    {
        $this->load->model('target_operasional_m');
        $this->load->model('data_pelanggan_m');
        $this->load->model('pegawai_m');

        if($this->POST('submit')) {
            $this->data['target'] = [
                'id_pelanggan'  => $this->POST('id_pelanggan'),
                'alasan'        => $this->POST('alasan'),
                'date'          => date("y-m-d"),
                'keterangan'    => $this->POST('keterangan'),
                'pegawai'       => $this->POST('pegawai')
            ];
            
            $this->target_operasional_m->insert($this->data['target']);
            $this->flashmsg('Sukses Input Data.');
            redirect('admin/target_operasional','refresh');
            exit();
        }

        $this->data['pelanggan']    = $this->data_pelanggan_m->get();
        $this->data['pegawai']      = $this->pegawai_m->get();
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/target_operasional';
        $this->template($this->data);
    }

    // update realiasi yg diinput oleh pegawai nantinya
    // print pdf realisasi per pelanggan
    public function realisasi_pending()
    {
        $this->load->model('realisasi_m');
        if ($this->POST('konfirm')) {
            $this->realisasi_m->update($this->POST('id') , ['status' => 1]);
            exit;
        }
        $action = $this->uri->segment(3);
        if(isset($action) && $action=='delete') {
            $id = $this->uri->segment(4);
            $this->realisasi_m->delete($id);
            $this->flashmsg('Sukses Delete Data.');
            redirect('admin/realisasi_pending','refresh');
            exit();
        }

        $this->data['realisasi']    = $this->realisasi_m->get([ 'status' => 0 ]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/realisasi';
        $this->template($this->data);
    }

    public function realisasi_aktif()
    {
        $this->load->model('realisasi_m');

        $action = $this->uri->segment(3);
        if(isset($action) && $action=='delete') {
            $id = $this->uri->segment(4);
            $this->realisasi_m->delete($id);
            $this->flashmsg('Sukses Delete Data.');
            redirect('admin/realisasi+pending','refresh');
            exit();
        }

        $this->data['realisasi']    = $this->realisasi_m->get([ 'status' => 1 ]);        
        $this->data['title']        = 'Dashboard Admin';
        $this->data['content']      = 'admin/realisasi';
        $this->template($this->data);
    }

    public function edit_realisasi()
    {
        $this->load->model([ 'realisasi_m','target_operasional_m' ]);

        $id = $this->uri->segment(3);
        if(!isset($id)) {
            redirect('realisasi','refresh');
            exit();
        }

        if($this->POST('edit')) {
            $this->data['realisasi'] = [
                'id_pelanggan'   => $this->POST('id_pelanggan'),
                'id_to'          => $this->POST('id_to'),
                'ganti_meter'    => $this->POST('ganti_meter'),   
                'ganti_sim'      => $this->POST('ganti_sim'),   
                'ganti_modem'    => $this->POST('ganti_modem'),
                'ganti_pembatas' => $this->POST('ganti_pembatas'),            
                'ganti_ct'       => $this->POST('ganti_ct'),
                'kesimpulan'     => $this->POST('kesimpulan'),
                'tanggal'        => $this->POST('tanggal'),
                'arus_r'         => $this->POST('arus_r'),
                'arus_s'         => $this->POST('arus_s'),
                'arus_t'         => $this->POST('arus_t'),
                'tegangan_r'     => $this->POST('tegangan_r'),
                'tegangan_s'     => $this->POST('tegangan_s'),
                'tegangan_t'     => $this->POST('tegangan_t'),
                'stand_total'    => $this->POST('stand_total'),
                'status'         => $this->POST('status')
            ];
            $this->realisasi_m->update($id,$this->data['realisasi']);
            $this->flashmsg('Sukses Update Data.');
            redirect('admin/realisasi','refresh');
            exit();
        }   

        $this->data['realisasi']            = $this->realisasi_m->get_row([ 'id_realisasi' => $id ]);
        $this->data['target_operasional']   = $this->target_operasional_m->get();        
        $this->data['title']                = 'Dashboard Admin';
        $this->data['content']              = 'admin/edit_realisasi';
        $this->template($this->data);
    }

    public function geotag($value='')
    {
        $this->load->model('geotag_m');
        $this->load->model('data_pelanggan_m');
        if ($this->POST('get')) {
            echo json_encode($this->geotag_m->get_row(['id' => $this->POST('id')]));
            exit;
        }
        if ($this->POST('edit')) {
            $this->geotag_m->update($this->POST('id'),[
                'lon'   => $this->POST('longitude'),
                'lat'   => $this->POST('latitude'),
                // 'idpel' => $this->POST('idpel')
            ]);

            redirect('admin/geotag');exit;
        }
        $this->data['geotag']               = $this->geotag_m->get();        
        $this->data['title']                = 'Dashboard Admin';
        $this->data['content']              = 'admin/geotag';
        $this->template($this->data);
    }

    public function laporan(){
        $id = $this->uri->segment(3);
        @unlink(realpath(APPPATH . '../laporan.pdf'));
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
        header("Content-disposition: attachment; filename=laporan.pdf");
        header("Content-type: application/pdf");
        ini_set('max_execution_time', 0);
        ini_set('memory_limit', -1);
        $rand = mt_rand(1000, 2000);
        $cmd = 'assets\phantomjs-2.1.1\bin\phantomjs.exe assets\phantomjs-2.1.1\generate_pdf.js ' . base_url('laporan/realisasi/' .$id) . ' laporan.pdf ';
        echo exec($cmd);
        readfile(base_url('laporan.pdf'));
    }
}
