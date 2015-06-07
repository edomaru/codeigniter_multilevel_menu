<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">    
    <title>Codeigniter Multilevel Menu With Bootstrap 3.0 Example</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
   		<style type="text/css">
        
			.dropdown-submenu {
			    position: relative;
			}

			.dropdown-submenu>.dropdown-menu {
			    top: 0;
			    left: 100%;
			    margin-top: -6px;
			    margin-left: -1px;
			    -webkit-border-radius: 0 6px 6px 6px;
			    -moz-border-radius: 0 6px 6px;
			    border-radius: 0 6px 6px 6px;
			}

			.dropdown-submenu:hover>.dropdown-menu {
			    display: block;
			}

			.dropdown-submenu>a:after {
			    display: block;
			    content: " ";
			    float: right;
			    width: 0;
			    height: 0;
			    border-color: transparent;
			    border-style: solid;
			    border-width: 5px 0 5px 5px;
			    border-left-color: #ccc;
			    margin-top: 5px;
			    margin-right: -10px;
			}

			.dropdown-submenu:hover>a:after {
			    border-left-color: #fff;
			}

			.dropdown-submenu.pull-left {
			    float: none;
			}

			.dropdown-submenu.pull-left>.dropdown-menu {
			    left: -100%;
			    margin-left: 10px;
			    -webkit-border-radius: 6px 0 6px 6px;
			    -moz-border-radius: 6px 0 6px 6px;
			    border-radius: 6px 0 6px 6px;
			}
	    </style>
	    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
        <h2>Multi level dropdown menu in Bootstrap 3.0</h2>        
        <hr>
        <div class="dropdown">
            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                Dropdown <span class="caret"></span>
            </a>
    		<?php echo $this->multi_menu->render('Item-0', array('Item-3', 'Item-5')); ?>
        </div>
        <br>
        <p>Using Bootstrap snippet created by <a href='http://bootsnipp.com/snippets/featured/multi-level-dropdown-menu-bs3'>msurguy</a></p>
	</div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
