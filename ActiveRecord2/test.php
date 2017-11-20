<?php
require_once './repo/user.php';



// Following code for inseting new record...
	$user = new user();
	$user ->id="";
	$user->firstname = "Ellen";
	$user->lastname = "Hunt" ;
	$user->email="ehunt@www.com";
	$date = new DateTime();
	$strDate = $date->format('Y-m-d H:i:s');
	//echo "date string ...". $strDate;
	$user->reg_date= $strDate;
	$user->save();

	
// update record with new data
/*
	$user = new user();
	$user ->id="9";
	$user->firstname = "Ellen";
	$user->lastname = "Hunt" ;
	$user->email="ehunt@www.com";
	$date = new DateTime();
	$strDate = $date->format('Y-m-d H:i:s');
	//echo "date string ...". $strDate;
	$user->reg_date= $strDate;
	$user->save();
*/
// Delete record...
	/*
	$user = new user();
	$user ->id="20";
	$user->delete();
	*/
?>