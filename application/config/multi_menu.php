<?php defined('BASEPATH') OR exit('No direct script access allowed');

$config["menu_id"]               = 'id';
$config["menu_label"]            = 'name';
$config["menu_key"]              = 'key';
$config["menu_parent"]           = 'parent';
$config["menu_children"]         = 'children';

$config["full_tag_open"]         = '<ul>';
$config["full_tag_close"]        = '</ul>';	
$config["first_tag_open"]        = '<ul class="nav">';	

$config["item_tag_open"]         = '<li>';
$config["item_tag_close"]        = '</li>';	
$config["active_item_class"]     = '<li class="active">';
$config["active_item"]           = 'dashboard';

$config["anchor_item"]           = "<a href='%s'>%s</a>";
// special anchor item:
// $config['anchor_item_X'] = '<a href='%s'>%s</a>';
// example:
// $config["anchor_item_dashboard"] = "<a href='%s'><i class='icon-home'></i>%s</a>";