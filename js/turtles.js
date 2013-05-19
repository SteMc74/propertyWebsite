  //This means 'call all content within the braces after the document is loaded  
            $(function(){    
              
                getAllSelections();
                //All your jquery goodness goes in here  
            	getThePropertyType();              
                getTheCounty();
                getThePriceRange();
                getTheSaleStatus();
                tableSorter();
                
            }); // all content will go inside the two {}  
        
        
        //Set up the table sorter to be initiated on load
        //Couldn't get the table sorter to work
        //Left in as I might come back to it at a later date.
        function tableSorter (){
            
        $(document).ready(function() { 
        
        $("#myTable").tablesorter(); 
    } 
); 
    }
     
     
//////////***************************** START FUNCTION TO SELECT ALL PROPERTIES BY TYPE *******************************/////////////////////////

function getThePropertyType(){
    
    //ON CLICK DO THE FOLLOWING
    $('#btnType').click(function (){
        
        //SET THE USERS SELECTION TO A VARIABLE
        var type_id = $('#type_id').val();
                
        //CONSTRUCT THE URL FROM THE SELECT BOX "FILTER BY PROPERTY TYPE"
        var  url = "api/index.php?action=api_get_all_property_by_type&type_id=" + type_id;
        
        //******
        //NOTES: URL PASSED TO THE INDEX FILE, THE SWITCH STATEMENT THERE VERIFIES WHICH API HAS BEEN CALLED 
        //THE CASE: CONVERTS THE VARIABLE FROM A STRING TO AN INT SO WE CAN RUN OUR SQL QUERY ON IT
        //TYPE_ID THEN PASSED AS PARAMETER IN FUNCTION property_get_by_type($type); TO THE QUERIES.INC.PHP FILE
        //SQL STATEMENT IS RUN THEN THE OUTPUT IS POPPED INTO AN ARRAY AND RETURNED BACK TO THE SWITCH IN THE INDEX.PHP FILE
        //JSON ENCODE IS THEN USED TO CONVERT THE ARRAY TO JSON AND THEN OUTPUTTED SO OUR CALLBACK METHOD BELOW CAN THEN GET TO WORK
        
        console.log("Property Type button has been clicked");
               
               
        $(".ajaxContent").empty();  //EMPTY THE DIV
        var items = ""; //CREATE AN EMPTY VARIABLE TO STORE THE JSON DATA WE GET BACK FROM THE PHP/SQL
        var errorAlert ="Your search was not successful. Please try a different selection."//NOTIFY THE USER IF NO OUTPUT  
     
        //CALLBACK FUNCTION
        $.getJSON(url, function(json){
            console.log("getting the JSON");
            //ITERATE THROUGH THE JSON AND ADD TO ITEMS VARIABLE
            $.each(json, function(i,jsonItem){ 
              //console.log("got the JSON");
						items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='picture'></p>";   
						items += "<p><strong>Address: </strong>" + jsonItem['addressLine1'] + ", " + jsonItem['addressLine2'] + ", " + jsonItem['addressLine3'] + ", " + jsonItem['county'] + "</p>";
						items += "<p><strong>Price: </strong>" + jsonItem['price'] +  "</p>";  
						items += "<p><strong>Type: </strong>" +  jsonItem['propertyType'] +  "</p>"; 
						items += "<p><strong>Status: </strong>" +  jsonItem['saleStatus'] +  "</p>"; 
						items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorAlert);
            }
          
        }); //End json
        
       
               
    }); //End click

}            

