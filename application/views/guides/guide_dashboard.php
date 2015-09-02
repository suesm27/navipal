  <!-- header -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div class="dashboard-container">

      
      <!-- guide sidebar -->
      <div class="guide-profile-dashboard bg-color2 inline-block">
        <div class="guides-dashboard-header bg-color3 ">

         <!-- photo -->
         <img src='/uploads/<?php echo $guide['image'];?>' width='65' height='65' class='profile-photo'>
         <!-- name -->
         <p class="dash-p"><?php echo "{$guide['name']}"; ?></p>
         <!-- edit button -->
         <form action='/guides/edit_guide/<?php echo $guide['id'];?>' method='post'>
          <span class='glyphicon glyphicon-edit'></span>
          <input type="submit" class='ash-p dash-info edit-input' value="Edit">
        </form>
      </div>
      <div class="">
      <!-- email -->
       <p class="dash-info border-bottom"><span class="glyphicon glyphicon-envelope"></span> <?php echo $guide['email']; ?></p>
       <!-- DOB is not populated correctly into the form field -->
       <!-- <p>Date of Birth: <?php echo $guide['dob']; ?></p> -->

       <!-- tour price -->
       <p class="dash-info border-bottom"><span class="glyphicon glyphicon-credit-card"></span> $<?php echo $guide['price'];?></p>
       <!-- location -->
       <p class="dash-info border-bottom"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $guide['location'];?></p>

     </div>
   </div>

   <!-- dashboard -->
   <div class="guide-dashboard inline-block">
   <!-- login success message -->
  
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
   
   <!-- dashboard begin -->
     <div class="col-sm-4">
      <h4 class="info-box-header bg-color2">EARNINGS THIS MONTH</h4>
      <div class="info-box">
        <h2>$1,200</h2>
      </div>
    </div>
    <div class="col-sm-4">
      <h4 class="info-box-header bg-color2">UPCOMING TOURS</h4>
      <div class="info-box">
        <ul>
          <li><p>Ross Silva</p></li>
          <li><p>Kelley Schimmel</p></li>
          <li><p>Tim Draper</p></li>
          <li><p>Jon Roberts</p></li>
          <li><p>Jon Roberts</p></li>
        </ul>
        
      </div>
    </div>

    <div class="col-sm-4">
      <h4 class="info-box-header bg-color2">BEST PRACTICES</h4>
      <div class="info-box">
        <ul>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          <li><p>Info</p></li>
          
        </ul>
      </div>

    </div>
    
    <div class="info-chart">
     <img src="../assets/images/chart-sample.png" width="960" class="img-responsive text-center margin-auto" alt="sample chart">
   </div>
 </div>
</div>
<!-- footer -->














