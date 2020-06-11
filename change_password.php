<?php
include_once("init.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Dashboardk</title>
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
        <div class="side-menu fr">
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
                  <?php
                  if (isset($_POST['old_pass']) and isset($_POST['new_pass']) and isset($_POST['confirm_pass'])) {
                      $username = $_SESSION['username'];
                      $old_pass = $_POST['old_pass'];
                      $count = $db->countOf("stock_user", "username='$username' and password='$old_pass'");
                      if ($count == 0) {
                          echo "<br><font color=red size=3px>Password lama salah!</font>";
                      } else {
                          if (trim($_POST['new_pass']) == trim($_POST['confirm_pass'])) {
                              $con = $_POST['confirm_pass'];
                              $db->query("update stock_user  SET password='$con' where username='$username'");
                              echo "<br><font color=green size=3px >Password berhasil diperbarui!</font>";
                          } else {
                              echo "<br><font color=red size=3px >Password baru tidak cocok!</font>";
                          }
                      }
                  }
                  ?>
                    <form action="" method="post">
                        <table style="width:600px; margin-left:50px; float:left;" border="0" cellspacing="0"
                               cellpadding="0">
                            <tr>
                                <td>Password Lama</td>
                                <td><input type="password" name="old_pass"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Password Baru</td>
                                <td><input type="password" name="new_pass"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Ulangi Password Baru</td>
                                <td><input type="password" name="confirm_pass"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <input class="button round blue image-right ic-add text-upper" type="submit"
                                           name="Submit" name="change_pass" value="Simpan">
                                </td>
                                <td>
                                    <input class="button round red   text-upper" type="reset" name="Reset"
                                           value="Batal">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("tpl/footer.php"); ?>
</body>
</html>