function getTheCounty(){
    
    $('#btnCounty').click(function (){
        
        var county_id = $('#county_id').val();
        
        
                
        //building a url taking in the values from the dropdown boxes
        var  url = "api/index.php?action=api_get_all_property_by_county&county_id=" + county_id;
        console.log("County button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorAlert = "Your search was not successful. Please try a different selection."  
     
     
        $.getJSON(url, function(json){
            //console.log("getting the JSON");
            
            $.each(json, function(i,jsonItem){ 
              //console.log("got the JSON");
						items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='picture'></p>";   
						items += "<p><strong>Address: </strong>" + jsonItem['addressLine1'] + ", " + jsonItem['addressLine2'] + ", " + jsonItem['addressLine3'] + ", " + jsonItem['county'] + "</p>";
						items += "<p><strong>Price: </strong>" + jsonItem['price'] +  "</p>";  
						items += "<p><strong>Type: </strong>" +  jsonItem['propertyType'] +  "</p>"; 
						items += "<p><strong>Status: </strong>" +  jsonItem['saleStatus'] +  "</p>"; 
						items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorAlert);
            }
          
        }); //End Json
        
       
               
    }); //End click

}    


function getThePriceRange(){
    
    $('#btnRange').click(function (){
        
        var range_id = $('#range_id').val();
        
        
                
        //building a url taking in the values from the dropdown boxes
        var  url = "api/index.php?action=api_get_all_property_by_range&range_id=" + range_id;
        console.log("Range button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorAlert = "Your search was not successful. Please try a different selection."  
     
     
        $.getJSON(url, function(json){
            console.log("getting the JSON");
            
            $.each(json, function(i,jsonItem){ 
              //console.log("got the JSON");
						items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='picture'></p>";   
						items += "<p><strong>Address: </strong>" + jsonItem['addressLine1'] + ", " + jsonItem['addressLine2'] + ", " + jsonItem['addressLine3'] + ", " + jsonItem['county'] + "</p>";
						items += "<p><strong>Price: </strong>" + jsonItem['price'] +  "</p>";  
						items += "<p><strong>Type: </strong>" +  jsonItem['propertyType'] +  "</p>"; 
						items += "<p><strong>Status: </strong>" +  jsonItem['saleStatus'] +  "</p>"; 
						items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorAlert);
            }
          
        }); //End json
        
        
               
    }); //End click

}    


function getTheSaleStatus(){
    
    $('#btnStatus').click(function (){
        
        var sale_id = $('#sale_id').val();
        
        
                
        //building a url taking in the values from the dropdown boxes
        var  url = "api/index.php?action=api_get_all_property_by_sale_status&sale_id=" + sale_id;
        console.log("Range button has been clicked");
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorAlert = "Your search was not successful. Please try a different selection." 
     
     
        $.getJSON(url, function(json){
            //console.log("getting the JSON");
            
            $.each(json, function(i,jsonItem){ 
              //console.log("got the JSON");
						items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='picture'></p>";   
						items += "<p><strong>Address: </strong>" + jsonItem['addressLine1'] + ", " + jsonItem['addressLine2'] + ", " + jsonItem['addressLine3'] + ", " + jsonItem['county'] + "</p>";
						items += "<p><strong>Price: </strong>" + jsonItem['price'] +  "</p>";  
						items += "<p><strong>Type: </strong>" +  jsonItem['propertyType'] +  "</p>"; 
						items += "<p><strong>Status: </strong>" +  jsonItem['saleStatus'] +  "</p>"; 
						items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorAlert);
            }
          
        }); //End of getJSON
        
        
               
    });// End click function 

}    






function getAllSelections(){
	
        
	$('#btnLoadAll').click(function(){
        
        //console.log("get all button has been clicked");
        //get the input values and store them in a variable
        var type_id = $('#type_id').val();
        var county_id = $('#county_id').val();
        var sale_id = $('#sale_id').val();
        var range_id = $('#range_id').val();
        
        
                
        //building a url taking in the values from the select boxes
        var  url = "api/index.php?action=api_get_all_property&type_id=" + type_id + "&county_id=" + county_id + "&sale_id=" + sale_id + "&range_id=" + range_id;
        
               

        $(".ajaxContent").empty();  
        var items = "";
        var errorAlert = "Your search was not successful. Please try a different selection." 
     
     
        $.getJSON(url, function(json){
            //console.log("getting the JSON");
            
            $.each(json, function(i,jsonItem){ 
              //console.log("got the JSON");
						items += "<p><img src='uploads/"+ jsonItem['imagefile'] +"' class='picture'></p>";   
						items += "<p><strong>Address: </strong>" + jsonItem['addressLine1'] + ", " + jsonItem['addressLine2'] + ", " + jsonItem['addressLine3'] + ", " + jsonItem['county'] + "</p>";
						items += "<p><strong>Price: </strong>" + jsonItem['price'] +  "</p>";  
						items += "<p><strong>Type: </strong>" +  jsonItem['propertyType'] +  "</p>"; 
						items += "<p><strong>Status: </strong>" +  jsonItem['saleStatus'] +  "</p>"; 
						items += "<hr />"
                
            });
                    
            $('#ajaxContent1').append(items);
            
            if (items == ""){
                $('#ajaxContent1').append(errorAlert);
            }
          
        }); // end  getJSON 
        
        
               
    }); //End click function

}
            
 