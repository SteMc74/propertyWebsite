<?php
session_start();
/*
 * Set up constant to ensure include files cannot be called on their own
*/
define ( "MY_APP", 1 );
/*
 * Set up a constant to your main application path
 */
define ( "APPLICATION_PATH", "application" );
define ( "TEMPLATE_PATH", APPLICATION_PATH . "/view" );

/* Prevent unauthorised access */
include_once(APPLICATION_PATH . "/inc/session.inc.php");

/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/queries.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");

$property = array();
$property['addressLine1'] = "";
$property['addressLine2'] = "";
$property['addressLine3'] = "";
$property['county_id'] =0;
$property['type_id'] =0;
$property['price'] =0;
$property['range_id'] =0;
$property['sale_id'] =0;


$property['property_id']=0;




if (!empty($_POST)) {
	
	
	$property = array();
        $property['addressLine1'] = htmlspecialchars(strip_tags($_POST["addressLine1"]));
        $property['addressLine2'] = htmlspecialchars(strip_tags($_POST["addressLine2"]));
        $property['addressLine3'] = htmlspecialchars(strip_tags($_POST["addressLine3"]));
	$property['county_id'] = (int) htmlspecialchars(strip_tags($_POST["county_id"]));
	$property['type_id'] = (int) htmlspecialchars(strip_tags($_POST["type_id"]));
	$property['price'] = (float) htmlspecialchars(strip_tags($_POST["price"]));
        $property['range_id'] = (int) htmlspecialchars(strip_tags($_POST["range_id"]));
	$property['sale_id'] = (int) htmlspecialchars(strip_tags($_POST["sale_id"]));
        
        
        
        $property['property_id'] = isset($_POST["property_id"]) ? (int) $_POST["property_id"] : 0;
        
	$flashMessage = "";
	if (validateProperty($property)) {
		if ($property['property_id'] == 0) {
         //New! Save Movie returns the id of the record inserted  
                
                //call the saveProperty function located in the functions.inc
		$property_id = saveProperty($property);
                
                //call the uploadFiles function in the functions.inc
		uploadFiles($property_id);
		
		
		$flashMessage = "Record has been saved";
                } else {
                    
                   $property_id = updateProperty($property);
                     $property_id = $_POST["property_id"];
                    uploadFiles($property_id);
		
                        header("Location: admin.php");
                }
		
		
	}
	
	

	
	
	}//end post
	

?>
<?php 
$activeInsert = "active";
$buttonLabel = "Insert New Property";
include (TEMPLATE_PATH . "/header.html");
include (TEMPLATE_PATH . "/form_insert.html");
include (TEMPLATE_PATH . "/footer.html");
?>