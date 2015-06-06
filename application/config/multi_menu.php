<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config["menu_id"]               = 'id';
$config["menu_label"]            = 'name';
$config["menu_key"]              = 'slug';
$config["menu_parent"]           = 'parent';
// $config["menu_children"]         = 'children';
$config["menu_order"]            = 'number';
// root_parent = null | 0

$config["nav_tag_open"]          = '<ul>';
$config["nav_tag_close"]         = '</ul>';
$config["item_tag_open"]         = '<li>'; 
$config["item_tag_close"]        = '</li>';	
$config["parent_tag_open"]       = '<li>';	
$config["parentl1_tag_open"]     = '';	
$config["parent_tag_close"]      = '</li>';	
$config["parentl1_tag_close"]    = '';	
$config["parent_anchor_tag"]     = '<a href="%s">%s</a>';	
$config["parentl1_anchor_tag"]   = '';	
$config["children_tag_open"]     = '<ul>';	
$config["children_tag_close"]    = '</ul>';	
$config["item_divider"]          = "";
$config["class_active_item"]     = "active";
$config["active_item"]           = "";

// $config["first_tag_open"]        = '<ul class="nav">';	// root_nav_open, root_nav_close
// $config["full_tag_open"]         = '<ul>'; // nav_open
// $config["full_tag_close"]        = '</ul>';	// nav_close
// $config["menu_class"]       	 = 'dropdown-menu';	// parent_nav_open
// $config["submenu_class"]  		 = 'dropdown-submenu';
// $config["item_tag_open"]         = '<li>'; // nav_
// $config["item_tag_close"]        = '</li>';	
// $config["active_item_class"]     = '<li class="active">';
// $config["item_divider"]          = "<li class='divider'></li>";
// $config['divided_item_lists']	 = array();
// $config["anchor_item"]           = "<a href='%s'>%s</a>";
// $config["parent_anchor_item"]    = '<a href="%s" class="dropdown-toggle" data-toggle="dropdown">%s</a>';
// special anchor item:
// $config['anchor_item_X'] = '<a href='%s'>%s</a>';
// example:
// $config["anchor_item_dashboard"] = "<a href='%s'><i class='icon-home'></i>%s</a>";