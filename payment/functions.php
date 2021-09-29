<?php
// functions.php
function check_txnid($tnxid){
	require '../helpers/config.php';

	return true;
	$valid_txnid = true;
	//get result set
	$q ="SELECT * FROM `payments` WHERE txnid = '$tnxid'";
	$sql = mysqli_query($con, $q);
	if ($row = mysqli_fetch_array($sql)) {
		$valid_txnid = false;
	}
	return $valid_txnid;
}

function check_price($price, $id){
	require '../helpers/config.php';
	$valid_price = false;
	//you could use the below to check whether the correct price has been paid for the product
	
	
	$sql = mysqli_query($con,"SELECT amount FROM `products` WHERE id = '$id'");
	if (mysqli_num_rows($sql) != 0) {
		while ($row = mysqli_fetch_array($sql)) {
			$num = (float)$row['amount'];
			if($num == $price){
				$valid_price = true;
			}
		}
	}
	return $valid_price;
	
	return true;
}

function updatePayments($data){
	require '../helpers/config.php';

	
	if (is_array($data)) {
		$q2 ="INSERT INTO `payments` (txnid, payment_amount, payment_status, itemid, createdtime)
		VALUES (
			   '".$data['txn_id']."' ,
			   '".$data['payment_amount']."' ,
			   '".$data['payment_status']."' ,
			   '".$data['item_number']."' ,
			   '".date("Y-m-d H:i:s")."'
			   )";
		$sql = mysqli_query($con, $q2);
		return mysqli_insert_id($con);
	}
}
?>