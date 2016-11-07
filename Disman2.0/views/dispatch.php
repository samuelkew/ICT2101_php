<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Dispatch Manager 1.0</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/custom.css" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <body>
      <!-- Page Content -->
      <div class="container">
         <!-- Heading Row -->
         <div class="row">
            <div class="col-md-8">
               <div id="map"></div>
               <script src="//maps.googleapis.com/maps/api/js?libraries=places&sensor=true&key=AIzaSyBa9mhqzWHyJ41rznSMn3JeZphwZS3wHRM"></script>
               <script src="//d3js.org/d3.v3.min.js"></script>
               <script src="js/googlemap.js"></script>
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-4">
               <h2>Legend</h2>
               <table class="table table-striped">
                  <thead>
                     <tr>
                        <th>Color</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>
                           <svg width="20" height="20" class="drivers circle">
                              <circle cx="10" cy="10" r="6" fill="green" />
                           </svg>
                        </td>
                        <td>On delivery</td>
                     </tr>
                     <tr>
                        <td>
                           <svg width="20" height="20" class="drivers circle">
                              <circle cx="10" cy="10" r="6" fill="yellow" />
                           </svg>
                        </td>
                        <td>On delivery - Passed ETA</td>
                     </tr>
                     <tr>
                        <td>
                           <svg width="20" height="20" class="drivers circle">
                              <circle cx="10" cy="10" r="6" fill="red" />
                           </svg>
                        </td>
                        <td>Status (Vehical Breakdown etc.)
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <!-- /.col-md-4 -->
         </div>
         <!-- /.row -->
         <hr>
         <!-- Content Row -->
         <div class="row">
            <div class="col-md-4">
               <h2>Add Driver</h2>
               <form class="form">
                  <div class="form-group">
                     <label for="name">Name</label>
                     <input type="name" class="form-control" id="name" placeholder="Driver Name">
                  </div>
                  <div class="form-group">
                     <label for="nric">Nric / Username</label>
                     <input type="nric" class="form-control" id="nric" placeholder="Driver NRIC">
                  </div>
                  <div class="form-group">
                     <label for="password">Password</label>
                     <input type="password" class="form-control" id="password" placeholder="Driver Password">
                  </div>
                  <div class="form-group">
                     <label for="address">Address</label>
                     <textarea class="form-control" id="address" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Add Driver</button>
               </form>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
               <h2>Packages</h2>
               <?php
                  $driver = array();
                  $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                  $sql = "SELECT e.empName, e.empPhone, e.empNric, p.packageId, p.itemStatus FROM employee AS e JOIN package AS p ON e.empId = p.empId AND e.empType = 5";
                  $stmt = $pdo->prepare($sql);
                  $stmt->execute();
                  
                  while ($row = $stmt->fetch()) {
                      $entry = array(
                          'name' => $row[0],
                          'phone' => $row[1],
                          'nric' => $row[2],
                          'packageId' => $row[3],
                          'itemStatus' => $row[4],
                      );
                      if (!array_key_exists($entry['nric'], $driver)){
                          $driver[$entry['nric']] = array();
                          array_push($driver[$entry['nric']], $entry);
                      }
                      else {
                          array_push($driver[$entry['nric']], $entry);
                      }
                  }
                  echo '<table id="Packages" class="table table-striped" cellspacing="0" width="100%">';
                  echo '<thead><tr><td>Driver name</td><td>Package Id</td><td>Item Status</td></tr></thead>';
                  foreach ($driver as &$packageArray) {
                      foreach ($packageArray as &$package){
                          echo '<tr>';
                          echo '<td>'.$package['name'].'</td>';
                          echo '<td>'.$package['packageId'].'</td>';
                          echo '<td>'.$package['itemStatus'].'</td>';
                          echo '</tr>';
                      }
                  }
                  echo '</table>';
                  ?>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
               <h2>Get Package ETA</h2>
               <form class="form-inline">
                  <div class="form-group">
                     <input type="packageid" class="form-control" id="packageid" placeholder="Package Id">
                  </div>
                  <button type="submit" class="btn btn-primary">Go!</button>
               </form>
               <h2>Delete Driver</h2>
               <form class="form-inline">
                  <div class="form-group">
                     <input type="deldriver" class="form-control" id="packageid" placeholder="Driver NRIC">
                  </div>
                  <button type="submit" class="btn btn-primary">Delete Driver</button>
               </form>
            </div>
            <!-- /.col-md-4 -->
         </div>
         <!-- /.row -->
      </div>
      <!-- /.container -->
      <!-- jQuery -->
      <script src="js/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="js/bootstrap.min.js"></script>
   </body>
</html>