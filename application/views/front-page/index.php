  <!-- header -->
  <?php $this->load->view("partials/header-login"); ?>
<body>
  <!-- navigation -->
  <?php $this->load->view("partials/navigation"); ?>
  
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
           <form class="form-horizontal" roll='form' action='/users/signin_action' method='post'>
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
  
  <!-- scroll to navigation -->
  <div class="regular-container">
    <div class="scroll-nav-container" >
      <a href="#" id="ScrollToSectionHome"><span class="scroll-nav"><i class="scroll glyphicon glyphicon-map-marker"></i></span></a>
      <a href="#" id="ScrollToSection1"> <span class="scroll-nav"><i class="scroll flaticon-magnifier72"></i></a>
      <a href="#" id="ScrollToSection2"><span class="scroll-nav"><i class="scroll flaticon-plussign1"></i></span></a>
      <a href="#" id="ScrollToSection3"><span class="scroll-nav"><i class="scroll flaticon-travel25"></i></span></a>
    </div>
  </div>
  <!-- cover -->
  <div class="jumbotron ">
    <!-- <img src="../assets/images/cover1.jpg" class="img-responsive" alt="Traveler taking a photo"> -->
    <div class="search-container">
      <form  action="/guides/show_guides" method="post" id="search">
       <!--  <input type="search" name="search" placeholder="Search the city..." class="search"> -->
        <button type="submit" class="btn btn-lg btn-4 explore"> Start Exploring<span class="glyphicon glyphicon-map-marker"></span></button>
      </form>
    </div>
  </div>
  <!-- section 1 -->
  <div class="section-container bg-color1" id="section1">
    <div class="icon-container"><i class="flaticon-magnifier72"></i> </div>
    <h1>Explore</h1>
    <p>Explore a new city through the eyes of a local; the best spots to hangout, the hidden gem restaurants, or a fun way to experience a new place.</p>
  </div>
  <!-- section 2 -->
  <div class="section-container bg-color2" id="section2">
    <div class="icon-container"><i class="flaticon-plussign1"></i></div>
    <h1>Choose a navi<span>pal</span></h1>
    <p>Meet someone who knows the in’s and out’s of a city. Read their profile and reviews to find your perfect navipal.</p>
  </div>
  <!-- section 3 -->
  <div class="section-container bg-color3" id="section3">
    <div class="icon-container"><i class="flaticon-travel25"></i></div>
    <h1>Have fun!</span></h1>
    <p>Pick your date and start exploring! After your journey, don’t forget to leave a review for your guide!</p>
  </div>

  <!-- footer -->
<?php $this->load->view("partials/footer") ?>


