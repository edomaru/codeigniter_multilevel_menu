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
        <h1>Bootstrap Submenu Plugin Demos</h1>
    </div>

    <h3>Dropdown</h3>
    <div class="dropdown m-b">
        <button class="btn" type="button" data-toggle="dropdown">
            Dropdown
            <span class="caret"></span>
        </button>

        <?php echo $this->multi_menu->render(array(
            'nav_tag_open' => '<ul class="dropdown-menu" role="menu">',
            'nav_tag_close' => '</ul>',
            'parent_tag_open' => '<li class="dropdown-submenu">',
            'parent_anchor_tag' => '<a href="%s" data-toggle="dropdown">%s</a>'
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
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a tabindex="0" data-toggle="dropdown">Dropdown<span class="caret"></span></a>

            <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
            <ul class="dropdown-menu" role="menu">
              <li class="dropdown-submenu">
                <a tabindex="0" data-toggle="dropdown">Action</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li class="dropdown-submenu">
                    <a tabindex="0" data-toggle="dropdown">Another sub action</a>

                    <ul class="dropdown-menu">
                      <li><a tabindex="0">Sub action</a></li>
                      <li><a tabindex="0">Another sub action</a></li>
                      <li><a tabindex="0">Something else here</a></li>
                    </ul>
                  </li>
                  <li><a tabindex="0">Something else here</a></li>
                  <li class="dropdown-submenu">
                    <a tabindex="0" data-toggle="dropdown">Another action</a>

                    <ul class="dropdown-menu">
                      <li><a tabindex="0">Sub action</a></li>
                      <li><a tabindex="0">Another sub action</a></li>
                      <li><a tabindex="0">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
              </li>

              <li class="dropdown-submenu">
                <a tabindex="0" data-toggle="dropdown">Another action</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li><a tabindex="0">Another sub action</a></li>
                  <li><a tabindex="0">Something else here</a></li>
                </ul>
              </li>
              <li><a tabindex="0">Something else here</a></li>
              <li class="divider"></li>
              <li><a tabindex="0">Separated link</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" tabindex="0" aria-expanded="false">Dropdown 2<span class="caret"></span></a>

            <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
            <ul role="menu" class="dropdown-menu">
              <li class="dropdown-submenu">
                <a data-toggle="dropdown" tabindex="0">Action</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li class="dropdown-submenu">
                    <a data-toggle="dropdown" tabindex="0">Another sub action</a>

                    <ul class="dropdown-menu">
                      <li><a tabindex="0">Sub action</a></li>
                      <li><a tabindex="0">Another sub action</a></li>
                      <li><a tabindex="0">Something else here</a></li>
                    </ul>
                  </li>
                  <li><a tabindex="0">Something else here</a></li>
                </ul>
              </li>
              <li><a tabindex="0">Another action</a></li>
              <li class="dropdown-submenu">
                <a data-toggle="dropdown" tabindex="0" aria-expanded="false">Something else here</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li><a tabindex="0">Another sub action</a></li>
                  <li><a tabindex="0">Something else here</a></li>
                </ul>
              </li>
              <li class="divider"></li>
              <li><a tabindex="0">Separated link</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

    <h3>Pills</h3>
    <ul class="nav nav-pills">
      <li class="active"><a tabindex="0">Regular link</a></li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown">Dropdown<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Action</a>

            <ul class="dropdown-menu">
              <li><a tabindex="0">Sub action</a></li>
              <li class="dropdown-submenu">
                <a tabindex="0" data-toggle="dropdown">Another sub action</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li><a tabindex="0">Another sub action</a></li>
                  <li><a tabindex="0">Something else here</a></li>
                </ul>
              </li>
              <li><a tabindex="0">Something else here</a></li>
            </ul>
          </li>
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Another action</a>

            <ul class="dropdown-menu">
              <li><a tabindex="0">Sub action</a></li>
              <li><a tabindex="0">Another sub action</a></li>
              <li><a tabindex="0">Something else here</a></li>
            </ul>
          </li>
          <li><a tabindex="0">Something else here</a></li>
          <li class="divider"></li>
          <li><a tabindex="0">Separated link</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a tabindex="0" data-toggle="dropdown">Dropdown 2<span class="caret"></span></a>

        <!-- role="menu": fix moved by arrows (Bootstrap dropdown) -->
        <ul class="dropdown-menu" role="menu">
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Action</a>

            <ul class="dropdown-menu">
              <li><a tabindex="0">Sub action</a></li>
              <li class="dropdown-submenu">
                <a tabindex="0" data-toggle="dropdown">Another sub action</a>

                <ul class="dropdown-menu">
                  <li><a tabindex="0">Sub action</a></li>
                  <li><a tabindex="0">Another sub action</a></li>
                  <li><a tabindex="0">Something else here</a></li>
                </ul>
              </li>
              <li><a tabindex="0">Something else here</a></li>
            </ul>
          </li>
          <li><a tabindex="0">Another action</a></li>
          <li class="dropdown-submenu">
            <a tabindex="0" data-toggle="dropdown">Something else here</a>

            <ul class="dropdown-menu">
              <li><a tabindex="0">Sub action</a></li>
              <li><a tabindex="0">Another sub action</a></li>
              <li><a tabindex="0">Something else here</a></li>
            </ul>
          </li>
          <li class="divider"></li>
          <li><a tabindex="0">Separated link</a></li>
        </ul>
      </li>
    </ul>
</div>
  
</body>
</html>
