<!-- header -->
<?php $this->load->view("partials/header-show-guides") ?>
<body>
  <!-- navigation -->
  <?php $this->load->view("partials/navigation") ?>


  <div id="panel" class="bg-color3 margin-top-Negative51 padding-top-60">
    <input id="address" type="textbox" value="San Jose, CA">
    <!-- <input id="submit" type="button" value="Geocode"> -->
    <button type="submit" id="submit" class="explore-small no-bg" value="Geocode">explore</button>
  </div>
  <div class="">
    <div class="guides-container bg-color2">
      <?php 
      foreach($guides as $guide){
        
        echo "<img class='profile-photo' width='124' height='125' src='/uploads/{$guide['image']}'>";
        echo "<h2><a href='/guides/view_profile/{$guide['id']}'>{$guide['name']}</a></h2>";
        // star rating
        
        for ($i = 0; $i < $guide['rating']; $i++)
        {
         echo "<img src='/assets/star.png' height='25' width='25'>";
       }
       $star = 5 - $guide['rating'];
       for ($i = 0; $i < $star; $i++)
       {
         echo "<img src='/assets/blank.png' height='25' width='25'>";
       }
       // star rating ends
      
        echo "<h4>\"{$guide['description']}\"</h4>";
       echo "<h4>Price: \${$guide['price']}/night</h4>";
       echo "<h4>{$guide['location']}</h4>";
     }
     ?>
   </div>
   <div class="map-container">
     <div id="map"><!--do not style this div-->
     </div>
   </div>
 </div>

