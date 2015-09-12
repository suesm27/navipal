  <!-- header-login -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
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
      <button class="btn btn-lg btn-info"><a href="/guides/view_profile/<?php echo $guide['id']; ?>">Go Back</a></button>
	<?php
    // Get the PHP helper library from twilio.com/docs/php/install
      require_once('assets/twilio-php/Services/Twilio.php'); // Loads the library
       
      // set your AccountSid and AuthToken from www.twilio.com/user/account
      $AccountSid = "AC0509bdc2efb7771b8e0e8cbbc0006bfe";
      $AuthToken = "a415e2044b826566e515b413672ac234";
      $client = new Services_Twilio($AccountSid, $AuthToken);
      $user_name = $this->session->userdata('name');
      //send message text to guide
      try {
          $message = $client->account->messages->create(array(
              "From" => "6092773538",
              "To" => "{$guide['phone']}",
              "Body" => "New message from $user_name: $message",
          ));
      } catch (Services_Twilio_RestException $e) {
          echo $e->getMessage();
      }

      ?> 
  </div>
</body>
</html>