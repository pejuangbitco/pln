<?php defined('BASEPATH') || exit('No direct script allowed');

class Realisasi_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'realisasi';
		$this->data['primary_key'] = 'id_realisasi';
	}
}

