<?php defined('BASEPATH') || exit('No direct script allowed');

class Modem_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'modem';
		$this->data['primary_key'] = 'imei';
	}
}

