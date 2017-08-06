<?php include('header.php'); ?>

<div class="container">

<!--FORM FOR THE SPOUSE PROFILE DATA  -->
<?php  echo form_open_multipart("marriage/addParentDetails/{$result->user_id}", ['clas'=>'form-horizontal']);    ?>

       <?php echo form_hidden('user_id', $result->user_id);  ?>
         <!--<?php //echo form_hidden('user_role_id', $result->user_role_id);  ?>-->

      

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

							 <li class="active"><a href="<?php echo base_url("marriage/memParentDetails/{$result->user_id}");  ?>">Parent Details</a></li>

							 <li class=""><a href="<?php echo base_url("marriage/memChurchDetails/{$result->user_id}");  ?>">Church Details</a></li>
							  
							</ul>

		           	    </div>
	           </div>

	           <div class="col-lg-9">
	           	<legend>Details Of Parents</legend>
                   
				                   <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Man's Parents:</label>
				       	           <div class="col-lg-8">
                                 
                                 <?php if(!empty($records)): ?>
				       	
				        	 <?php echo form_input(['name'=>'mans_parents', 'class'=>'form-control', 'placeholder'=>'Name of Man\'s Parents', 'value'=>set_value('mans_parents', $records->mans_parents)]);  ?>

				        	     <?php else:  ?>
				        	   <?php echo form_input(['name'=>'mans_parents', 'class'=>'form-control', 'placeholder'=>'Name of Man\'s Parents', 'value'=>set_value('mans_parents')]);  ?>

				        	     <?php endif; ?>

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                 <?php echo form_error('mans_parents', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Address:</label>
				       	           <div class="col-lg-8">

                              <?php if(!empty($records)): ?> 

				        	 <?php echo form_input(['name'=>'address_one', 'class'=>'form-control', 'placeholder'=>'Address of Parents', 'value'=>set_value('address_one', $records->address_one)]);  ?>
				               
				               <?php else:  ?>
				        	   <?php echo form_input(['name'=>'address_one', 'class'=>'form-control', 'placeholder'=>'Address of Parents', 'value'=>set_value('address_one')]);  ?>

				        	     <?php endif; ?>

                              
				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                 <!-- <?php //echo form_error('address_one', '<div class="text-danger">', '</div>'); ?>-->

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Woman's Parents</label>
				       	           <div class="col-lg-8">

				       	         <?php if(!empty($records)): ?>
                        
				        	 <?php echo form_input(['name'=>'womans_parents', 'class'=>'form-control', 'placeholder'=>'Name of Woman\'s Parents', 'value'=>set_value('womans_parents', $records->womans_parents)]);  ?>

                                <?php else:  ?>
				        	   
				        	   <?php echo form_input(['name'=>'womans_parents', 'class'=>'form-control', 'placeholder'=>'Name of Woman\'s Parents', 'value'=>set_value('womans_parents')]);  ?>
				        	    
				        	     <?php endif; ?>


				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                 <?php echo form_error('womans_parents', '<div class="text-danger">', '</div>'); ?>

				                 </div>
				          </div>

				                  <div class="row">
				       	      <div class="col-lg-6">
				       	        <div class="form-group">
				       	           <label  for="inputEmail" class="col-lg-4 control-label ">Address: </label>
				       	           <div class="col-lg-8">
  
                               <?php if(!empty($records)): ?>
				       	 
				        	 <?php echo form_input(['name'=>'address_two', 'class'=>'form-control', 'placeholder'=>'Address of Woman\'s Parents', 'value'=>set_value('address_two', $records->address_two)]);  ?>

				        	   <?php else:  ?>
				        	   
				        	   <?php echo form_input(['name'=>'address_two', 'class'=>'form-control', 'placeholder'=>'Address of Woman\'s Parents', 'value'=>set_value('address_two')]);  ?>
				        	    
				        	     <?php endif; ?>
				        

				              </div>
				                </div>
				                 </div>
				                 <div class="col-lg-6"> 
				                  
				                 <!-- <?php// echo form_error('address_two', '<div class="text-danger">', '</div>'); ?>-->

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