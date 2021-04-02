<?php

define('HOST','localhost');
define('USER','mycoinst_user');
define('PASS','mycoinst@123@321');
define('DB','mycoinst_db');

$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect');

$sql = "DELETE FROM walletmaster WHERE con=0 and description='Refer Commission Income'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}


?>