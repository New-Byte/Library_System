<?php
// Load the database configuration file
include_once 'dbconfig.php';

if(isset($_POST['importSubmit'])){
    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $prn   = $line[0];
                $Name  = $line[1];
                $Email  = $line[2];
                $mobile = $line[3];
                $branch = $line[4];
                $admi_year = $line[5];
                $Gender = $line[6];
                $Address = $line[7];
                
                // Check whether student already exists in the database
                $prevQuery = "SELECT prn FROM student WHERE prn = '".$line[0]."'";
                $prevResult = $connection->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    $connection->query("UPDATE student SET prn = '".$prn."', Name = '".$Name."', Email = '".$Email."', mobile = '".$mobile."', branch = '".$branch."', admi_year = '".$admi_year."', Gender = '".$Gender."', Address = '".$Address."' WHERE prn = '".$prn."'");
                }else{
                    // Insert member data in the database
                    $db->query("INSERT INTO student VALUES ('".$prn."', '".$Name."', '".$Email."', '".$mobile."', '".$branch."', '".$admi_year."', '".$Gender."', '".$Address."'");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            echo "Success";
        }else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}