<?php
include('header.php');
include('dbconfig.php');
title("Books");
?>
<div class="span12">

<?php  
	switch ($_POST['searchbooks']) {
		case 'sbidbt':
			$bid = $_POST['sbid']; ?>
			<div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3>
          Book List 
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Book Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Book ID</center></th>
            <th><center>Book Name</center></th>
            <th><center>Auther</center></th>
            <th><center>Availibility</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $add="SELECT * FROM cp_books WHERE book_id='$bid'";
          $result = $connection->query($add);
          while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['book_id']."</center></td>
            <td><center> ".$std['book_name']."</center></td>  
            <td><center> ".$std['auther']."</center></td>";
            if ($std['status']) {
              	# code...
              	echo "<td><center> "."Available"."</center></td><td><center>
            <b> ";
              } 
              else{
              	echo "<td><center> "."Not Available"."</center></td><td><center>
            <b> ";
              } 
               
            ?>
            <?php 
              echo "</a></center></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
<?php
			break;
			case 'sbbnbt':
			$bnm = $_POST['sbbn']; ?>
			<div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3>
          Book List 
      
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Book Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Book ID</center></th>
            <th><center>Book Name</center></th>
            <th><center>Auther</center></th>
            <th><center>Availibility</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $add="SELECT * FROM cp_books WHERE book_name='$bnm'";
          $result = $connection->query($add);
          while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['book_id']."</center></td>
            <td><center> ".$std['book_name']."</center></td>  
            <td><center> ".$std['auther']."</center></td>";  
            if ($std['status']) {
              	# code...
              	echo "<td><center> "."Available"."</center></td><td><center>
            <b> ";
              } 
              else{
              	echo "<td><center> "."Not Available"."</center></td><td><center>
            <b> ";
              } 
               
            ?>
            <?php 
              echo "</a></center></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
		<?php  
		break;
		case 'sbabt':
			$ba = $_POST['sba']; ?>
			<div class="widget">
    <div class="widget-header"> <i class='icon-list'></i> 
      <h3>
     Book List 
    </h3>
  </div>
  <!-- /widget-header -->
  <div class="widget-content">
    <div class="container">
      <h2>Book Data</h2> 

      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Book ID</center></th>
            <th><center>Book Name</center></th>
            <th><center>Auther</center></th>
            <th><center>Availibility</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $add="SELECT * FROM cp_books WHERE auther='$ba'";
          $result = $connection->query($add);
          while($std=mysqli_fetch_assoc($result))
          {
            echo "<tr>
            <td><center> ".$std['book_id']."</center></td>
            <td><center> ".$std['book_name']."</center></td>  
            <td><center> ".$std['auther']."</center></td>";  
            if ($std['status']) {
              	# code...
              	echo "<td><center> "."Available"."</center></td><td><center>
            <b> ";
              } 
              else{
              	echo "<td><center> "."Not Available"."</center></td><td><center>
            <b> ";
              } 
               
            ?>
            <?php 
              echo "</a></center></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /widget-content --> 
  </div>
			<?php
			break;  
		default:
			# code...
			break;
	}
?>
<?php
include('footer.php');
?></div>