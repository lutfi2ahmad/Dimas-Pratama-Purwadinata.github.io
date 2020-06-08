<?php
include_once("init.php");
$file=$_POST['file'];
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
if($_POST['data'])
{
	$data=$_POST['data'];

	 foreach($data as $d){
	  $d=substr($d,1);
  $db->execute("DELETE FROM ".$tablename." WHERE id='$d'");
  }
}
exit;
?>
