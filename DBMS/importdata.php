<?php
// Load the database configuration file
include('security.php');include('fun.php');

if(isset($_POST['importSubmit'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');            
            // Skip the first line
            fgetcsv($csvFile);
            $c=$ui=$f=0;
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                $c=$c+1;
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
                $prevResult = select("prn","student","WHERE prn = '$prn'");                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    if($connection->query("UPDATE student SET prn = '$prn', Name = '$Name', Email = '$Email', mobile = '$mobile', branch = '$branch', admi_year = '$admi_year', Gender = '$Gender', Address = '$Address' WHERE prn = '$prn'")){$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }else{
                    // Insert member data in the database
                    if($connection->query("INSERT INTO student(prn,Name,Email,mobile,branch,admi_year,Gender,Address) VALUES ('$prn', '$Name','$Email','$mobile','$branch', '$admi_year','$Gender','$Address')"))
                        {$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            if(($c-$ui)==0)
            {
                //echo "success";
                poutput("Student Data Imported Successfully","student.php?page=Dashboard");
            }
            elseif (($c-$ui)>0 || $f>0) {
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") Students Data Might Not Inserted","student.php?page=Dashboard");
            }
            else{
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") Students Data Might Not Inserted","student.php?page=Dashboard");
            }            
        }
        else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}
elseif(isset($_POST['importSubmitMZ'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');            
            // Skip the first line
            fgetcsv($csvFile);
            $c=$i=$f=0;
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE)
            {
                $c=$c+1;
                // Get row data
                $name   = trim($line[0]);
                $author  = trim($line[1]);
                $result=select("*","magazine","WHERE name LIKE '%$name%' ");
                $row=mysqli_num_rows($result);
                $resultt=select("id","magazine","WHERE name LIKE '%$name%' LIMIT 1");
                $std=mysqli_fetch_assoc($resultt);
                if($row!=0){
                    $copyid=$std['id']."-".($row+1);
                }
                else
                {
                    $result=select("id","magazine","");
                    while($std=mysqli_fetch_assoc($result))
                    {
                        $copyid=($std['id']+1)."-1";
                    }
                }
                $add1="INSERT INTO magazine(name,author,copyid) VALUES ('$name','$author','$copyid')";
                if ($connection->query($add1)) 
                {$i=$i+1;}
                else
                {$f=$f+1;}
            }
            // Close opened CSV file
            fclose($csvFile);
            if(($c-$i)==0)
            {
                //echo "success";
                poutput("Magzine Data Imported Successfully","magazine.php?page=Dashboard");
            }
            elseif (($c-$i)>0 || $f>0) {
                //echo "fail";
                noutput("Some (".$f."-".($c-$i).") Magzine Data Might Not Inserted","magazine.php?page=Dashboard");
            }
            else{
                //echo "fail";
                noutput("Some (".$f."-".($c-$i).") Magzine Data Might Not Inserted","magazine.php?page=Dashboard");
            }            
        }
        else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}
else if (isset($_POST['importbk'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');            
            // Skip the first line
            fgetcsv($csvFile);
            $c=$ui=$f=0;
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                $c=$c+1;
                // Get row data
                $bk_id   = $line[0];
                $book_name  = $line[1];
                $auther  = $line[2];
                $toatal_cp = $line[3];
                $cp_left = $line[4];

                // Check whether book already exists in the database
                $prevResult = select("bk_id","books","WHERE bk_id = '$bk_id'");                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    if($connection->query("UPDATE books SET bk_id = '$bk_id', book_name = '$book_name', auther = '$auther', toatal_cp = '$toatal_cp', cp_left = '$cp_left' WHERE bk_id = '$bk_id'")){$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }else{
                    // Insert member data in the database
                    if($connection->query("INSERT INTO books(bk_id,book_name,auther,toatal_cp,cp_left) VALUES ('$bk_id', '$book_name','$auther','$toatal_cp','$cp_left')"))
                        {$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            if(($c-$ui)==0)
            {
                //echo "success";
                poutput("Book Data Imported Successfully","books.php?page=Dashboard");
            }
            elseif (($c-$ui)>0 || $f>0) {
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") books Data Might Not Inserted","books.php?page=Dashboard");
            }
            else{
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") books Data Might Not Inserted","books.php?page=Dashboard");
            }            
        }
        else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}

else if (isset($_POST['importcp'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');            
            // Skip the first line
            fgetcsv($csvFile);
            $c=$ui=$f=0;
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                $c=$c+1;
                // Get row data
                $bk_id   = $line[0];
                $book_id = $line[1];
                $book_name  = $line[2];
                $auther  = $line[3];
                $status = $line[4];
                

                // Check whether book already exists in the database
                $prevResult = select("book_id","cp_books","WHERE book_id = '$book_id'");                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    if($connection->query("UPDATE cp_books SET bk_id = '$bk_id', book_id = '$book_id',book_name = '$book_name', auther = '$auther', status = '$status' WHERE book_id = '$book_id'")){$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }else{
                    // Insert member data in the database
                    if($connection->query("INSERT INTO cp_books(bk_id,book_id,book_name,auther,status) VALUES ('$bk_id', '$book_id', '$book_name','$auther','$status')"))
                        {$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            if(($c-$ui)==0)
            {
                //echo "success";
                poutput("Book Data Imported Successfully","books.php?page=Dashboard");
            }
            elseif (($c-$ui)>0 || $f>0) {
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") books Data Might Not Inserted","books.php?page=Dashboard");
            }
            else{
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") books Data Might Not Inserted","books.php?page=Dashboard");
            }            
        }
        else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}
elseif(isset($_POST['importStaff'])){
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name']))
        {            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');            
            // Skip the first line
            fgetcsv($csvFile);
            $c=$ui=$f=0;
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                $c=$c+1;
                // Get row data
                $Name  = $line[0];
                $Email  = $line[1];
                $pass = $line[2];
                $branch = $line[3];
                $date = $line[4];
                $mobile = $line[5];
                // Check whether student already exists in the database
                $prevResult = select("Email","staff","WHERE Email = '$Email'");                
                if($prevResult->num_rows > 0){
                    // Update student data in the database
                    if($connection->query("UPDATE staff SET Name = '$Name', Email = '$Email', pass = '$pass', branch = '$branch', Date = '$date',mobile = '$mobile' WHERE Email = '$Email'")){$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }else{
                    // Insert member data in the database
                    if($connection->query("INSERT INTO staff(Name,Email,password,branch,Date,mobile) VALUES ($Name','$Email','$pass','$branch', '$date',mobile = '$mobile')"))
                        {$ui=$ui+1;}
                    else
                        {$f=$f+1;}
                }
            }
            // Close opened CSV file
            fclose($csvFile);
            if(($c-$ui)==0)
            {
                //echo "success";
                poutput("Staff Data Imported Successfully","staff.php?page=Dashboard");
            }
            elseif (($c-$ui)>0 || $f>0) {
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") staff Data Might Not Inserted","staff.php?page=Dashboard");
            }
            else{
                //echo "fail";
                noutput("Some (".$f."-".($c-$ui).") staff Data Might Not Inserted","staff.php?page=Dashboard");
            }            
        }
        else{
            echo "Error";
        }
    }else{
        echo "Invalid file";
    }
}