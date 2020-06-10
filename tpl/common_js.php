	<link rel="stylesheet" href="css/cmxform.css">
	<script src="js/lib/jquery.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.hotkeys-0.7.9.min.js" type="text/javascript"></script>
	<script src="js/lib/jquery.validate.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function() {
			jQuery(document).bind('keydown', 'Ctrl+s',function() {
			  $('#form1').submit();
			  return false;
				});
			jQuery(document).bind('keydown', 'Ctrl+a',function() {
			window.location = "";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+u',function() {
			window.location = "add_supplier.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+0',function() {
			window.location = "dashboard.php";
		  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+1',function() {
			window.location = "add_purchase.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+2',function() {
			window.location = "add_stock.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl++',function() {
			window.location = "add_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+4',function() {
			window.location = "add_category.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+5',function() {
			window.location = "add_supplier.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+6',function() {
			window.location = "add_customer.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+7',function() {
			window.location = "view_product.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+8',function() {
			window.location = "view_sales.php";
			  return false;
			});
			jQuery(document).bind('keydown', 'Ctrl+9',function() {
			window.location = "view_purchase.php";
			  return false;
                      });
                          jQuery(document).bind('keydown', 'Ctrl+return',function() {
			    $('#form1').submit();
			  return false;
			});
		});
	</script>
