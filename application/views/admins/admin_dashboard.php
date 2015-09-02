<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  <script type="text/javascript" src="/assets/js/charts.js"></script>
  <link rel="stylesheet" type="text/css" href="/assets/style.css">
  <script type="text/javascript">
  </script>
</head>
<body>
 <nav class="navbar navbar-default navbar-fixed-top">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <span class="navbar-brand"></span>
     </div>
     <div id="navbar" class="navbar-collapse collapse">
       <ul class="nav navbar-nav">
        <li></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li></li>
     </ul>
   </div><!--/.nav-collapse -->
 </div><!--/.container -->
</nav>
<div class="main-container">
    <div class="container">
    <?php 
      if ($this->session->flashdata('success'))
      {
        ?>
        <div class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Nice!</strong>
          <?php 
          foreach($this->session->flashdata('success') as $s){
            echo $s;
          }
          ?>
        </div>
        <?php
      }
      if ($this->session->flashdata('errors'))
      {
        ?>
        <div class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Error!</strong>
          <?php 
          foreach($this->session->flashdata('errors') as $error){
            echo $error;
          }
          ?>
        </div>
        <?php
      }
      ?>
    </div>
  <div class="container">
    <h3>Manage Users</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone Number</th>
          <th>Date of Birth</th>
          <th>Created At:</th>
          <th>Updated At:</th>
          <th>Actions</th>"
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($users as $user){
          echo "<tr>";
          echo "<td>" . $user['id'] . "</td>";
          echo "<td>" . $user['name'] . "</td>";
          echo "<td>" . $user['email'] . "</td>";
          echo "<td>" . $user['phone'] . "</td>";
          echo "<td>" . $user['dob'] . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($user['created_at'])) . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($user['updated_at'])) . "</td>";
          echo "<td><a href='/users/edit_user/{$user['id']}'>edit</a> | <a href='#' data-toggle='modal' data-target='#myModalUser{$user['id']}'>remove</a></td>";
          echo "</tr>";
          ?>
          <!-- Modal -->
          <div id="myModalUser<?php echo $user['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirm User Deletion</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default yes" onclick="location.href='/users/remove_user_action/<?php echo $user['id'];?>'">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>
    <div class="col-md-6" id="barchart"></div>
    <div class="col-md-6" id="piechart"></div>
    <h3>Manage Guides</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>DOB</th>
          <th>Location</th>
          <th>Price</th>
          <th>Created At:</th>
          <th>Updated At:</th>
          <th>Actions</th>"
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($guides as $guide){
          echo "<tr>";
          echo "<td>" . $guide['id'] . "</td>";
          echo "<td>" . $guide['name'] . "</td>";
          echo "<td>" . $guide['email'] . "</td>";
          echo "<td>" . $guide['phone'] . "</td>";
          echo "<td>" . $guide['dob'] . "</td>";
          echo "<td>" . $guide['location'] . "</td>";
          echo "<td>" . $guide['price'] . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($guide['created_at'])) . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($guide['updated_at'])) . "</td>";
          echo "<td><a href='/guides/edit_guide/{$guide['id']}'>edit</a> | <a href='#' data-toggle='modal' data-target='#myModalGuide{$guide['id']}'>remove</a></td>";
          echo "</tr>";
          ?>
          <!-- Modal -->
          <div id="myModalGuide<?php echo $guide['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirm guide Deletion</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default yes" onclick="location.href='/guides/remove_guide_action/<?php echo $guide['id'];?>'">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>
    <h3>Manage Reservations</h3>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>User_ID</th>
          <th>User Name</th>
          <th>Guide_ID</th>
          <th>Guide Name</th>
          <th>Date</th>
          <th>Confirmation #</th>
          <th>Created At:</th>
          <th>Updated At:</th>
          <th>Actions</th>"
        </tr>
      </thead>
      <tbody>
        <?php 
        foreach($reservations as $reservation){
          echo "<tr>";
          echo "<td>" . $reservation['id'] . "</td>";
          echo "<td>" . $reservation['user_id'] . "</td>";
          echo "<td>" . $reservation['user_name'] . "</td>";
          echo "<td>" . $reservation['guide_id'] . "</td>";
          echo "<td>" . $reservation['guide_name'] . "</td>";
          echo "<td>" . $reservation['date'] . "</td>";
          echo "<td>" . $reservation['confirmation'] . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($reservation['created_at'])) . "</td>";
          echo "<td>" . date("Y-m-d",strtotime($reservation['updated_at'])) . "</td>";
          echo "<td><a href='/reservations/edit_reservation/{$reservation['id']}'>edit</a> | <a href='#' data-toggle='modal' data-target='#myModalReservation{$reservation['id']}'>remove</a></td>";
          echo "</tr>";
          ?>
          <!-- Modal -->
          <div id="myModalReservation<?php echo $reservation['id']; ?>" class="modal fade" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Confirm Reservation Deletion</h4>
                </div>
                <div class="modal-body">
                  <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default yes" onclick="location.href='/reservations/remove_reservation_action/<?php echo $reservation['id'];?>'">Yes</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
        </tbody>
      </table>
    </div> <!-- /container -->
  </div>
</div>
</body>
</html>