<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {	

	public function __construct()
	{
		parent::__construct();

		$this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
	}

	public function index()
	{
		$this->load->view("test_view");
	}

	public function basic()
	{
		$this->load->view("basic");
	}

	public function bootstrap1()
	{
		$config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';
		$config["nav_tag_close"]         = '</ul>';
		$config["item_tag_open"]         = '<li>'; 
		$config["item_tag_close"]        = '</li>';	
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';	
		$config["parent_tag_close"]      = '</li>';	
		$config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>';	
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';	
		$config["children_tag_close"]    = '</ul>';	
		$config["item_divider"]          = "<li class='divider'></li>";

		$this->multi_menu->initialize($config);
		$this->load->view("bootstrap1");
	}

	public function bootstrap2()
	{
		$config["nav_tag_open"]          = '<ul class="nav navbar-nav">';
		$config["nav_tag_close"]         = '</ul>';
		$config["item_tag_open"]         = '<li>'; 
		$config["item_tag_close"]        = '</li>';	
		$config["parent_tag_open"]       = '<li class="dropdown-submenu">';	
		$config["parent_tag_close"]      = '</li>';	
		$config["parent_anchor_tag"]     = '<a href="%s" class="dropdown-toggle" data-toggle="dropdown">%s</a>';	
		$config["children_tag_open"]     = '<ul class="dropdown-menu">';	
		$config["children_tag_close"]    = '</ul>';	
		$config["item_divider"]          = "<li class='divider'></li>";
		
		$this->multi_menu->initialize($config);
		$this->load->view("bootstrap2");
	}

}