<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>jQuery Bootstrap Submenu Plugin Demo</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-submenu.min.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/docs.min.css">

<script src="http://code.jquery.com/jquery-2.1.1.min.js" defer></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" defer></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap-submenu.min.js" defer></script>
<script src="<?php echo base_url(); ?>assets/js/docs.js" defer></script>

</head>
<body>
  <div class="container">
    <div class="jumbotron">
        <h1>Codeigniter Multi Level menu</h1>
        <h2>with Bootstrap 3.4 & Bootstrap Submenu Plugin Demos</h2>
    </div>

    <h3>Dropdown</h3>
    <div class="dropdown m-b">
        <button class="btn" type="button" data-toggle="dropdown">
            Dropdown
            <span class="caret"></span>
        </button>

        <?php echo $this->multi_menu->render(array(
            'nav_tag_open'      => '<ul class="dropdown-menu" role="menu">',
            'nav_tag_close'     => '</ul>',
            'parent_tag_open'   => '<li class="dropdown-submenu">',
            'parent_anchor_tag' => '<a href="%s" data-toggle="dropdown">%s</a>',
            'children_tag_open' => '<ul class="dropdown-menu">'
        )); ?>

    </div>


    <h3>Navbar</h3>
    <nav class="navbar navbar-default">
      <div class="navbar-header">
        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand">Project Name</a>
      </div>

      <div class="collapse navbar-collapse">

        <?php echo $this->multi_menu->render(array(
            'nav_tag_open'        => '<ul class="nav navbar-nav">',            
            'parentl1_tag_open'   => '<li class="dropdown">',
            'parentl1_anchor_tag' => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
            'parent_tag_open'     => '<li class="dropdown-submenu">',
            'parent_anchor_tag'   => '<a href="%s" data-toggle="dropdown">%s</a>',
            'children_tag_open'   => '<ul class="dropdown-menu">'
        )); ?>
        
      </div>
    </nav>

    <h3>Pills</h3>
    <?php echo $this->multi_menu->render(array(
        'nav_tag_open'        => '<ul class="nav nav-pills">',            
        'parentl1_tag_open'   => '<li class="dropdown">',
        'parentl1_anchor_tag' => '<a tabindex="0" data-toggle="dropdown" href="%s">%s<span class="caret"></span></a>',
        'parent_tag_open'     => '<li class="dropdown-submenu">',
        'parent_anchor_tag'   => '<a href="%s" data-toggle="dropdown">%s</a>',
        'children_tag_open'   => '<ul class="dropdown-menu">',
        'active_item'         => 'Item-6'
    )); ?>
    
</div>
  
</body>
</html>
