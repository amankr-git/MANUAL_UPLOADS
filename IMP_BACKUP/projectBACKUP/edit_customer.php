<?php
include 'sessionphp.php';?>
<?php
$customer_no = null;
$name = null;
//$last_name = null;
$phone_no = null;
$address = null;
if(isset($_GET['search'])) {
$customer_no = $_GET['customer_no'];

include 'sqlconnect.php';
$sql = "SELECT * FROM customer WHERE customer_no ='$customer_no'";
$result = $con->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    //$last_name = $row['last_name'];
    $phone_no = $row['phone_no'];
    $address = $row['address'];
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit customer</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<header><h2>Edit customer</h2></header>
<hr>
<div class=flexbox>
<aside>
    <nav>
    <ul>
        <li><a href="Add_customer.php"><i class="fa fa-address-book"></i> Add customer </a></li>
        <li><a href="customer_list.php"><i class="fa fa-list-ul"></i> Customer List </a></li>
        <li><a href="Add_item.php"><i class="fa fa-plus"></i> Add Item</a></li>
        <li><a href="#"><i class="fa fa-th-list"></i> Item List </a></li>
        <li><a href="create_invoice.php"><i class="fa fa-file"></i>Create Invoice</a></li>
        <li><i class="fa fa-archive"></i> Stock</li>
        <li><i class="fa fa-bar-chart"></i> Report</li>
    </ul>
    </nav>
</aside>
<main><b>Please provide the customer number </b><br><br>
<form>
    <label for ="customer_no">CNo:</label><br>
    <input type="text" id="customer_no" name="customer_no" value=<?= $customer_no ?>>
    <button name="search">Search</button><br>
</form>
<form action="edit_c_submit.php">
    <input type="hidden" name="cu_no" value=<?= $customer_no ?>>
    <label for ="name">Name :</label><br>
    <input type="text" id="name" name="name" value=<?= $name ?>><br>
   <!--   <label for ="last_name">Last name :</label><br>
    <input type="text" id="last_name" name="last_name" value=><br>-->
    <label for ="phone_no">Phone Number:</label><br>
    <input type="text" id="phone_no" name="phone_no" value=<?= $phone_no ?>><br>
    <label for ="address">Address :</label><br>
    <input type="text" id="address" name="address" value="<?= $address ?>"><br><br>
    <button class="Submit"> Submit</button>
</form>
    </main>
</div>
<hr>
<footer><h2>&copy; 2021 Copyright - All Rights Reserved</h2></footer>
</body>
</html>
