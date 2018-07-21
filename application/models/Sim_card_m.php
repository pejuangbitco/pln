<?php defined('BASEPATH') || exit('No direct script allowed');

class Sim_card_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'sim_card';
		$this->data['primary_key'] = 'nomor';
	}
}

