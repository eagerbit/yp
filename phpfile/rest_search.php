<?php
    /* This page search resutrant data based on its count, rating and priority */
   
   // Start session
   // require_once('auth.php');
	
    // Include database connection details
	require_once('dbconnection.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	//Validation error flag
	$errflag = false;
	
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	//Sanitize the GET values
	//$rest_count = clean($_GET['count']);
	//$rest_rating = clean($_GET['rating']);
	//$rest_priority = clean($_GET['priority']);
	
	$rest_count = 3;
	$rest_rating = 4;
	$rest_priority = "TOP";
 
	//Input Validations if fails than setting default value 
	if($rest_count == '') {
		$errmsg_arr[] = 'count missing';
		$errflag = true;
		$rest_count = 3;
	}
	if($rest_rating == '') {
		$errmsg_arr[] = 'rating missing';
		$errflag = true;
		$rest_rating = 6 ;
	}
	if($rest_priority == '') {
		$errmsg_arr[] = 'priority missing';
		$errflag = true;
		$rest_priority = "TOP";
	}

	//getting resturant 
	$resturant = array();
	include 'rest_specific_search.php';
    
	function getResturant($rest_count,$rest_rating,$rest_priority){
	  if($rest_count == 3){
	     $resturant = getTopNineResturant();
	  }
	}
	
	getResturant($rest_count,$rest_rating,$rest_priority);
	
	return $resturant;
?>
