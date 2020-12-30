<?php 
  include('header.php'); 
  include('dbconfig.php');
?>
<?php  
    $branch = $_POST['branch10'];
    foreach ($_POST['branch10'] as $branch) {
        $statearray[] = $connection->real_escape_string($branch);
    }
    $states = implode ("','", $statearray);
    $sql = "SELECT * FROM staff WHERE branch IN ('$states')";

    //Now we search for our search term, in the field the user specified
    $result = $connection->query($sql) or die(mysql_error());

    //This counts the number or results - and if there wasn't any it gives them a     little     message explaining that
    if (!$result)
    {
        echo "Sorry, but we can not find an entry to match your query...<br><br>";
    }
    if($result){
?>
<div class="span12">
  <div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3>
          Staff List 
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Student Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Name</center></th>
            <th><center>Branch</center></th>
            <th><center>Email</center></th>
            <th><center>Mobile</center></th>
            <th><center>Date of Recrute</center></th>
          </tr>
        </thead>
        <tbody>
            <?php
        //And we display the results
        
        while($std=$result->fetch_assoc())
          {
            echo "<tr>
            <td><center> ".$std['Name']."</center></td> 
            <td><center> ".$std['branch']."</center></td>
            <td><center> ".$std['Email']."</center></td>
            <td><center> ".$std['mobile']."</center></td>
            <td><center> ".$std['Date']."</center></td>      
            <td><center>
            <b> ";?>
            <?php 
            if($std['Category']!="1"){echo "Administrator";}else{echo "Staff Member";}
            echo "</b>";
            ?>
          }
     </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
</div>
<?php } ?>
