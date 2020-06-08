<?php
include_once("init.php");
$file=$_POST['data'];
if($file=="viewsales")
{
	$tablename='stock_sales';
}
else if($file=="viewcustomers")
{
	$tablename='customer_details';
}
else if($file=="viewpurchase")
{
	$tablename='stock_entries';
}
else if($file=="viewsupplier")
{
	$tablename='supplier_details';
}
else if($file=="viewproduct")
{
	$tablename='stock_details';
}
  $db->execute("TRUNCATE TABLE ".$tablename);
?>
