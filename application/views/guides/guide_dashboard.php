  <!-- header -->
  <?php $this->load->view("partials/header-login"); ?>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="http://code.highcharts.com/modules/exporting.js"></script>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div class="dashboard-container">

      
      <!-- guide sidebar -->
      <div class="guide-profile-dashboard bg-color2 inline-block">
        <div class="guides-dashboard-header bg-color3 ">

         <!-- photo -->
         <img src='/uploads/<?php echo "{$guide['id']}.png";?>' width='65' height='65' class='profile-photo'>
         <!-- name -->
         <p class="dash-p"><?php echo "{$guide['name']}"; ?></p>
         <!-- edit button -->
         <form action='/guides/edit_guide/<?php echo $guide['id'];?>' method='post'>
          <span class='glyphicon glyphicon-edit'></span>
          <input type="submit" class='ash-p dash-info edit-input' value="Edit">
        </form>
        <p class="dash-p"><a href="/main/show_upload_page"><?php echo "Upload Profile Picture"; ?></a></p>
      </div>
      <div class="">
      <!-- email -->
       <p class="dash-info border-bottom"><span class="glyphicon glyphicon-envelope"></span> <?php echo $guide['email']; ?></p>
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
        <h2><?php 
        echo "\$$earnings_this_month"; ?></h2>
      </div>
    </div>
    <div class="col-sm-4">
      <h4 class="info-box-header bg-color2">UPCOMING TOURS</h4>
      <div class="info-box">
        <ul>
          <?php 
          foreach($reservations as $reservation){
            echo "<li><p>" . $reservation['user_name'] . " - " . $reservation['date'] . "</p></li>";
          }
           ?>
        </ul>
        
      </div>
    </div>

    <div class="col-sm-4">
      <h4 class="info-box-header bg-color2">Earnings YTD</h4>
      <div class="info-box">
        <ul>
          <li><h1><?php 
        echo "\$$earnings_ytd"; ?></h1></li>
        </ul>
      </div>

    </div>

     <div class="col-sm-12">
      <h4 class="info-box-header bg-color2">Messages</h4>
      <div class="info-box">
        <div id="messages">

        </div>
      </div>
    </div>

    <script type="text/javascript" src="/assets/js/show_messages.js"></script>
    
    <div id="linechart">
   </div>

   <div>
    <input type="hidden" id="guide_id" value="<?php echo $guide['id']; ?>">
   </div>

    <script type="text/javascript" src="/assets/js/guide_dashboard_chart.js"></script>
 </div>
</div>
<!-- footer -->  <!-- footer -->
<?php $this->load->view("partials/footer") ?>













