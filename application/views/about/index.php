  <!-- header -->
  <?php $this->load->view("partials/header-login"); ?>
<body>
  <!-- navigation -->
  <?php $this->load->view("partials/navigation"); ?>
   <!-- nav background hack this should be fixed -->
    <div class="bg-color3 margin-top-Negative51 padding-top-60 ">
    </div>
    <div class="about-cover-container bg-color2 padding20 margin-auto text-center">
    <img src="../../uploads/1.png" class="profile-photo" width="120" height="120">
    <img src="../../uploads/2.png" class="profile-photo" width="120" height="120">
    <img src="../../uploads/3.png" class="profile-photo" width="120" height="120">
    <h1 class="h1-large text-color4">Interested in becoming a guide?</h1>
    <a href="/guides/index"><button class="btn btn-1 btn-lg">Hell yeah!</button></a>
    </div>
    <div class="small-container padding-top-60">
    <p class="p-large text-color3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. </p>
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

         <form class="form-horizontal" roll='form' action='/Users/signin_action_show_about' method='post'>
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
    <!-- footer -->
<?php $this->load->view("partials/footer") ?>