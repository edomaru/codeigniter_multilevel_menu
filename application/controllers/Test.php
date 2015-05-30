<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index($parent=1)
	{
		$this->load->model("Menu_model", "menu");
		$items = $this->menu->generate(5, $parent);
		die('done');
	}



}