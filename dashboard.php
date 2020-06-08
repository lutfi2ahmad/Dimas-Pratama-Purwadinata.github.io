<?php
include_once("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
</head>
<body>
<?php include_once("tpl/top_bar.php"); ?>
<div id="header-with-tabs">
    <div class="page-full-width cf">
        <ul id="tabs" class="fl">
            <li><a href="dashboard.php" class="active-tab dashboard-tab">Dashboard</a></li>
            <li><a href="view_sales.php" class="sales-tab">Penjualan</a></li>
            <li><a href="view_customers.php" class=" customers-tab">Pelangggan</a></li>
            <li><a href="view_purchase.php" class="purchase-tab">Pembelian</a></li>
            <li><a href="view_supplier.php" class=" supplier-tab">Pemasok</a></li>
            <li><a href="view_product.php" class=" stock-tab">Produk</a></li>
            <li><a href="view_payments.php" class="payment-tab">Pembayaran</a></li>
            <li><a href="view_report.php" class="report-tab">Laporan</a></li>
        </ul>
        <a href="dashboard.php" id="company-branding-small" class="fr"><img src="images/s.png" alt=""></a>
    </div>
</div>
<div id="content">
    <div class="page-full-width cf">
        <div class="side-menu fl">
            <h3>Pintasan Menu</h3>
            <ul>
                <li><a href="add_sales.php">Tambah Penjualan</a></li>
                <li><a href="add_purchase.php">Tambah Pembelian</a></li>
                <li><a href="add_supplier.php">Tambah Pemasok</a></li>
                <li><a href="add_customer.php">Tambah Pelangggan</a></li>
                <li><a href="view_report.php">Laporan</a></li>
            </ul>
        </div>
        <div class="side-content fr">
            <div class="content-module">
                <div class="content-module-heading cf">
                    <h3 class="fl">Analisis</h3>
                </div>
            <div class="content-module-main cf">
                    <table style="width:inheritance; height:inheritance;">
                        <tr>
                            <td width="250" align="left">&nbsp;</td>
                            <td width="150" align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Produk</td>
                            <td align="left"><?php echo $count = $db->countOfAll("stock_avail"); ?>&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Transaksi Penjualan</td>
                            <td align="left"><?php echo $count = $db->countOfAll("stock_sales"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Pemasok</td>
                            <td align="left"><?php echo $count = $db->countOfAll("supplier_details"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">Total Pelanggan</td>
                            <td align="left"><?php echo $count = $db->countOfAll("customer_details"); ?></td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                        <tr>
                            <td align="left">&nbsp;</td>
                            <td align="left">&nbsp;</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
<div id="footer">

</div>
</footer>
</html>
