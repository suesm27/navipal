  <!-- header-login -->
  <?php $this->load->view("partials/header-login"); ?>
  <body>
    <!-- navigation -->
    <?php $this->load->view("partials/navigation"); ?>
    <div class="bg-color3 margin-top-Negative51 padding-top-60 "></div>
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
    <div class="container">
<h2 >Edit Profile</h2>
    <div class="row">
      <div class="col-sm-6">
        <form class="form-horizontal right-margin left-margin" roll='form' action="/guides/edit_guide_action/<?php echo $guide['id']; ?>" method='post'>
          <input type='hidden' name='action' value='basic'>
          <div class="form-group">
            <label>Name: </label>
            <input type="text" class="form-control" name="name" value="<?php echo $guide['name'];?>" required>
          </div>  
          <div class="form-group">
            <label>Location: </label>
            <input type="text" class="form-control" name="location" value="<?php echo $guide['location'];?>" required>
          </div>  
          <div class="form-group">
            <label>Price: </label>
            <input type="text" class="form-control" name="price" value="<?php echo $guide['price'];?>" required>
          </div>  
          <div class="form-group">
            <label>Date of Birth: </label>
            <input type="date" class="form-control" name="dob" value="<?php echo $guide['dob'];?>" required>
          </div> 
          <div class="form-group">
            <label>Phone number: </label>
            <input type="tel" class="form-control" name="phone" value="<?php echo $guide['phone'];?>" required>
          </div> 
          <div class="form-group">
            <label>Description: </label>
            <textarea class="form-control" rows="5" name="description" value="<?php echo $guide['description'];?>" required><?php echo $guide['description'];?></textarea>
          </div> 
          <div class="form-group">
            <button type="submit" class="btn btn-lg btn-1">Save</button>
          </div>
        </form> 
        </div>
        <div class="col-sm-6">
          <form class="form-horizontal right-margin left-margin" roll='form' action="/guides/edit_guide_action/<?php echo $guide['id']; ?>" method='post'>
            <input type='hidden' name='action' value='password'>
            <div class="form-group">
              <label>Password: </label>
              <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
              <label>Password Confirmation: </label>
              <input type="password" class="form-control" name="passwordconf" required>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-lg btn-1">Update Password</button>
            </div>
          </form>

        </div>
    </div>
  
</div>  
</div>
 <!-- footer -->
    <?php
    $this->load->view("partials/footer");
    ?>