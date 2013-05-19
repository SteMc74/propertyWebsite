<?php

/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
define ( "APPLICATION_PATH", "../application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );




/*
 * Include the config.inc.php file
*/
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");





//Very simple security check to set jsonOutput to a default 'Not authorised' if action request is not recognised
$jsonOutput = json_encode("Not Authorised");

       

                
  
//Verify later, but check which api method is being called
$action = $_REQUEST['action'];

//Use switch statement to execute the appropriate command

switch ($action) {
    
    
    case 'api_get_all_property_by_type':
        
        //var_dump($action);
        $type = (int) $_REQUEST['type_id'];
        $records = property_get_by_type($type);
        
        //Encode as json
        $jsonOutput = json_encode($records);
        
        break;
		
		case 'api_get_all_property_by_county':
			//Make the query
			$county = (int) $_REQUEST['county_id'];
			$records = property_get_by_county($county);
			//Encode as json
		
			$jsonOutput =  json_encode($records);
		
		
			break;
	
	case 'api_get_all_property_by_range':
			//Make the query
			$range = (int) $_REQUEST['range_id'];
			$records = property_get_by_range($range);
			//Encode as json
		
			$jsonOutput =  json_encode($records);
		
		
			break;
	
	case 'api_get_all_property_by_sale_status':
            
            $saleStatus = (int) $_REQUEST['sale_id'];
            
            $records = property_get_by_sale_status($saleStatus);
			//Encode as json
		
			$jsonOutput =  json_encode($records);
            
            break;
        
        case 'api_get_all_property':
            
        $type = (int) $_REQUEST['type_id'];    
        $county = (int) $_REQUEST['county_id'];
        $range = (int) $_REQUEST['range_id'];
        $saleStatus = (int) $_REQUEST['sale_id'];
        
        $records = property_get_all($type, $county, $range, $saleStatus);
            
	$jsonOutput =  json_encode($records);
}


header('Content-Type: application/json');

/* Output the JSON data */

echo $jsonOutput;


?>