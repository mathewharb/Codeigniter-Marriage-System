<?php  

class Dashboard extends CI_Controller{

	     public function index(){

if(!$this->session->userdata('user_id')){
            return redirect('login');

          }
           elseif ($this->session->userdata('user_id') !=1) {
                 $this->load->view('memdashboard');
           }

    else{

          	$this->load->model('Queries');

            //pagination: "load the librayr"
            $this->load->library('pagination');

            //next create a config array for the pagination
            $config=[
                //keep all the details regarding the pagination
                 'base_url'=>base_url("dashboard/index"),
                 'per_page' =>5,
                 'total_rows' =>$this->Queries->get_num_rows(),
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

            //pass the config parameter
          	$result=$this->Queries->getAllUsers($config['per_page'], $this->uri->segment(3));

          	$this->load->view('dashboard', ['result'=>$result]);
          }

	     	
	     }


       //function for the search dashboard
       public function search(){

               $this->form_validation->set_rules('query', 'Query', 'required');
                $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>' );

                if ($this->form_validation->run() )

                {  
                  
                  $query=$this->input->post('query');
                  $this->load->model('Queries');
                  $record=$this->Queries->searchRecord($query);
                  $this->load->view('searchUser', ['record'=>$record]);
                }

                else{
                  //display the error in the dashboard page

                  return $this->index();
                }

       }
}


?>