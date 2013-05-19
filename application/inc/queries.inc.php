<?php


function property_get_by_type($type) {
    
 //start small and build up the sql query   
 //$sqlQuery = "SELECT * FROM propertytable WHERE type_id=$type";
    
//      $sqlQuery = " SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3 
//       counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable, counties, 
//       propertytype, salestatus";
        
    $sqlQuery = " SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3, 
    counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable
    JOIN propertytype ON propertytype.type_id = propertytable.type_id 
    AND propertytable.type_id = $type 
    JOIN counties ON counties.county_id = propertytable.county_id 
    JOIN pricerange ON pricerange.range_id = propertytable.range_id 
    JOIN salestatus on salestatus.sale_id = propertytable.sale_id"; 
    
    
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); // pop the null record which was pushed on as last item
    }

    return $records;
    
    
}

function property_get_by_county($county) {
    
    //$sqlQuery = "SELECT * FROM propertytable WHERE county_id=$county";
    
    $sqlQuery = " SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3, 
    counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable
    JOIN propertytype ON propertytype.type_id = propertytable.type_id 
    JOIN counties ON counties.county_id = propertytable.county_id 
    AND propertytable.county_id = $county 
    JOIN pricerange ON pricerange.range_id = propertytable.range_id 
    JOIN salestatus on salestatus.sale_id = propertytable.sale_id"; 
    
    
    
    
    
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); // pop the null record which was pushed on as last item
    }

    return $records;
    
    
}


function property_get_by_range($range) {
    
    //$sqlQuery = "SELECT * FROM propertytable WHERE county_id=$county";
    
    $sqlQuery = " SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3, 
    counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable
    JOIN propertytype ON propertytype.type_id = propertytable.type_id 
    JOIN counties ON counties.county_id = propertytable.county_id 
    JOIN pricerange ON pricerange.range_id = propertytable.range_id     
    AND propertytable.range_id = $range 
    JOIN salestatus on salestatus.sale_id = propertytable.sale_id"; 
    
    
    
    
    
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); // pop the null record which was pushed on as last item
    }

    return $records;
    
    
}


function property_get_by_sale_status($saleStatus){
    
    $sqlQuery = " SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3, 
    counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable
    JOIN propertytype ON propertytype.type_id = propertytable.type_id 
    JOIN counties ON counties.county_id = propertytable.county_id 
    JOIN pricerange ON pricerange.range_id = propertytable.range_id     
    JOIN salestatus on salestatus.sale_id = propertytable.sale_id     
    AND propertytable.sale_id = $saleStatus";
    
    
    
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); // pop the null record which was pushed on as last item
    }

    return $records;
    
    
    
}


function property_get_all($type, $county, $range, $saleStatus){
    
    
    
    $sqlQuery = "SELECT propertytable.imagefile, propertytable.addressLine1, propertytable.addressLine2, propertytable.addressLine3, 
    counties.county, propertytable.price, propertytype.propertyType, salestatus.saleStatus FROM propertytable
    JOIN propertytype ON propertytype.type_id = propertytable.type_id 
    JOIN counties ON counties.county_id = propertytable.county_id 
    JOIN pricerange ON pricerange.range_id = propertytable.range_id     
    JOIN salestatus ON salestatus.sale_id = propertytable.sale_id 
    WHERE propertytable.type_id = $type 
    AND propertytable.county_id = $county 
    AND propertytable.range_id = $range 
    AND propertytable.sale_id = $saleStatus";    
       
    $result = mysql_query($sqlQuery);
    $records = array();

    if ($result) {
        while ($records [] = mysql_fetch_assoc($result));

        array_pop($records); // pop the null record which was pushed on as last item
    }

    return $records;
    
    
    
    
    
}

/*
 * Gets a complete list of properties Returns: Associative Array
 */
//function property_listing_get() {
//	
//	//$sqlQuery = "SELECT * FROM propertytable, propertytype WHERE propertytable.type_id=propertytype.type_id";
//	$sqlQuery = "SELECT * FROM propertytable JOIN propertytype on propertytable.type_id=propertytype.type_id";
//	$result = mysql_query ( $sqlQuery );
//	$records = array ();
//	
//	while ( $records [] = mysql_fetch_assoc ( $result ) )
//		;
//	
//	array_pop ( $records ); // pop the null record which was pushed on as last item
//	
//	return $records;
//
//}

/*
 * Gets a complete list of movies Returns: Associative Array
 * 
 * 
 */


//This function populates an array. That array is looped in form_insert.html
//to list the possible counties in the select box
function counties_get_all() {
	
	$sqlQuery = "SELECT * FROM counties WHERE 1 ORDER by county ASC";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	if ($result) {
		while ( $records [] = mysql_fetch_assoc ( $result ) );
		
		
		
		array_pop ( $records ); // pop the null record which was pushed on as last
		                     // item
	}
	return $records;

}

//As above function creates an array of items from the salestatus table in the DB
//It's called in form_insert.html where the array is looped to populate the select box
function status_get_all() {
	
	$sqlQuery = "SELECT * FROM salestatus WHERE 1 ORDER by sale_id ASC";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	if ($result) {
		while ( $records [] = mysql_fetch_assoc ( $result ) );
		
		
		
		array_pop ( $records ); // pop the null record which was pushed on as last
		                     // item
	}
	return $records;

}


function property_type_get_all(){
    
    $sqlQuery = "SELECT * FROM propertytype WHERE 1 ORDER by type_id ASC";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	if ($result) {
		while ( $records [] = mysql_fetch_assoc ( $result ) );
		
		
		
		array_pop ( $records ); // pop the null record which was pushed on as last
		                     // item
	}
	return $records;
    
}


//get the range from the DB for the select box
function range_get_all() {
	
	$sqlQuery = "SELECT * FROM pricerange WHERE 1 ORDER by range_id ASC";
	$result = mysql_query ( $sqlQuery );
	$records = array ();
	
	if ($result) {
		while ( $records [] = mysql_fetch_assoc ( $result ) );
		
		
		
		array_pop ( $records ); // pop the null record which was pushed on as last
		                     // item
	}
	return $records;

}
