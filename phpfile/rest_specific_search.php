<?php

// Declaring class name
class Rest_database {
       public $Name= "";//resturant name
	   public $Phone ="";//resturant phone number
	   public $FullAddress ="";//resturant full address
	   public $SpecificLocation ="";//resturant specific location
       public $Localaddress ="";//resturant local address location
	   public $City ="";//resturant city location
	   public $Country ="";//resturant country location
	   public $Costfor2 ="";// resturant cost for two
       public $Opentime ="";//resturant opening time
       public $Closetime ="";//resturant close time
       public $isPhotoinfoexist ="";//resturant bool variable
	   public $isMenuexist ="";//resturant menu bool
	   public $isReviewexist ="";//resturant review bool
	   public $isMapexist ="";//resturant map bool
	   public $isDine ="";//dining or not
	   public $isBar ="";//resturant bar available or not
	   public $isVeg ="";//resturant is veg if not then non veg
	   public $isParcel =""; // resturant home delivery available or not
}

function filling_data( $row){
   // creating object
   
   echo "hiiiiiiiiii";
   $res_specific = new Rest_database();
   // filling value
   $res_specific->Name = $row['restname'];
   $res_specific->Phone  = $row['phone'];
   $res_specific->FullAddress = $row['specific_add']." ".$row['local_add']." ".$row['city']." ".$row['country'];
   $res_specific->SpecificLocation  = $row['specific_add'];
   $res_specific->Localaddress = $row['local_add'];
   $res_specific->City = $row['city'];
   $res_specific->Country = $row['country'];
   $res_specific->Costfor2 = $row['cost_for_two'];
   $res_specific->Opentime = $row['open_time'];
   $res_specific->Closetime = $row['close_time'];
                                                          //To Do all boolean variable should be push into one
   $res_specific->isPhotoinfoexist = $row['photo_info'];
   $res_specific->isMenuexist = $row['menu_info'];
   $res_specific->isReviewexist = $row['review_info'];
   $res_specific->isMapexist = $row['map_info'];
   $res_specific->isDine = $row['isdine'];
   $res_specific->isBar = $row['isbar'];
   $res_specific->isVeg = $row['veg_nonveg'];
   $res_specific->isParcel = $row['ishomedev']; 

   return $res_specific; 
} 

function getTopNineResturant(){  

 // query 
 $query = "SELECT * FROM yp_resturant_info";
 $resturant = array();
 $count_iterator = 0;
 
 if($result = mysql_query($query)){
   
  while ($row = mysql_fetch_assoc($result) && $count_iterator <=3 ) {      
        $resturant[] = $row;
    }
 }
    // JSON-ify all rows together as one big array
    echo json_encode($resturant);

}

?>