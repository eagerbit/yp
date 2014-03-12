<?php
/* This file do following things : [Key is mail id ]
   1. Sign Up with unique email id is allowed  
   2. Only username , passwd and mail is required for login
   3. update profile by adding address , phone 
   4. change username or passwd 
   5. login field to cleint
   6. user exist or not 
 */
$username='ankur';
$password='ankur';
$database='yp_eagerbit';

//call from client 
$fieldname = 'a';
$fieldpasswd= 'pandey';
$fieldemail = 'panhh@gmail.com';
$fieldphone = '97397' ;
$fieldaddress = 'janahmandu ankur';
$signup ='1';
$update ='0';
$sigin ='signin';

//$name=$_POST['name'];
//$comment=$_POST['comment'];
//$signup=$_POST['Signup'];

// connecting database :
$db = mysql_connect('localhost', "$username", "$password");
if (!$db) {
    die('Could not connect to database : ' . mysql_error());
}
@mysql_select_db("$database") or die( "Unable to select database");
mysql_query("SET character_set_client=utf8", $db);
mysql_query("SET character_set_connection=utf8", $db);

    if($signup) // sign up for user 
    {
	    $query = "SELECT * FROM yp_user_db WHERE email='$fieldemail' ";
		if($result = mysql_query($query))
		{
		  $row = mysql_fetch_array($result);
		  if($row){
		  echo "user all ready exist";
		  }
		  else{
		        if($fieldname && $fieldpasswd && $fieldemail){
               $insert=mysql_query("INSERT INTO yp_user_db (username,userpasswd,email,phone,address) VALUES ('$fieldname','$fieldpasswd',
			                                               '$fieldemail','$fieldphone','$fieldaddress') ");
			}											   
            else
            {
                echo "Please fill out all fields";
            }
		  }
		}
		else
        {
		   echo "mysql error " ;    
        }
       //closing db
       mysql_close($db);		
       exit();		
    }
	elseif($update) // update for user database
    {
	    $query = "SELECT * FROM yp_user_db Where email='$fieldemail'";
		if($result = mysql_query($query))
		{
            if($fieldname&&$fieldpasswd&&$fieldemail&&$fieldphone){
               $insert=mysql_query("UPDATE yp_user_db SET address ='$fieldaddress' WHERE email='$fieldemail'");
			   $insert=mysql_query("UPDATE yp_user_db SET username ='$fieldname' WHERE email='$fieldemail'");
			   $insert=mysql_query("UPDATE yp_user_db SET userpasswd ='$fieldpasswd' WHERE email='$fieldemail'");
			   $insert=mysql_query("UPDATE yp_user_db SET phone ='$fieldphone' WHERE email='$fieldemail'");
			}else{								    
			echo "User already exist";
			}
		}
		else
        {  
            echo "User dont exist ";   
        }	
		//closing db
       mysql_close($db);
       exit();		
    }
	else{ // sign in and details for client
          
  		  // Declaring class name
            class user_specific {
                 public $Name = "";//user name
	             public $Phone = "";//user Phone
	             public $Email = "";//user email
	             public $FullAddress ="";//user full address
	             public $CreditCard ="";//user credit card
            }
           // creating object
          $res_specific = new user_specific();

          // query 
           $query = "SELECT * FROM yp_user_db WHERE  email='$fieldemail' && userpasswd='$fieldpasswd' ";

          if($result = mysql_query($query))
          {
            // filling data 
            $row = mysql_fetch_array($result);
            $res_specific->Name = $row['username'];
            $res_specific->Phone  = $row['phone'];
            $res_specific->Email = $row['email'];
            $res_specific->FullAddress = $row['address'];
            // sending to client
             echo json_encode($res_specific);
          } else {
                echo " User dont exist" ;
          }
	    }

//closing db
mysql_close($db);
?>
