<?php defined('BASEPATH') || exit('No direct script allowed');

class Meter_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'meter';
		$this->data['primary_key'] = 'urut';
	}
}

