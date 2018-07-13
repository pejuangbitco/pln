<?php defined('BASEPATH') || exit('No direct script allowed');

class Ct_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'ct';
		$this->data['primary_key'] = 'id_ct';
	}
}

