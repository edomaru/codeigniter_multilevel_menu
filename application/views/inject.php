<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Codeigniter Multilevel Menu Basic Example With inject men item</title>
</head>
<body>
	<?php $additional_item1 = '<li><a href="#">Additional Item 1</a></li>'; ?>
	<?php $additional_item2 = '<li><a href="#">Additional Item 2</a></li>'; ?>

	<?php echo $this->multi_menu
					->inject_item($additional_item1, 'first')
					->inject_item($additional_item2)
					->render('Item-0'); ?>
</body>
</html>