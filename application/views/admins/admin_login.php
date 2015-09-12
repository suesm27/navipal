  <!-- header-login -->
  <?php $this->load->view("partials/header-login"); ?>
  <body style="background-color:#F5BD25;"> <!--fix inline style so you dont need to use it -->
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div class="bg-color3 margin-top-Negative51 padding-top-60 ">
    </div>
    
  <div class="bg-color2  padding-top-60 height100 padding20">
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
    <!-- registration form -->
    <div class="container">
          <h3>Login to Dashboard</h3>
          <form class="form-horizontal right-margin left-margin" roll='form' action='/admins/signin_action' method='post'>
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
      </div> <!-- /container -->
    </div>  
  </div>  
      <!-- footer -->
      <?php
      $this->load->view("partials/footer");
      ?>