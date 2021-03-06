
<?php  include('header.php'); ?>

<div class="container">

  <div class="row">
	<div class="col-lg-4">
				<ul class="nav nav-pills">
			  
			  <li class="dropdown active">
			    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
			      Master Data<span class="caret"></span>
			    </a>
			    <ul class="dropdown-menu">
			      <li><?php echo anchor("marriage/addMarriage", 'Add Member'); ?></li>
			      <li><?php echo anchor("marriage/marriageList", 'View Marriage Records'); ?></li>
			   
			      <!--<li class="divider"></li> -->
			      <!--<li><?php //echo anchor("baptism/addBaptism", 'Add Baptism'); ?></li>-->
			     <!-- <li><?php //echo anchor("baptism/viewBaptism", 'View Baptism Records'); ?></li>-->
			    </ul>
			  </li>
			</ul>
		

	</div>
	<div class="col-lg-8">
		<?php echo form_open("dashboard/search", ['class'=>'navbar-form navbar-right', 'role'=>'search']); ?>
		

        <div class="form-group">
		<?php echo form_input(['name'=>'query', 'class'=>'form-control', 'placeholder'=>'Search']);  ?>

		</div>

		<?php echo form_submit(['value'=>'Search', 'class'=>'btn btn-primary']); ?>

		<?php echo form_close(); ?>

		<!--this code displays the search error  -->
		 <?php echo form_error('query', '<div class="text-danger">', '</div>'); ?>

	</div>

</div> 

	   <div class="row">
	   	<?php echo anchor("marriage/deleteMarriage", 'Delete', ['class'=>'btn btn-danger']); ?>
	   </div>

	     <br/>

           <?php if ($error=$this->session->flashdata('record_add')):  ?>
             <div class="row">
             	<div class="col-lg-12">
             		<div class="alert alert-dismissible alert-success">
                    <?php echo $error;  ?>
             		</div>
             	</div>

             </div>

         <?php endif; ?>

	     <br/>



	   <div class="row">
				   	<table class="table table-striped table-hover ">
							  <thead>
							    <tr>
							      <th></th>
							      <th>Full Name</th>
							      <th>Serial or Username</th>
							      <th>Designation</th>
							      <th>Role</th>
							    </tr>
							  </thead>
							  <tbody>

							  <?php if(count($record)): ?>

							  	<?php foreach($record as $record): ?>

									  	<tr>
                                          
                                          <?php if($record->user_id == 1): ?>
                                           
                                           <td></td>
                                           
                                          <?php else: ?>
                                            
                                           <td> <?php echo form_checkbox(['class'=>'checkbox']); ?> </td> 

                                          <?php endif; ?>

										   <?php if($record->user_id == 1): ?>
										   	<td> <?php echo $record->name;  ?> </td>

										   <?php  else:?>
							     <td> <?php echo anchor("marriage/memPersonalDetails/{$record->user_id}", $record->name); ?> </td>
										   <?php endif; ?>
											
											      <td> <?php echo $record->username;  ?> </td>
											      <td> <?php echo $record->role_name;  ?> </td>
											      <td> <?php echo $record->role_name;  ?> </td>

									    </tr>

							  	<?php endforeach;  ?>

                                <?php else: ?>
                                	<tr>
                                		<td>No Record Found</td>

                                	</tr>

							  	<?php endif; ?>
							    
							   
							  </tbody>
			</table> 
       
       <!-- pagination; page numbering and links -->
      

	   </div>

</div>

<?php  include('footer.php'); ?>

