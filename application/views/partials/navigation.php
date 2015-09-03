 <!-- Static navbar -->
 <nav class="navbar navbar-default navbar-static-top no-margin no-bg"id="sectionHome">
 	<div class="container">
 		<div class="navbar-header">
 			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
 				<span class="sr-only">Toggle navigation</span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 				<span class="icon-bar"></span>
 			</button>
 			<a class="navbar-brand" href="/main/show_home"><img src="../../assets/navipal_logo.png" id="main-logo" width="150" class="img-responsive" align="Navipal logo"></a>
 		</div>
 		<div id="navbar" class="navbar-collapse collapse">
 			<ul class="nav navbar-nav navbar-right">
 				<li><a href="/home">Home</a></li>
 				<li><a href="/main/show_about">About</a></li>
 				<li><a href="/guides/show_guides">Navipals</a></li>
 				<?php 
 				if((!$this->session->userdata('user_login')) && (!$this->session->userdata('guide_login'))){
 					echo "<li data-toggle='modal' data-target='#myModal'><a href='#'>";
 					echo "Login";
 					echo "</a></li>";
 				} 
 				if((!$this->session->userdata('user_login')) && (!$this->session->userdata('guide_login'))){
 					echo "<li id='scroll-test'><a href='/main'>";
 					echo "Sign Up";
 					echo "</a></li>";
 				} 

 				if($this->session->userdata('guide_login')){
 					$guide_id = $this->session->userdata('current_guide_id');
 					echo "<li id='scroll-test'><a href='/guides/show_guide_dashboard/$guide_id'>";
 					echo "Go to Guide Dashboard";
 					echo "</a></li>";
 				} 
 				if($this->session->userdata('user_login')){
 					echo "<li id='scroll-test'><a href='/users/logoff'>";
 					echo "Log Off";
 					echo "</a></li>";
 					
 				} 
 				if($this->session->userdata('guide_login')){
 					echo "<li id='scroll-test'><a href='/guides/logoff'>";
 					echo "Log Off";
 					echo "</a></li>";
 				} 
 				?>
 			</ul>
 		</div><!--/.nav-collapse -->
 	</div>
 </nav>
 