<!-- header -->
<?php $this->load->view("partials/header"); ?>
<!-- navigation -->
<?php $this->load->view("partials/navigation"); ?>
<!-- cover -->
<div class="jumbotron front-cover">
  <img src="assets/images/cover1.jpg" class="img-responsive" alt="Traveler taking a photo">
  <div class="search-container">
    <form  action="" method="get" id="search">
      <input type="search" name="search" placeholder="Search the city..." class="search">
      <button type="submit" class="explore no-bg">explore</button>
    </form>
  </div>
</div>
<!-- section 1 -->
<div class="section-container bg-color1">
  <div class="icon-container"></div>
  <h1>explore</h1>
  <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
</div>
<!-- section 2 -->
<div class="section-container bg-color2">
  <div class="icon-container"></div>
  <h1>choose a navi<span>pal</span></h1>
  <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature.</p>
</div>









<!-- footer -->
<?php $this->load->view("partials/footer"); ?>