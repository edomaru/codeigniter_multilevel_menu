# Codeigniter Multilevel Menu

Codeigniter Multilevel Menu is a library that provide easy way to render multi level menu from plain array or from active record `result_array()`. It's easy to use and customize. Twitter Bootstrap 3.3 support


## Requirements

1. PHP 5.2+
2. CodeIgniter 2 or above

## Installation

1. Copy and paste `application/config/multi_menu.php` to your own project
2. Copy and paste `application/libraries/Multi_menu.php` to your own project

## How to use

1. In `application/config/multi_menu.php`, you can also configure menu structure if necessary:
   ```php
    <?php
    $config["nav_tag_open"]      = '<ul class="nav">';
    $config["nav_tag_close"]     = '</ul>';  
    $config["item_tag_open"]     = '<li>';
    $config["item_tag_close"]    = '</li>'; 
    $config["item_active_class"] = 'active';    
    ?>
   ```

2. Load the library manually or load automatically definied in `application/config/autoload.php` and it's ready to use. See example below

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

3. By default, this library use several array keys as follow: 
   * `id` is id for menu item
   * `name` for menu label or menu caption `<a href='#'>{name}</a>` 
   * `key` for menu key or slug `<a href='http://example.com/{key}'>{name}</a>`
   * `parent` for menu parent 
   * `order` for menu order 
   
   You can change according to the names of fields in your database table or as needed by defining in `application/config/multi_menu.php` as follow:  
  
   ```php
    <?php
    $config["menu_id"]               = 'id';
    $config["menu_label"]            = 'name';
    $config["menu_key"]              = 'slug';
    $config["menu_parent"]           = 'parent';
    $config["menu_order"]            = 'order';
    ?>
   ```


## More Example

### Example 1 - Basic

This example show how to render multi level menu with active menu item **Item-0**

```php
<?php echo $this->multi_menu->render('Item-0'); ?>
```

#### Screenshoot
![alt text](https://github.com/edomaru/codeigniter_multilevel_menu/blob/master/assets/img/ci_multilevel_menu_screenshoot.jpg "Codeigniter Multi level menu screenshoot of Example 1 - Basic")


### Example 2

This example show how to render multi level menu with Twitter Bootstrap 3.0. For this purpose I use snippet created by msurguy.

```php
<?php
// in controller
public function bootstrap1()
{
    $config["nav_tag_open"]          = '<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">';     
    $config["parent_tag_open"]       = '<li class="dropdown-submenu">';
    $config["parent_anchor_tag"]     = '<a tabindex="-1" href="%s">%s</a>'; 
    $config["children_tag_open"]     = '<ul class="dropdown-menu">';
    $config["item_divider"]          = "<li class='divider'></li>";

    $this->multi_menu->initialize($config);
    $this->load->view("bootstrap1");
}
?>

<?php 
// in view
// Render multi menu with active item `Item-0` and menu items with separator `Item-3` and `Item-5`
echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); 
?>
```

#### Screenshoot
![alt text](https://github.com/edomaru/codeigniter_multilevel_menu/blob/master/assets/img/ci_multilevel_menu_screenshoot_2.jpg "Codeigniter Multi level menu screenshoot of Example 2 - Bootstap 3.0")


### Example 3

This example show how to render multi level menu with Twitter Bootstrap 3.3. For this purpose I use **bootstrap submenu** plugin.

#### Dropdown

```php
<?php echo $this->multi_menu->render(array(
    'nav_tag_open'      => '<ul class="dropdown-menu" role="menu">',    
    'parent_tag_open'   => '<li class="dropdown-submenu">',
    'parent_anchor_tag' => '<a href="%s" data-toggle="dropdown">%s</a>',
    'children_tag_open' => '<ul class="dropdown-menu">'
)); ?>
```


#### Navbar

```php
<div class="collapse navbar-collapse">
    <?php echo $this->multi_menu->render(array(
        'nav_tag_open'        => '<ul class="nav navbar-nav">',            
        'parentl1_tag_open'   => '<li class="dropdown">',
        'parentl1_anchor'     => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
        'parent_tag_open'     => '<li class="dropdown-submenu">',
        'parent_anchor'       => '<a href="%s" data-toggle="dropdown">%s</a>',
        'children_tag_open'   => '<ul class="dropdown-menu">'
    )); ?>
</div>
```

#### Pills

```php
<?php echo $this->multi_menu->render(array(
    'nav_tag_open'        => '<ul class="nav nav-pills">',            
    'parentl1_tag_open'   => '<li class="dropdown">',
    'parentl1_anchor'     => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
    'parent_tag_open'     => '<li class="dropdown-submenu">',
    'parent_anchor'       => '<a href="%s" data-toggle="dropdown">%s</a>',
    'children_tag_open'   => '<ul class="dropdown-menu">',
    'item_active'         => 'Item-6'
)); ?>
```

#### Screenshoot
![alt text](https://github.com/edomaru/codeigniter_multilevel_menu/blob/master/assets/img/ci_multilevel_menu_screenshoot_3.jpg "Codeigniter Multi level menu screenshoot of Example 3 - Bootstrap 3.3 + Bootstrap submenu")


## How to apply icons in menu item ?

You can choose 3 options:

### Option 1

You can define icon in menu label. See this example data:

```php
<?php
$data = array(
    array(
        'id' => 1,
        'name' => '<i class="fa fa-trash"></i> First Menu', // <--
        'parent' => null,
        'slug' => 'menu-1',
    ),
    ...
);
?>
```

### Option 2

You can define every icon item in your array data. see this example data:

```php
<?php
$data = array(
    array(
        'id' => 1,
        'name' => 'First Menu',
        'parent' => null,
        'slug' => 'menu-1',
        'icon' => 'fa fa-trash' // <--
    ),
    ...
);
?>
```

This would generate menu item like so:

```html
<li>
    <a href="menu-1"><i class="fa fa-trash"></i> First Menu</a>
</li>
```


Just in case you want position the position the menu on the right side, you can add this line in your configuration:

```php
<?php 
$config['icon_position'] = 'right'; 
?>
```


### Option 3

You can apply menu icon by define icon list in configuration this way:

```php
<?php 
$config['menu_icon_lists'] = array(
    'slug-menu-1' => 'fa fa-list',
    'slug-menu-2' => 'fa fa-plus',
    'slug-menu-3' => 'fa fa-trash',
);
?>
```