<?php defined('BASEPATH') || exit('No direct script allowed');

class Pembatas_arus_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'pembatas_arus';
		$this->data['primary_key'] = 'id_pembatas';
	}
}

