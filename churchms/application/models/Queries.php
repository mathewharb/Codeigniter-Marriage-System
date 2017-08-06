<?php  


class Queries extends CI_Model{

        public function login_user($username, $password){

        	$query=$this->db->where(['username'=>$username, 'password'=>$password])

        	           ->get('users');

        	              if ($query->num_rows() >0) {

        	              	 return $query->row()->user_id;
        	              	
        	              }


        }


         public function getUserRole(){

              $query=$this->db->where(['role_name'=>'Marriage'])

        	           ->get('user_role');

        	              if ($query->num_rows() >0) {

        	              	 return $query->row()->id;
        	              	
        	              }  

         }

         public function addMarriage($data){

                  return $this->db->insert('users', $data);

         }

         public function getAllUsers($limit, $offset){

             $this->db->select(['users.user_id', 'users.name', 'users.username', 'user_role.role_name']);
             $this->db->from('users');
             $this->db->join('user_role', 'user_role.id=users.user_role_id');
             $this->db->limit($limit, $offset);
             $query = $this->db->get();
             return $query->result();


         }
        
        public function get_num_rows(){

            //get the number of rows from our database 
            //by selecting all the records from our table
            //and return the count of all the rows
             $query = $this->db->get('users');
             //returns the number of rows present in the users table
             return $query->num_rows();
        }

        public function getmarriageList($limit, $offset){

            $this->db->select(['users.user_id', 'users.name', 'users.username', 'user_role.role_name']);
             $this->db->from('users');
             $this->db->join('user_role', 'user_role.id=users.user_role_id');
             $this->db->where(['users.user_role_id'=>'2']);
             $this->db->limit($limit, $offset);
             $query = $this->db->get();

             return $query->result();

          
      }

       public function get_marriage_num_rows(){

                        $this->db->select(['users.user_id', 'users.name', 'users.username', 'user_role.role_name']);
             $this->db->from('users');
             $this->db->join('user_role', 'user_role.id=users.user_role_id');
             $this->db->where(['users.user_role_id'=>'2']);
             $query = $this->db->get();

             return $query->num_rows();

        }

        public function searchRecord($query){

            $this->db->select(['users.user_id', 'users.name', 'users.username', 'user_role.role_name']);
             $this->db->from('users');
             $this->db->join('user_role', 'user_role.id=users.user_role_id');
             $this->db->like('name', $query);
             $query = $this->db->get();
             return $query->result();



        }

        //function that gets the personal details from the database

        public function getMarriageRecords($marriage_id){
            $query=$this->db->where(['user_id'=> $marriage_id])

                          ->get('users');

                   if ($query->num_rows() > 0) {

                       return $query->row();
                       
                   }



        }

        //function that inserts the image and records of the marriage personal details

        public function insertMemPersonalDetails($data){
               
               return $this->db->insert('spouse_details', $data);

        }

        //retrieves the personal details record and populates it when the record is clicked
        public function getMemPersonalDetails($marriage_id){

            $query=$this->db->where(['user_id'=>$marriage_id])
                          ->get('spouse_details');

                              if ($query->num_rows() > 0) {

                           return $query->row();
                           
                       }
        }


        public function insertMemParentDetails($data){

         return $this->db->insert('spouse_parental', $data);

        }
       
       public function getMemParentDetails($marriage_id){

            $query=$this->db->where(['user_id'=>$marriage_id])
                          ->get('spouse_parental');

                              if ($query->num_rows() > 0) {

                           return $query->row();
                           
                       }
        }



// saves the church details data into the database
        public function insertChurchDetails($data){

             return $this->db->insert('church_details', $data);


        }


        //displays the churchh record details
        public function getChurchDetails($marriage_id){

                     $query=$this->db->where(['user_id'=>$marriage_id])
                          ->get('church_details');

                              if ($query->num_rows() > 0) {

                           return $query->row();
                           
                       }

        }


        //model that deletes the selected records
        public function deleteMem($userid){
              $this->db->delete('users', ['user_id'=>$userid]);
              $this->db->delete('spouse_details', ['user_id'=>$userid]);
              $this->db->delete('spouse_parental', ['user_id'=>$userid]);
              $this->db->delete('church_details', ['user_id'=>$userid]);

        }

}




 ?>