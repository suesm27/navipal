  <!-- header -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div id="panel" class="bg-color3 margin-top-Negative51 padding-top-60 padding-bottom10">
      <!-- guide profile info -->
      <div class="text-color4 padding-top-60">
        <!-- photo -->
        <img src='/uploads/<?php echo "{$guide['id']}.png";?>' width='100' height='100' class='profile-photo'>
        <!-- name -->
        <h3 class="dash-p"><?php echo "{$guide['name']}"; ?></h3>
        <!-- star rating -->
        <div class="block margin10">
<?php
        
        for ($i = 0; $i < $rating; $i++)
        {
?>
          <span class="glyphicon glyphicon-star text-color2a"></span>
<?php
        }
        $star = 5 - $rating;
        for ($i = 0; $i < $star; $i++)
        {
?>
          <span class="glyphicon glyphicon-star-empty text-color2a"></span>
<?php    }
?>
          </div>
          <div class="">
          <!-- email -->
          <p class="inline-block margin10"> <span class="glyphicon glyphicon-envelope"></span> <?php echo $guide['email']; ?> </p>
          <!-- DOB is not populated correctly into the form field -->
          <!-- <p>Date of Birth: <?php echo $guide['dob']; ?></p> -->
            <!-- tour price -->
            <p class="inline-block margin10"><span class="glyphicon glyphicon-credit-card"></span> $<?php echo $guide['price'];?></p>
            <!-- location -->
            <p class="inline-block margin10"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $guide['location'];?></p>
          </div>
            <!-- book a tour button -->
          <div>
<?php 
          if($this->session->userdata('user_login')){?>
          <form action="<?php 
          $user_id = $this->session->userdata('current_user_id');
          echo "/reservations/show_confirmation/$user_id/{$guide['id']}/2015-09-10"; 
          ?>" method="post">
          <script
          src="https://checkout.stripe.com/checkout.js" class="stripe-button "
          data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
          data-name="Book Your Tour"
          data-image="/assets/navipal_icon.png"
          data-description="Your friendly neighborhood guide..."
          data-billing-address="true"
          data-amount="<?= $guide['price']*100 ?>"
          data-label="Book Tour!"
          data-locale="auto">
        </script>
      </form>
      
        <input type="text" name="datepicker" id="datepicker" placeholder="Check Available Dates">
        <div class="styled-select">
         <select>
            <option disabled="disable">#People</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            
         </select>
        </div>
   
     
      </div>
          
         
  </div>
</div>
<div class="main-container ">
  <div class="container">
  

  <!-- message box -->
      <form class="form-horizontal" roll='form' action="/guides/message_guide/<?php echo $guide['id'];?>/<?php echo $this->session->userdata('current_user_id') ?>" method='post'>
        <input type='hidden' name='action' value='message'>
        <div class="form-group">
          <label>Message: </label>
          <textarea class="form-control" rows="5" name="message" placeholder="Leave a message for <?php echo "{$guide['name']}"; ?>" required></textarea>
        </div> 
        <div class="form-group">
          <button type="submit" class="btn btn-lg btn-primary">Send!</button>
        </div>
      </form>    
      <?php
    }
    else{
      echo "<h4 data-toggle='modal' data-target='#myModal'><a href='#'>";
      echo "Login to book the tour or message {$guide['name']}";
      echo "</a></h4>";
    }
    ?>
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
  <div class="bg-color4">

    <div class="col-md-6">
      <h2>Recent Reviews: </h2>
      <?php       
      foreach($reviews as $review){
        echo "<h3>{$review['user_name']} says: </h3>";
        echo "<h4>{$review['review']}</h4>";
        echo "<h4>Rating: ";
        for ($i = 0; $i < $review['star']; $i++)
        {
          echo "<span class='glyphicon glyphicon-star text-color2a'></span>";
        }
        $star = 5 - $review['star'];
        for ($i = 0; $i < $star; $i++)
        {
          echo "<span class='glyphicon glyphicon-star-empty text-color2a'></span>";
        }
        echo "</h4>";
      }
      ?>
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <h3 class="modal-title">Login</h3>
            <!-- login succes and error message will go here -->

          </div>
          <div class="modal-body">

           <form class="form-horizontal" roll='form' action='/Users/signin_action_other/<?php echo $guide['id']; ?>' method='post'>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label>Password: </label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-1 float-right">Sign In</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">

        </div>
      </div>

    </div>
  </div><!-- end of Modal -->

</div>
</div>
</body>
</html>