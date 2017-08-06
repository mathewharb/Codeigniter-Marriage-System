<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Diocese Of Banjul Church Management System</title>
   <link rel="stylesheet" href="<?php echo base_url('resources/css/bootstrap.min.css');?>"/>

   <link rel="stylesheet" href="<?php echo base_url('resources/css/jquery-ui.css');?>"/>

   <link rel="stylesheet" href="<?php echo base_url('resources/css/style.css');?>"/>

   <script src="<?php echo base_url('resources/js/jquery-3.1.1.js');?>" ></script>
   <script src="<?php echo base_url('resources/js/jquery-1.11.1.js');?>" ></script>

   <script src="<?php echo base_url('resources/js/jquery-ui.js');?>" ></script>

   <script>
     $( function() {

      $( "#datepicker" ).datepicker();

     } );

   </script>
	
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  
  <div class="col-lg-6">
  
    <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
      <a class="navbar-brand" href="#">Church MS</a>
    </div>
	
  </div>
 
  <div class="col-lg-6">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
      <ul class="nav navbar-nav navbar-right">

        <?php if($this->session->userdata('user_id')):   ?>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Logout <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            

            <li><?php echo anchor("dashboard/changePassword", 'Change Password'); ?></li>

            <li><?php echo anchor("login/logout", 'Logout'); ?></li>

            
          </ul>
        </li>

       <?php else:   ?>

       <?php endif;    ?>

      </ul>
      
       </div>
     </div>
  </div>


</nav>


     <?php   $host='http://' .$_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'];  ?>


<?php if($this->session->userdata('user_id')):  ?>


              <ul class="breadcrumb">
              <!-- CONDITIONS TO VALIDATE THE PAGES -->

     <?php if(($host=='http://' .$_SERVER['SERVER_NAME'] .'/churchms/dashboard') || ($host=='http://' .$_SERVER['SERVER_NAME'].'/churchms/index.php/dashboard')): ?>

                   <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>

                   <?php else:  ?>

                    <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                    <li><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Marriage</a></li>

                   <?php endif; ?>

                
              </ul>

  <?php else: ?>

  <?php endif;  ?>




           