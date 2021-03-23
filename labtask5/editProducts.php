<?php if(!empty($_GET['id'])){ ?>
<?php 

require_once 'controller/displayControler.php';
$tableName = 'product';
$product = fetchProduct($tableName, $_GET['id']);

?>