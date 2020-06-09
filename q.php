<?php
$SQL = "SELECT * FROM  customer_details";
if (isset($_POST['Search']) AND trim($_POST['searchtxt']) != "") {

    $SQL = "SELECT * FROM  customer_details WHERE customer_name LIKE '%" . $_POST['searchtxt'] . "%' OR customer_address LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact1 LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact2 LIKE '%" . $_POST['searchtxt'] . "%'";
}
$tbl_name = "customer_details"; 
$adjacents = 3;
$query = "SELECT COUNT(*) as num FROM $tbl_name";
if (isset($_POST['Search']) AND trim($_POST['searchtxt']) != "") {

    $query = "SELECT COUNT(*) as num FROM  customer_details WHERE customer_name LIKE '%" . $_POST['searchtxt'] . "%' OR customer_address LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact1 LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact2 LIKE '%" . $_POST['searchtxt'] . "%'";
}
$total_pages = mysqli_fetch_array(mysqli_query($db->connection, $query));
$total_pages = $total_pages['num'];
$targetpage = "view_customer_details.php";

$limit = 10;
if (isset($_GET['limit']))
    $limit = $_GET['limit'];
$page = isset($_GET['page']) ? $_GET['page'] : 0;
if ($page)
    $start = ($page - 1) * $limit;
else
    $start = 0;
$sql = "SELECT * FROM customer_details LIMIT $start, $limit ";
if (isset($_POST['Search']) AND trim($_POST['searchtxt']) != "") {
    $sql = "SELECT * FROM  customer_details WHERE customer_name LIKE '%" . $_POST['searchtxt'] . "%' OR customer_address LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact1 LIKE '%" . $_POST['searchtxt'] . "%' OR customer_contact2 LIKE '%" . $_POST['searchtxt'] . "%'  LIMIT $start, $limit";
}
$result = mysqli_query($db->connection, $sql);
if ($page == 0) $page = 1;
$prev = $page - 1;
$next = $page + 1;
$lastpage = ceil($total_pages / $limit); 
$lpm1 = $lastpage - 1;
$pagination = "";
if ($lastpage > 1) {
    $pagination .= "<div class=\"pagination\">";
    if ($page > 1)
        $pagination .= "<a href=\"$targetpage?page=$prev&limit=$limit\">� previous</a>";
    else
        $pagination .= "<span class=\"disabled\">� previous</span>";
    if ($lastpage < 7 + ($adjacents * 2))
    {
        for ($counter = 1; $counter <= $lastpage; $counter++) {
            if ($counter == $page)
                $pagination .= "<span class=\"current\">$counter</span>";
            else
                $pagination .= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";
        }
    } elseif ($lastpage > 5 + ($adjacents * 2))
    {
        if ($page < 1 + ($adjacents * 2)) {
            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";
            }
            $pagination .= "...";
            $pagination .= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";
            $pagination .= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";
        }
        elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
            $pagination .= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";
            $pagination .= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";
            $pagination .= "...";
            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";
            }
            $pagination .= "...";
            $pagination .= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";
            $pagination .= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";
        }
        else {
            $pagination .= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";
            $pagination .= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";
            $pagination .= "...";
            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";
            }
        }
    }
    if ($page < $counter - 1)
        $pagination .= "<a href=\"$targetpage?page=$next&limit=$limit\">next �</a>";
    else
        $pagination .= "<span class=\"disabled\">next �</span>";
    $pagination .= "</div>\n";
}
?>