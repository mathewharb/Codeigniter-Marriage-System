<?php include('header.php'); ?>

<div class="container">

<!--FORM FOR THE SPOUSE PROFILE DATA  -->
<?php  echo form_open_multipart("marriage/addChurchDetails/{$result->user_id}", ['clas'=>'form-horizontal']);    ?>

        <?php echo form_hidden('user_id', $result->user_id);  ?>
       <!--  <?php //echo form_hidden('user_role_id', $result->user_role_id);  ?>-->

       <div class="row">
	           <div class="col-lg-3">

	           	<legend>Marriage Details</legend>

	           	<?php // print_r($records); ?>

		           	    <div class="list-group">

		           	

			            <?php if (!empty($profile_pic)): ?>

			            	<a href="#" class="thumbnail" >
			               <img src="<?php echo $profile_pic->avatar; ?>"  style="width:248px; height: 190px;" /> 

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

                             <li class=""><a href="<?php echo base_url("marriage/memPersonalDetails/{$result->user_id}");  ?>">Spouse Personal Details</a></li>

							 <li class=""><a href="<?php echo base_url("marriage/memParentDetails/{$result->user_id}");  ?>">Parent Details</a></li>

							 <li class="active"><a href="<?php echo base_url("marriage/memChurchDetails/{$result->user_id}");  ?>">Church Details</a></li>
							  
							</ul>

		           	    </div>
	           </div>

	           <div class="col-lg-9">
	           	<legend>Church Details</legend>
                   
				                   
                                      <div class="row">
						       	      <div class="col-lg-6">
						       	        <div class="form-group">
						       	           <label  for="inputEmail" class="col-lg-4 control-label ">Notification:</label>
						       	           <div class="col-lg-8">
                                            
                                            <?php if(!empty($records)):  ?>

                                             
                                            <select class="form-control" name="notifications">
						                   	<option><?php echo $records->notifications; ?></option>
						                   	<option value="bans">Bans</option>
						                   	<option value="licence">Licence</option>

						                   </select>

						                   <?php else:  ?>
				        	                
				        	               <select class="form-control" name="notifications">
						                   	<option></option>
						                   	<option value="bans">Bans</option>
						                   	<option value="licence">Licence</option>

						                   	</select>

						                   <?php endif; ?>
				             

						                </div>
						                </div>
						              </div>
						                 <div class="col-lg-6"> 
						                  
						              <?php echo form_error('notifications', '<div class="text-danger">', '</div>'); ?>

						                 
						          </div>
						   </div>

				                  

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Impediment: </label>
				       	           <div class="col-lg-8">

                                <?php if(!empty($records)):  ?>


				        	 <?php echo form_input(['name'=>'impediments', 'class'=>'form-control', 'placeholder'=>'Impediment', 'value'=>set_value('impediments', $records->impediments)]);  ?>
				                
                                  <?php else:  ?>
				        	                
				        	 <?php echo form_input(['name'=>'impediments', 'class'=>'form-control', 'placeholder'=>'Impediment', 'value'=>set_value('impediments')]);  ?>

						         <?php endif; ?>


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('impediments', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				            
                              
                              <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Date of Marriage:</label>
				       	           <div class="col-lg-8">
               
                              <?php if(!empty($records)):  ?>

                              <?php echo form_input(['name'=>'marriage_date', 'class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'Marriage Date', 'value'=>set_value('marriage_date', $records->marriage_date)]);  ?>


                                 <?php else:  ?>
				        	                
				        	 <?php echo form_input(['name'=>'marriage_date', 'class'=>'form-control', 'id'=>'datepicker', 'placeholder'=>'Marriage Date', 'value'=>set_value('marriage_date')]);  ?>

						         <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('marriage_date', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Priest(s):</label>
				       	           <div class="col-lg-8">
                           
                           <?php if(!empty($records)):  ?>
				      
                          <?php echo form_input(['name'=>'priest', 'class'=>'form-control', 'placeholder'=>'Names of the Priests', 'value'=>set_value('priest', $records->priest)]);  ?>
                            
                            <?php else:  ?>
				        	                
				        	 <?php echo form_input(['name'=>'priest', 'class'=>'form-control', 'placeholder'=>'Names of the Priests', 'value'=>set_value('priest')]);  ?>

						         <?php endif; ?>
				       

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('priest', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				           <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Witnesses:</label>
				       	           <div class="col-lg-8">
                                   
                           <?php if(!empty($records)):  ?>
				      
                          <?php echo form_input(['name'=>'witnesses', 'class'=>'form-control', 'placeholder'=>'Names of Witnesses', 'value'=>set_value('witnesses', $records->witnesses)]);  ?>
                          
                          <?php else:  ?>
				        	                
                          <?php echo form_input(['name'=>'witnesses', 'class'=>'form-control', 'placeholder'=>'Names of Witnesses', 'value'=>set_value('witnesses')]);  ?>

						   <?php endif; ?>

				         


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                  <?php echo form_error('witnesses', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				         <br/>

						    <div class="form-group">
						      <div class="col-lg-10 col-lg-offset-2">

						    
                               <?php if(!empty($records)): ?>


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