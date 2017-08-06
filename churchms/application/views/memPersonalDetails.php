<?php include('header.php'); ?>

<div class="container">

<!--FORM FOR THE SPOUSE PROFILE DATA  -->
<?php  echo form_open_multipart("marriage/addPersonalDetails/{$result->user_id}", ['clas'=>'form-horizontal']);    ?>

        <?php echo form_hidden('user_id', $result->user_id);  ?>
         <?php echo form_hidden('user_role_id', $result->user_role_id);  ?>

       <div class="row">
	           <div class="col-lg-3">

	           	<legend>Marriage Details</legend>

	           	<?php // print_r($records); ?>

		           	    <div class="list-group">

		           	    <?php if (!empty($records)): ?>
		           	    
			           	    <a href="#" class="thumbnail" >
			               <img src=<?php echo $records->avatar;  ?>  style="width:248px; height: 190px;" /> 

			            <?php else:  ?>

			            	<a href="#" class="thumbnail" >
		 <img src="<?php echo base_url('resources/images/avatar.png');  ?>"  style="width:248px; height: 190px;" /> 

			            <?php endif; ?>


			           	    </a>

			           	    <br/>
			           	    
                            <?php echo form_upload(['name' =>'avatar', 'class'=>'form-control']);  ?>

                            <?php if(isset($upload_error)) echo $upload_error; ?>
                            <br/>
                            <ul class="nav nav-pills nav-stacked">

                             <li class="active"><a href="<?php echo base_url("marriage/memPersonalDetails/{$result->user_id}");  ?>">Spouse Personal Details</a></li>

							 <li class=""><a href="<?php echo base_url("marriage/memParentDetails/{$result->user_id}");  ?>">Parent Details</a></li>

							 <li class=""><a href="<?php echo base_url("marriage/memChurchDetails/{$result->user_id}");  ?>">Church Details</a></li>
							  
							</ul>

		           	    </div>
	           </div>

	           <div class="col-lg-9">
	           	<legend>Spouse Personal Details</legend>
                   
				                   <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Serial</label>
				       	           <div class="col-lg-8">

				       	<?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Serial', 'value'=>set_value('username', $records->username)]);  ?>

				        <?php else:  ?>

				        	 <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Serial', 'value'=>set_value('username')]);  ?>

				        <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">First Name</label>
				       	           <div class="col-lg-8">

				       	<?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'first_name', 'class'=>'form-control', 'placeholder'=>'First Name', 'value'=>set_value('first_name', $records->first_name)]);  ?>

				       <?php else:  ?>

				        	 <?php echo form_input(['name'=>'first_name', 'class'=>'form-control', 'placeholder'=>'First Name', 'value'=>set_value('first_name')]);  ?>
				        <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('first_name', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Middle Name</label>
				       	           <div class="col-lg-8">
                         
                         <?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'middle_name', 'class'=>'form-control', 'placeholder'=>'Middle Name', 'value'=>set_value('middle_name', $records->middle_name)]);  ?>

                         <?php else:  ?>

				        	 <?php echo form_input(['name'=>'middle_name', 'class'=>'form-control', 'placeholder'=>'Middle Name', 'value'=>set_value('middle_name')]);  ?>

				        <?php endif; ?>


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('middle_name', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Last Name </label>
				       	           <div class="col-lg-8">

				       	  <?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'last_name', 'class'=>'form-control', 'placeholder'=>'Last Name', 'value'=>set_value('last_name', $records->last_name)]);  ?>

                         <?php else:  ?>

				        	 <?php echo form_input(['name'=>'last_name', 'class'=>'form-control', 'placeholder'=>'Last Name', 'value'=>set_value('last_name')]);  ?>
				        <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('last_name', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				            <div class="row">
						       	      <div class="col-lg-6">
						       	        <div class="form-group">
						       	           <label  for="inputEmail" class="col-lg-4 control-label ">Gender</label>
						       	           <div class="col-lg-8">

						      <?php if(!empty($records)):  ?>

						                   <select class="form-control" name="gender">
						                   	<option><?php echo $records->gender; ?></option>
						                   	<option value="male">Male</option>
						                   	<option value="female">Female</option>

						                   </select>
						        <?php else:  ?>
                                             
                                             <select class="form-control" name="gender">
						                   	<option></option>
						                   	<option value="male">Male</option>
						                   	<option value="female">Female</option>

						                   </select>
				        	 
				               <?php endif; ?>

						                </div>
						                </div>
						              </div>
						                 <div class="col-lg-6"> 
						                  
						              <?php echo form_error('gender', '<div class="text-danger">', '</div>'); ?>

						                 
						          </div>
						   </div>
                              
                              <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Date of Birth</label>
				       	           <div class="col-lg-8">

                            <?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'dob', 'class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'Date of Birth', 'value'=>set_value('dob', $records->dob)]);  ?>

				            <?php else:  ?>

                              <?php echo form_input(['name'=>'dob', 'class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'Date of Birth', 'value'=>set_value('dob')]);  ?>

				               <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('dob', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Address</label>
				       	           <div class="col-lg-8">

				       	   <?php if(!empty($records)):  ?>

				       <?php echo form_input(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>set_value('address', $records->address)]);  ?>

				         <?php else:  ?>

                          <?php echo form_input(['name'=>'address', 'class'=>'form-control', 'placeholder'=>'Address', 'value'=>set_value('address')]);  ?>

				         <?php endif; ?>


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				           <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Married To:</label>
				       	           <div class="col-lg-8">

				       <?php if(!empty($records)):  ?>

			        <?php echo form_input(['name'=>'married_to', 'class'=>'form-control', 'placeholder'=>'Married To', 'value'=>set_value('married_to', $records->married_to)]);  ?>

			           <?php else:  ?>

                          <?php echo form_input(['name'=>'married_to', 'class'=>'form-control', 'placeholder'=>'Married To', 'value'=>set_value('married_to')]);  ?>


				         <?php endif; ?>


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('address', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				         <br/>

						    <div class="form-group">
						      <div class="col-lg-10 col-lg-offset-2">

						      <?php if(!empty($records)):  ?>
                              
                              <!--<?php //echo form_submit(['value'=>'Update', 'class'=>'btn btn-primary']); ?>-->
						       <!--  <?php //echo form_reset(['value'=>'Clear', 'class'=>'btn btn-default']); ?>-->
                               
                              <?php else:  ?>  

                               <?php echo form_submit(['value'=>'Save', 'class'=>'btn btn-primary']); ?>
						         <?php echo form_reset(['value'=>'Clear', 'class'=>'btn btn-default']); ?>

				             <?php endif; ?>

						      </div>
						    </div>

	           </div>

       </div>
       <!-- closes the FORM FOR THE SPOUSE PROFILE DATA   -->

<?php echo form_close();  ?>

</div>


<?php include('footer.php'); ?>