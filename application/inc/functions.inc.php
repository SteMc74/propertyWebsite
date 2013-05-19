<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');


function validateProperty($property) {
	
	
	return true;
	
	
}

//list all the properties on the homepage (index.php) by order lowest to highest
function list_all_properties() {
    $sqlQuery ="SELECT * FROM propertytable, counties, propertytype, salestatus 
    WHERE propertytable.type_id=propertytype.type_id AND propertytable.type_id=propertytype.type_id 
    AND propertytable.county_id=counties.county_id AND propertytable.sale_id=salestatus.sale_id 
    ORDER BY propertytable.price ASC";
  
    //$sqlQuery = "SELECT * FROM property, type, county WHERE property._type_id = type.type_id AND property._county_id = county.county_id AND property._status_id = 1";       

//type, county WHERE property._type_id = type.type_id AND property._county_id = county.county_id AND property._status_id = 1";

    $result = mysql_query($sqlQuery);
    //var_dump($records); die();
	 return $result;
}


function saveProperty($property) {
//	
	$sqlQuery = "INSERT INTO propertytable (county_id, type_id, price, range_id, sale_id, addressLine1, addressLine2, addressLine3)
	VALUES ('{$property['county_id']}', '{$property['type_id']}','{$property['price']}', '{$property['range_id']}', '{$property['sale_id']}','{$property['addressLine1']}','{$property['addressLine2']}','{$property['addressLine3']}')";
	
//        
    
    //$sqlQuery = "INSERT INTO propertytable (addressLine1) values ('{$property['addressLine1']}')";
        $result = mysql_query($sqlQuery);

	
	if (!$result) {
		echo $sqlQuery;
		
		die("error" . mysql_error());
	} 
	
	
	return mysql_insert_id();
	
}


function updateProperty($property) {
    
    $propertyID = (int) $property['property_id'];
    
     $sqlQuery = "UPDATE propertytable SET ";
     
     $sqlQuery .= " county_id = '" . $property['county_id'] . "',";
     $sqlQuery .= " type_id = '". $property['type_id'] . "',";
     $sqlQuery .= " price = '". $property['price'] . "',";
     $sqlQuery .= " range_id = '". $property['range_id'] . "',";
     $sqlQuery .= " sale_id = '". $property['sale_id'] . "', ";
     $sqlQuery .= " addressLine1 = '". $property['addressLine1'] . "', ";
     $sqlQuery .= " addressLine2 = '". $property['addressLine2'] . "', ";
     $sqlQuery .= " addressLine3 = '". $property['addressLine3'] . "',";
     $sqlQuery .= " imagefile = '". $property['imagefile'] . "'";//Added this line
     
    
    $sqlQuery .= " WHERE property_id = $propertyID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}

/* 
 * Realistically, you would pass function $_FILES array, but here we are assuming it's available
 * UPLOAD_PATH is defined in config.inc.php
 */
function uploadFiles($property_id) {
	//echo UPLOAD_PATH;
	//echo $_FILES['uploadedfile']['tmp_name'];
    
    
    $target_path = UPLOAD_PATH . basename( $_FILES['uploadedfile']['name']);
    
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'],$target_path)) {
		
		saveImageRecord($property_id, basename( $_FILES['uploadedfile']['name']));
		
	
	} else{
		echo "<p>There was an error uploading the file, please try again!";
	}
	
	
}


function saveImageRecord($property_id, $imageName) {
	
	
	$sqlQuery = "UPDATE propertytable SET imagefile = '$imageName' where property_id = $property_id"; 
	$result = mysql_query($sqlQuery);
	
		
	
	
}

/*
 * Typical things that go wrong with next script
 * You must update the insert.php file to capture any new fields
 * You must ensure there are commas on any new lines you create
 * To resolve issues, uncomment the lines which echo the $sqlQuery  and die();
 */




function deleteProperty($id) {
    $propertyID = (int) $id;
    $sqlQuery = "DELETE FROM propertytable where property_id = $propertyID";
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}


function retrieveProperty($id) {

	$sqlQuery = "SELECT * from propertytable WHERE property_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	
	//echo $sqlQuery;


	return mysql_fetch_assoc($result);
	
}




function output_edit_link($id) {
	
	return "<a href='edit.php?id=$id'>Edit</a>";
	
	
}
function output_delete_link($id) {

	return "<a href='delete.php?id=$id'>Delete</a>";


}

function output_selected($currentValue, $valueToMatch) {
	
	
	if ($currentValue == $valueToMatch) {
		
		return "selected ='selected'";
		
	}
	
}

function authenticate($username, $password) {   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * from adminusers WHERE ";
    $sqlQuery .= "username = '" . $username . "'";
    $sqlQuery .= " AND ";
    $sqlQuery .= "password = '" .$password . "'";
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)  die("Error: " . $sqlQuery . mysql_error());
    
    if (mysql_num_rows($result)==1) {
        $boolAuthenticated = true;
    }
    
    return $boolAuthenticated;
}

//These functions are called in form_insert.html - Enables the select boxes to be populated with the 
//data from each table
function list_counties()
{
	$sql = "SELECT * FROM counties ORDER BY county ASC";
	
	$result = mysql_query($sql);
	return $result; 
}

function list_property_types()
{
	$sql = "SELECT * FROM propertyType";
	
	$result = mysql_query($sql);
	return $result; 
}

function list_salestatus()
{
	$sql = "SELECT * FROM salestatus";
	
	$result = mysql_query($sql);
	return $result; 
}

function list_priceRange()
{
	$sql = "SELECT * FROM pricerange";
	
	$result = mysql_query($sql);
	return $result; 
}