  <!-- header-login -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div class="bg-color3 margin-top-Negative51 padding-top-60 ">
    </div>
    <div class="bg-color2  padding-top-60 height100">

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
      <div class="med-container">

        <div class="col-md-6">
          <h3>Register to be a NaviPal</h3>
          <form class='form-horizontal right-margin left-margin' roll='form' action='/guides/register_action' method='post'>
            <div class="form-group">
              <label>Name: </label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
              <label>Email: </label>
              <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label>Password: </label>
              <P>*Password should be at least 8 characters.</p>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label>Confirm Password: </label>
                <input type="password" class="form-control" name="passwordconf" required>
              </div>
              <div class="form-group">
                <label>Date of Birth: </label>
                <input type="date" class="form-control" name="dob" required>
              </div>
              <div class="form-group">
                <label>Description: </label>
                <textarea class="form-control" rows="5" name="description"></textarea>
              </div>
              <div class="form-group">
                <label>Location: </label>
                <input type="text" class="form-control" name="location" required>
              </div>
              <div class="form-group">
                <label>Price: </label>
                <input type="text" class="form-control" name="price" required>
              </div>
              <div class="form-group">
                <label>Phone #: </label>
                <input type="text" class="form-control" name="phone" required>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-lg btn-1 float-right">Register</button>
              </div>
            </form>
          </div>

          <div class="col-md-6">
            <h3>Login to Dashboard</h3>
            <form class="form-horizontal right-margin left-margin" roll='form' action='/guides/signin_action' method='post'>
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
            <div class="container">
              <a href='/users'>Register as a user</a>
            </div>
          </div>
        </div> <!-- /container -->
        
      </div>
    </div> 

    <!-- footer -->
    <?php
    $this->load->view("partials/footer");
    ?>