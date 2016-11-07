<!DOCTYPE html>
<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'dismanapp');
   define('DB_PASSWORD', 'xT5QdZsMLmbN7334');
   define('DB_DATABASE', 'dispatchmanager');
   $conn = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   $sql="SELECT packageID,deliveryAddress,itemStatus FROM package WHERE empUsername ='".$_SESSION['user']."'";
   #echo $_SESSION['user'];
   $result = $conn->query($sql);
  
?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Driver</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body> 
       <div class="container">
          <div class="row">
           
           <div class="col-md-12">
        
                       <h2>Package</h2>
                       <table class="table table-striped">
                          <thead>
                             <tr>
                                
                                <th>Package</th>
                                <th>Address</th>
                                <th>Current Status</th>
                                <th>Status</th>
                                
                             </tr>
                          </thead>
                          <tbody>
                              <?php
                                    while($row=$result->fetch_assoc()){
                                        echo"<tr>";
                                 
                                        echo "<td>";echo $row["packageID"]; echo"</td>";
                                        echo "<td>";echo $row["deliveryAddress"]; echo"</td>";
                                        echo "<td>"; 
                                        
                                        echo $row["itemStatus"];
                                        echo "</td>";
                                        
                                        echo "<td>";
                                        echo "<select>";
                                        echo '"<option value="">Select...</option>"';
                                        echo '"<option value="D">Delivered</option>"';
                                        echo '"<option value="U">Undelivered</option>"';
                                        echo '"<option value="B">Breakdown</option>"';
                                        echo "</select>";
                                        echo "</td>";
                                    }
                                
                                
                                    ?>
                                    
                              
                             </tr>
                          
                          </tbody>
                       </table>
                    </div>
       </div>
       </div>
   </body>
   
   
   
   
</html>