<?php

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
*/
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

include (TEMPLATE_PATH . "/public/header.html");

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");


$activeProperty = "active";
?>


<div class="container">

    <div class="row">
    <h1>Nama's Only Property Website</h1>
    </div>
    
    <?php
    //list all the properties
    $propertyList = list_all_properties();
  
    //call the function in functions.inc 
    $records = list_property_types();
    
    //declare the array to hold list
    $arrayPropertyType = array();
    //set the initial count to 0
    
    $count = 0;
	//while there is data to get - get it and populate the array
	while ($record = mysql_fetch_assoc($records)){
            
        $arrayPropertyType[$count]["label"] = $record['propertyType'];
        $arrayPropertyType[$count]["id"] = $record['type_id'];
        $count++;//increment the count by one
        
    }
    
    
    $records = list_counties();
    
    $arrayCounties = array();
    
	$count = 0;
	
	while ($record = mysql_fetch_assoc($records)){
        $arrayCounties[$count]["label"] = $record['county'];
        $arrayCounties[$count]["id"] = $record['county_id'];
        $count++;
        
    }
    
     $records = list_salestatus();
    $arraySalesStatus = array();
	$count = 0;
	
	while ($record = mysql_fetch_assoc($records)){
        $arraySalesStatus[$count]["label"] = $record['saleStatus'];
        $arraySalesStatus[$count]["id"] = $record['sale_id'];
        $count++;
        
    }
    
        $records = list_priceRange();
        $arrayPriceRange = array();
	$count = 0;
	
	while ($record = mysql_fetch_assoc($records)){
        $arrayPriceRange[$count]["label"] = $record['priceRange'];
        $arrayPriceRange[$count]["id"] = $record['range_id'];
        $count++;
        
    }
    
    
    ?>
    
    
    
    <div class="row">
        <div class="span3">
            <?  echo "<div>";
        	echo uihelperSelect('type_id', $arrayPropertyType);
        	echo "</div>";?>
            <button class="btn-custom btn-info" id="btnType">Filter By House Type</button>
            <hr />
        
        	<? echo "<div>";
        	echo uihelperSelect('county_id', $arrayCounties);
        	echo "</div>";?>
            <button class="btn-custom btn-info" id="btnCounty">Filter By County</button>
            <hr />
            
            <? echo "<div>";
        	echo uihelperSelect('range_id', $arrayPriceRange);
        	echo "</div>";?>
            <button class="btn-custom btn-info" id="btnRange">Filter By Price Range</button>
            <hr />
        
            <? echo "<div>";
        	echo uihelperSelect('sale_id', $arraySalesStatus);
        	echo "</div>";?>
            <button class="btn-custom btn-info" id="btnStatus">Filter By Sale Status</button>
           	<hr />
			<br />
			<br />
        	
            <button class="btn-custom btn-info" id="btnLoadAll">Select All</button>
            
        </div><!--END span4--> 
    
        <div class="span5">

            <div id="ajaxContent1" class="ajaxContent">
				
<?php
                //echo mysql_num_rows($propertyList);
                if ($propertyList) {
                    $htmlString = "";

                    while ($property = mysql_fetch_assoc($propertyList)) {

                        $htmlString .= "<p>";
                        $htmlString .= "<img src='uploads/{$property["imagefile"]}'  class='picture'>";
                        $htmlString .= "</p>";
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Address: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["addressLine1"];
                        $htmlString .= " ";
                        $htmlString .= $property["addressLine2"];
                        $htmlString .= " ";
                        $htmlString .= $property["addressLine3"];
                        $htmlString .= " ";
                        $htmlString .= $property["county"];
                        $htmlString .= ".";
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Price: &euro; ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["price"];
                        $htmlString .= "</p>";
                        
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Type: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["propertyType"];
                        $htmlString .= "</p>";
                        
                        $htmlString .= "<p>";
                        $htmlString .= "<strong>";
                        $htmlString .= "Status: ";
                        $htmlString .= "</strong>";
                        $htmlString .= $property["saleStatus"];
                        $htmlString .= "</p>";
                        
                        $htmlString .= "<hr />";
                    }

                    echo $htmlString;
                } else {

                    die("Failure: " . mysql_error($link_id));
                }
                ?>

                </div> <!-- END ajaxContent1 div --> 

        </div><!--END span5--> 
   
   </div><!-- END row --> 

</div> <!-- END container --> 
                

				
                


<?php include (TEMPLATE_PATH . "/public/footer.html"); 


?>