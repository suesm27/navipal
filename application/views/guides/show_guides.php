<!-- header -->
<?php $this->load->view("partials/header-show-guides") ?>
<body style="background-color:#42b8dd;">
  <!-- navigation -->
  <?php $this->load->view("partials/navigation") ?>
  
  <div id="panel" class="bg-color3 margin-top-Negative51 padding-top-60">

    <input id="address" class="margin-top30" type="textbox" value="San Jose, CA">
    <!-- send when press enter -->


    
      <input id="submit" class="explore-small no-bg text-color4 " type="button" value="explore">
    
    <!-- <button type="submit" id="submit " class="explore-small no-bg " value="Geocode">explore</button> -->
  </div>
  <div class="">
    <div class="guides-container bg-color2 inner-shadow">
      <?php 
      foreach($guides as $guide){
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <!-- Profile image -->
          <img class='profile-photo' width='125' height='125' src='/uploads/<?php echo "{$guide['id']}.png";?>'>
          <!-- name -->
          <h2 class="guide-name"><a class="text-color4" href='/guides/view_profile/<?php echo $guide['id']?>'><?php echo $guide['name'];?></a></h2>
          <p class="text-color4"><?php echo $guide['location'];?></p class="text-color4">
            <!-- star rating -->
            <div class="margin-bottom30">
              <?php        
              for ($i = 0; $i < $ratings[$guide['id']]; $i++)
              {
                ?>
                <span class="glyphicon glyphicon-star text-color2a"></span>
                <?php    }
                $star = 5 - $ratings[$guide['id']];
                for ($i = 0; $i < $star; $i++)
                {
                  ?>
                  <span class="glyphicon glyphicon-star-empty text-color2a"></span>
                  <?php
                }
                ?>
              </div>


              <!-- description -->
              <!-- <h4 class="text-color4"><?php echo $guide['description'];?></h4> -->
              <!-- <h4>Price: \<?php echo $guide['price'];?>/night</h4> -->
            </div>
            <?php 
          }
          ?>
        </div>
        <div class="map-container">
         <div id="map"><!--do not style this div-->
         </div>
       </div>
     </div>
     <!-- footer -->
     <?php $this->load->view("partials/footer") ?>

