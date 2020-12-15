<?php  

if(isset($_REQUEST['search']))
{
    $branch = $_REQUEST['branch10'];
    foreach ($_REQUEST['branch10'] as $branch) {
        $statearray[] = mysql_real_escape_string($branch);
    }
    $states = implode ("','", $statearray);
    $sql = "SELECT * FROM student WHERE branch IN ('$states')";

    //Now we search for our search term, in the field the user specified
    $result = mysql_query($sql) or die(mysql_error());

    //This counts the number or results - and if there wasn't any it gives them a     little     message explaining that
    if (mysql_num_rows($result) == 0)
    {
        echo "Sorry, but we can not find an entry to match your query...<br><br>";
    }
    else
    { ?>
        <div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3><?php
      $result=select("*","student","WHERE 1");
      $row=mysqli_num_rows($result);
      if($row!=0){ ?>
        <form  action="filter.php" method="GET" >
          Student List 
          &emsp;<input class="span4 m-wrap" type="number" name="cnt" autocomplete="off" placeholder="Enter records number to show">
          <input type="hidden" name="page" value="Dashboard">
        </form>
       <?php } ?>
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Student Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>PRN</center></th>
            <th><center>Name</center></th>
            <th><center>Year</center></th>
            <th><center>Branch</center></th>
            <th><center>Status</center></th>
            <th><center>Mobile</center></th>
            <th><center>Gender</center></th>
            <th><center>Address</center></th>
          </tr>
        </thead>
        <tbody>
            <?php
        //And we display the results
        
        while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['prn']."</center></td>
            <td><center> ".$std['Name']."</center></td> 
            <td><center> ".(diff_date($std['admi_year'],date("Y-m-d H:i:s"),"Y")+1)."</center></td> 
            <td><center> ".$std['branch']."</center></td>       
            <td><center>
            <b> ";?>
            <?php
            if($std['status']!="1"){echo "Not Registered";}else{echo "Registered";}
            echo "</b>";
            if($std['status']!="1"){
              echo "<a href='reg.php?prn=".$std['prn']."' title='Register' name='register' class='btn btn-mini btn-success'><i class='btn-icon-only icon-ok' style='margin: 0px 0px 20px;'></i>";}

              echo "</a></center></td>
              <td><center> ".$std['mobile']."</center></td>
              <td><center> ".$std['Gender']."</center></td>
              <td><center> ".$std['Address']."</center></td>
              </tr>";
            }
            ?>
    <?php } ?> 
    
     </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
</div>
<?php } ?>