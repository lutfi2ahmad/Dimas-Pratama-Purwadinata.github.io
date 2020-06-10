<?php
include_once("init.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Tambah Jenis Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
    <script src="js/add_category.js"></script>
</head>
<body>
<?php include_once("tpl/top_bar.php"); ?>
<div id="header-with-tabs">
    <div class="page-full-width cf">
      <ul id="tabs" class="fl">
          <li><a href="dashboard.php" class="dashboard-tab">Dashboard</a></li>
          <li><a href="view_sales.php" class="sales-tab">Penjualan</a></li>
          <li><a href="view_customers.php" class=" customers-tab">Pelangggan</a></li>
          <li><a href="view_purchase.php" class="purchase-tab">Pembelian</a></li>
          <li><a href="view_supplier.php" class=" supplier-tab">Pemasok</a></li>
          <li><a href="view_product.php" class="active-tab stock-tab">Produk</a></li>
          <li><a href="view_payments.php" class="payment-tab">Pembayaran</a></li>
          <li><a href="view_report.php" class="report-tab">Rekap Laporan</a></li>
      </ul>
  <a href="dashboard.php" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
  </div>
</div>
<div id="content">
    <div class="page-full-width cf">
        <div class="side-menu fl">
            <h3>Kelola Data Produk</h3>
            <ul>
                <li><a href="add_stock.php">Tambah Bibit Tanaman</a></li>
                <li><a href="view_product.php">Lihat Bibit Tanaman</a></li>
                <li><a href="add_category.php">Tambah Jenis Bibit Tanaman</a></li>
                <li><a href="view_category.php">Lihat Jenis Bibit Tanaman</a></li>
                <li><a href="view_stock_availability.php">Lihat Stok</a></li>
            </ul>
        </div>
        <div class="side-content fr">
           <div class="content-module">
                  <div class="content-module-heading cf">
                      <h3 class="fl">Tambah Jenis Bibit</h3>
                  </div>
                  <div class="content-module-main cf">
                    <?php
                    if (isset($_POST['name'])) {
                        $_POST = $gump->sanitize($_POST);
                        $gump->validation_rules(array(
                            'name' => 'required|max_len,100|min_len,3',
                            'address' => 'max_len,200',
                        ));
                        $gump->filter_rules(array(
                            'name' => 'trim|sanitize_string|mysqli_escape',
                            'address' => 'trim|sanitize_string|mysqli_escape',
                        ));
                        $validated_data = $gump->run($_POST);
                        $name = "";
                        $address = "";
                        if ($validated_data === false) {
                            echo $gump->get_readable_errors(true);
                        } else {
                            $name = mysqli_real_escape_string($db->connection, $_POST['name']);
                            $address = mysqli_real_escape_string($db->connection, $_POST['address']);
                            $count = $db->countOf("category_details", "category_name='$name'");
                            if ($count == 1) {
                                echo "<font color=red> Dublicat Entry. Please Verify</font>";
                            } else {

                                if ($db->query("insert into category_details values(NULL,'$name','$address')"))
                                    echo "<br><font color=green size=+1 > [ $name ] Category Details Added !</font>";
                                else
                                    echo "<br><font color=red size=+1 >Problem in Adding !</font>";
                            }
                        }
                    }
                    ?>
                    <form name="form1" method="post" id="form1" action="">
                        <p><strong>Masukan Jenis Bibit</strong></p>
                        <table class="form" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><span class="man">*</span>Nama:</td>
                                <td><input name="name" placeholder="Jenis Produk " type="text" id="name"
                                           maxlength="200" class="round default-width-input"
                                           value="<?php echo isset($name) ? $name : ''; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><textarea name="address" placeholder="" cols="8"
                                              class="round full-width-textarea"><?php echo isset($address) ? $address : ''; ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    &nbsp;
                                </td>
                                <td>
                                    <input class="button round blue image-right ic-add text-upper" type="submit"
                                           name="Submit" value="Simpan">

                                <td align="right"><input class="button round red   text-upper" type="reset" name="Reset"
                                                         value="Batal"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<?php include_once("tpl/footer.php"); ?>
</html>
