<?php 
    class Marriage extends CI_Controller{

    	  public function index(){
    	  	
    	  }
          
          public function addMarriage(){

           $this->load->model('Queries');
           $result=$this->Queries->getUserRole();

           $this->load->view('addMarriage', ['result'=>$result]);

          }

          public function insertMarriage(){

          	    $this->form_validation->set_rules('name', 'Name', 'required');
               $this->form_validation->set_rules('username', 'Serial / ID', 'required|is_unique[users.username]');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('user_role_id', 'Role / Designation', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>' );
               
                if ($this->form_validation->run()){


                	$data=$this->input->post();
                   	$this->load->model('Queries');

                	   if ($this->Queries->addMarriage($data)) {
                	   	   $this->session->set_flashdata('record_add', 'Record Added Successfully ');
                	   	
                	   }
                	    else{
                              $this->session->set_flashdata('record_add', 'Failed to add Record');
                	    }

                	    return redirect('dashboard');

                }

                else{

                    $this->addMarriage();

                }


          }

          //the marriageList page
          public function marriageList(){
           //now create a view to load from here

          //after creating the view page, call it with the code below

            $this->load->model('Queries');
             //pagination: "load the librayr"
            $this->load->library('pagination');

            //next create a config array for the pagination
            $config=[
                //keep all the details regarding the pagination
                 'base_url'=>base_url("marriage/marriageList"),
                 'per_page' =>5,
                 'total_rows' =>$this->Queries->get_marriage_num_rows(),
                 'uri_segment' => 3,
                 'full_tag_open'=>"<ul class='pagination' >",
                 'full_tag_close'=>"</ul>",
                 'next_tag_open'=>'<li>',
                 'next_tag_close'=>'</li>',
                 'prev_tag_open'=>'<li>',
                 'prev_tag_close'=>'</li>',
                 'num_tag_open'=>'<li>',
                 'num_tag_close'=>'</li>',
                 'cur_tag_open'=>"<li class='active'><a>",
                 'cur_tag_close'=>'</a></li>',

            ];
            //initialize this array
            $this->pagination->initialize($config);


            $result=$this->Queries->getmarriageList($config['per_page'], $this->uri->segment(3) );
            $this->load->view('marriageList', ['result'=>$result]);
          }


          public function memPersonalDetails($marriage_id){

            $this->load->model('Queries');
            $result=$this->Queries->getMarriageRecords($marriage_id);

           $records= $this->Queries->getMemPersonalDetails($marriage_id);
        
            $this->load->view('memPersonalDetails', ['result'=>$result, 'records'=>$records]) ;
          }


         public function addPersonalDetails($marriage_id){

          //image upload
                $config=[

                 'upload_path'=>'./uploads/',
                 'allowed_types'=>'gif|jpg|png'
                ];
                
               
                $this->load->library('upload', $config);

             //set the user validations
          $this->form_validation->set_rules('username', 'Serial or ID', 'required|is_unique[spouse_details.username]');
                $this->form_validation->set_rules('first_name', 'First Name', 'required');
                $this->form_validation->set_rules('last_name', 'Surname', 'required');
               // $this->form_validation->set_rules('gender', 'Gender', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>' );


                if ($this->form_validation->run()  && $this->upload->do_upload('avatar'))

                {
                     $data=$this->input->post();
                     $upload_info=$this->upload->data();
                    $path=base_url("uploads/". $upload_info['raw_name'].$upload_info['file_ext']);

                    $data ['avatar']= $path;
                    
                    $this->load->model('Queries');
                    $date=explode('/', $data['dob']);
                    $data['dob']=$date[2].'/'.$date[0].'/'.$date[1];

                        if ($this->Queries->insertMemPersonalDetails($data)) {
                         
                          $this->session->set_flashdata('record_add', 'Record Added Successfully');
                        }
                         else{

                            $this->session->set_flashdata('record_add', 'Failed to Add Spouse Record');

                         }

                          return redirect('dashboard');

                   }


                  else

                  {

                    $upload_error=$this->upload->display_errors();

                  $this->memPersonalDetails($marriage_id);
                   // echo validation_errors();

                  } 

                 

         }

         public function memParentDetails($marriage_id){

                 $this->load->model('Queries');

                 $result=$this->Queries->getMarriageRecords($marriage_id);
                  
                  $records=$this->Queries->getMemParentDetails($marriage_id);
                  
                  $profile_pic=$this->Queries->getMemPersonalDetails($marriage_id);

          $this->load->view('memParentDetails', ['result'=>$result, 'records'=>$records,'profile_pic'=>$profile_pic]);

         }

         public function addParentDetails($marriage_id){

                $this->form_validation->set_rules('mans_parents', 'Man\'s Parents', 'required');
               // $this->form_validation->set_rules('username', 'Serial / ID', 'required|is_unique[users.username]');
                $this->form_validation->set_rules('womans_parents', 'Woman\'s Parents', 'required');
                //$this->form_validation->set_rules('user_role_id', 'Role / Designation', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>' );
               
                if ($this->form_validation->run())

                {
                 $data=$this->input->post();
                 $this->load->model('Queries');

                         if ($this->Queries->insertMemParentDetails($data)) {
                          $this->session->set_flashdata('record_add', 'Parent Details Added Successfully');

                         }
                         else{

                          $this->session->set_flashdata('record_add', 'Failed To Add Parent Details');

                         }
                         return redirect('dashboard');
                }
                 
                else{

                  $this->memParentDetails($marriage_id);
                }

               

         }


         public function memChurchDetails($marriage_id){

                $this->load->model('Queries');

                 $result=$this->Queries->getMarriageRecords($marriage_id);
                 $records=$this->Queries->getChurchDetails($marriage_id);
                
                $profile_pic=$this->Queries->getMemPersonalDetails($marriage_id);

                $this->load->view('memChurchDetails', ['result'=>$result, 'records'=>$records, 'profile_pic'=>$profile_pic]);



         }


         public function addChurchDetails($marriage_id){
          
                $this->form_validation->set_rules('marriage_date', 'Date of Marriage', 'required');
                $this->form_validation->set_rules('priest', 'Priest', 'required');
                $this->form_validation->set_rules('witnesses', 'Witnesses', 'required');
              

                if ($this->form_validation->run())
                {
                    $data=$this->input->post();
                    $this->load->model('Queries'); 

                    $date=explode('/', $data['marriage_date']);
                    $data['marriage_date']=$date[2].'/'.$date[0].'/'.$date[1]; 

                            if ($this->Queries->insertChurchDetails($data)) {
                          $this->session->set_flashdata('record_add', 'Church Details Added Successfully');

                         }
                         else{

                          $this->session->set_flashdata('record_add', 'Failed To Add Church Details');

                         }
                         return redirect('dashboard');
                

                }

                else
                {

                   $this->memChurchDetails($marriage_id);  

                }
 

         }


         public function deleteMember(){

          $this->load->model('Queries');

              foreach ($_POST['user_id'] as $userid) {

               $this->Queries->deleteMem($userid);

              }

              return redirect('dashboard');

          

         }

  
    }



?>