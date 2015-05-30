# Codeigniter Multilevel Menu

Codeigniter Multilevel Menu is a library that provide easy way to render multi level menu from active record `result_array()`. It's easy to use and customize


## Requirements

1. PHP 5.2+
2. CodeIgniter 2 or above

## Installation

1. Copy and paste `application/config/multi_menu.php` to your own project
2. Copy and paste `application/libraries/Multi_menu.php` to your own project

## How to use

1. Configure the table fields of table if necessary in `application/config/multi_menu.php`:  
  
   ```php
    <?php
    $config["menu_id"]               = 'id';
    $config["menu_label"]            = 'name';
    $config["menu_key"]              = 'slug';
    $config["menu_parent"]           = 'parent';
    $config["menu_children"]         = 'children';
    $config["menu_order"]            = 'order';
    ?>
   ```

2. In `application/config/multi_menu.php`, you can also configure menu structure if necessary:
   ```php
    <?php
    $config["full_tag_open"]         = '<ul>';
    $config["full_tag_close"]        = '</ul>'; 
    $config["first_tag_open"]        = '<ul class="nav">';  
    $config["item_tag_open"]         = '<li>';
    $config["item_tag_close"]        = '</li>'; 
    $config["active_item_class"]     = '<li class="active">';
    $config["anchor_item"]           = "<a href='%s'>%s</a>";
    ?>
   ```

3. Load the library manually or definied in `application/config/autoload.php`, execute query, pass result array data, and you ready to render the menu. See example below:

   ```php
    <?php
    // execute query and get array data
    $this->load->model("menu_model", "menu");
    $items = $this->menu->all();

    // load the library and pass the array data
    $this->load->library("multi_menu");
    $this->multi_menu->set_items($items);
    // call render in view
    echo $this->multi_menu->render();
    ?>
   ```

## Screenshoot
![alt text](https://github.com/edomaru/codeigniter_multilevel_menu/blob/master/assets/img/ci_multilevel_menu_screenshoot.png "Codeigniter Multi level menu screenshoot 1")
