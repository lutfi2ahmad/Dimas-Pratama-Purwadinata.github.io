<?php
include_once("init.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Pure Nature Shop - Tambah Jenis Produk</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include_once("tpl/common_js.php"); ?>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function () {
            $("#form1").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 200
                    }
                    contact1: {
                        minlength: 3,
                        maxlength: 20
                    },
                    contact2: {
                        minlength: 3,
                        maxlength: 20
                    }
                },
                messages: {
                    name: {
                        required: "Silahkan Masukan nama pelanggan",
                        minlength: "minimal mengandung 3 karakter"
                    },
                    }
                }
            });
        });
    </script>
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
            <h3>Kelola data produk</h3>
            <ul>
                <li><a href="add_stock.php">Tambah Bibit Tanaman</a></li>
                <li><a href="view_stock.php">Lihat Bibit Tanaman</a></li>
                <li><a href="add_cat.php">Tambah Jenis Bibit</a></li>
            </ul>
        </div>

        <div class="side-content fr">
            <div class="content-module">
                <div class="content-module-heading cf">
                    <h3 class="fl">Tambah Pelanggan</h3>
                </div>

                <div class="content-module-main cf">
                    <?php
                    if (isset($_POST['name'])) {
                        $_POST = $gump->sanitize($_POST);
                        $gump->validation_rules(array(
                            'name' => 'required|max_len,100|min_len,3',
                            'address' => 'max_len,200',
                            'contact1' => 'alpha_numeric|max_len,20',
                            'contact2' => 'alpha_numeric|max_len,20'
                        ));
                        $gump->filter_rules(array(
                            'name' => 'trim|sanitize_string|mysqli_escape',
                            'address' => 'trim|sanitize_string|mysqli_escape',
                            'contact1' => 'trim|sanitize_string|mysqli_escape',
                            'contact2' => 'trim|sanitize_string|mysqli_escape'
                        ));
                        $validated_data = $gump->run($_POST);
                        $name = "";
                        $address = "";
                        $contact1 = "";
                        $contact2 = "";
                        if ($validated_data === false) {
                            echo $gump->get_readable_errors(true);
                        } else {
                            $name = mysqli_real_escape_string($db->connection, $_POST['name']);
                            $address = mysqli_real_escape_string($db->connection, $_POST['address']);
                            $contact1 = mysqli_real_escape_string($db->connection, $_POST['contact1']);
                            $contact2 = mysqli_real_escape_string($db->connection, $_POST['contact2']);
                            $count = $db->countOf("customer_details", "customer_name='$name'");
                            if ($count == 1) {
                                echo "<div class='error-box round'>Dublicat Entry. Please Verify</div>";
                            } else {

                                if ($db->query("insert into customer_details values(NULL,'$name','$address','$contact1','$contact2',0)"))
                                    echo "<div class='confirmation-box round'>[ $name ] Customer Details Added !</div>";
                                else
                                    echo "<div class='error-box round'>Problem in Adding !</div>";
                            }
                        }
                    }
                    ?>
                    <form name="form1" method="post" id="form1" action="">
                        <p><strong>Add Customer Details </strong> - Add New ( Control +A)</p>
                        <table class="form" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td><span class="man">*</span>Name:</td>
                                <td><input name="name" type="text" id="name" maxlength="200"
                                           class="round default-width-input" value="<?php echo $name; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td><textarea name="address" cols="15"
                                              class="round full-width-textarea"><?php echo $address; ?></textarea></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Contact 1</td>
                                <td><input name="contact1" type="text" id="buyingrate" maxlength="20"
                                           class="round default-width-input"
                                           value="<?php echo $contact1; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>Contact 2</td>
                                <td><input name="contact2" type="text" id="sellingrate" maxlength="20"
                                           class="round default-width-input"
                                           value="<?php echo $contact2; ?>"/></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;

                                </td>
                                <td>
                                    <input class="button round blue image-right ic-add text-upper" type="submit"
                                           name="Submit" value="Simpan">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">

    </div>

</body>
</html>
