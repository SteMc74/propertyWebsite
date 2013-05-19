

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

include_once(APPLICATION_PATH . "/inc/session.inc.php");


/*
 * Include the config.inc.php file
 */
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");
include (APPLICATION_PATH . "/inc/functions.inc.php");
include (APPLICATION_PATH . "/inc/ui_helpers.inc.php");//Added this line



//Set up variable so 'active' class set on navbar link

$activeHome ="active";



include (TEMPLATE_PATH . "/header.html");



?>

<div class="container">


<div class="row">


<div class="span12">


<h1>
Administration</h1>


<!-- <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p> -->

</div>


</div>


<div clas="row">


<div class="span9">




<?php



//$sqlQuery ="SELECT * FROM address";
//
//$sqlQuery2 ="SELECT * FROM propertyTable";
//
//$result = mysql_query($sqlQuery);
//
//
//$result2 = mysql_query($sqlQuery2);


//if ($result || $result2) {

$sqlQuery ="SELECT * FROM propertytable, counties, salestatus, pricerange WHERE propertytable.range_id=pricerange.range_id 
    AND propertytable.sale_id=salestatus.sale_id AND propertytable.county_id=counties.county_id";

$result = mysql_query($sqlQuery);

if ($result ){
    
$htmlString ="";

$htmlString .=  "<table id='myTable' class='tablesorter table-bordered table-striped' border='2'>\n";

$htmlString .= "<thead>";

$htmlString .= "<tr>";

$htmlString .= "<th>ID</th>";

$htmlString .= "<th>Address Line 1</th>";

$htmlString .= "<th>Address Line 2</th>";

$htmlString .= "<th>Address Line 3</th>";

$htmlString .= "<th>County</th>";

$htmlString .= "<th>Price</th>";

$htmlString .= "<th>Range</th>";

$htmlString .= "<th>Sale Status</th>";

$htmlString .= "<th>Date Created</th>";

$htmlString .= "<th>Image</th>";


$htmlString .= "<th colspan='2'>Actions</th>";



$htmlString .= "</tr>";



while ($property = mysql_fetch_assoc($result))

{

    $htmlString .=  "<tbody>" ;
$htmlString .=  "<tr>" ;

$htmlString .=  "<td>";

$htmlString .=  $property["property_id"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["addressLine1"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";


$htmlString .=  $property["addressLine2"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["addressLine3"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["county"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";


$htmlString .=  $property["price"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["priceRange"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["saleStatus"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  $property["dateCreated"];

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  ui_helper_image($property["imagefile"]);    

$htmlString .=  "</td>";

$htmlString .=  "<td>";

$htmlString .=  output_edit_link($property["property_id"]);

$htmlString .=  "</td>";



$htmlString .=  "<td>";

$htmlString .=  output_delete_link($property["property_id"]);

$htmlString .=  "</td>";



$htmlString .=  "</tr>\n";


}

$htmlString .=  "</table>\n";



echo $htmlString ;







} else {



die("Failure: " . mysql_error($link_id));

}

?>

</div>


<div class="span3"></div>




</div>






</div>
<!-- /container -->

<?php

include (TEMPLATE_PATH . "/footer.html");

?>