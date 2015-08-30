<body>
  <!-- header -->
  <?php $this->load->view("partials/header"); ?>
  <!-- navigation -->
  <?php $this->load->view("partials/navigation"); ?>

  <div class="bg-color2 margin-top-Negative51 padding-top-60">
    <div class="main-container">

      <!-- registration form -->
      <div class="container">
        <div class="col-md-6">
          <h3>Register</h3>
          <form class='form-horizontal right-margin left-margin' roll='form' action='/users/register_action' method='post'>
            <div class="form-group">
              <label>Name: </label>
              <input type="text" name="name" required>
            </div>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" name="email" required>
            </div>
            <div class="form-group">
              <label>Password: </label>
              <P>*Password should be at least 8 characters.</p>
                <input type="password" name="password" required>
              </div>
              <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" name="passwordconf" required>
              </div>
              <div class="form-group">
                <label>Date of Birth: </label>
                <input type="date" name="dob" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-lg btn-1 float-right">Register</button>
              </div>
            </form>
          </div>
          <div class="col-md-6">
            <!-- login form -->
            <h3>Login</h3>
            <form class="form-horizontal" roll='form' action='/users/signin_action' method='post'>
              <div class="form-group">
                <label>Email: </label>
                <input type="email" name="email" required>
              </div>
              <div class="form-group">
                <label>Password: </label>
                <input type="password" name="password" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-lg btn-1 float-right">Sign In</button>
              </div>
            </form>
          </div>
        </div> 
        <div class="container">
          <a href='/guides'>Interested in being a guide?</a>
        </div>
        <div class="container">
          <a href='/guides/show_guides'>Browse guides</a>
        </div>
        <div class="container">
          <a href='/main/show_home'>Home page</a>
        </div>
        <div class="container">
          <a href='/reservations'>Show Reservations</a>
        </div>
      </div>
    </div>
    <!--Form error and success messages -->
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
    </div> <!--main container close-->
  </div>  <!--color container close-->
  <!-- footer -->
  <?php $this->load->view("partials/footer"); ?>