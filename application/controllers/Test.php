<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	public function index($parent = null)
	{
		$this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->load->view("test_view", compact('items'));
	}



}