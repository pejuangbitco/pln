<?php defined('BASEPATH') || exit('No direct script allowed');

class Geotag_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']  = 'geotag';
		$this->data['primary_key'] = 'id';
	}
}

