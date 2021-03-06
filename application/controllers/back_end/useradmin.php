<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* USer Admin pages Function
 *    Add User
 *      -N
 *    Deleter User
 *      -
 */
class Useradmin extends CI_Controller {
   
    public function addUser(){
        	$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
                $this->load->model('Useradmin_model');
$this->output->enable_profiler(TRUE);

  $this->form_validation->set_rules("first_name","First Name","required|alpha");
  $this->form_validation->set_rules("last_name","Last  Name","required|alpha");
 

  $this->form_validation->set_rules("phone","Phone","alpha_dash");
  $this->form_validation->set_rules("email","Email","valid_email");
  $this->form_validation->set_rules("postion","Position","valid_email");
  
  $this->form_validation->set_rules("username","Username","required|alpha_numeric|is_unique[User_T.User_name]");
  $this->form_validation->set_rules("password","Password","required|alpha_numeric|matches[password_check");
  $this->form_validation->set_rules("user_type","User Type","require|alpha");
  
		if ($this->form_validation->run() == FALSE) 
                    {
        	$this->load->view('defaultPageHeader');
                $this->load->view('addUserForm');
                $this->load->view('defaultPageFooter');
                    }
                else
                {
                     //Load data base. print success page.
                    $form_data_staff = 
                           array('First_Name' => $this->input->post('first_name'),
   				'Last_Name' => $this->input->post('last_name'),
   				'Phone' => $this->input->post('phone'),
                                'Email' => $this->input->post('email'),
   				'Position' => $this->input->post('position'));
                    
   		     $form_data_user = 
                           array('User_Name' => $this->input->post('username'),
   				'User_Password' => $this->input->post('passw0rd'),
   				'User_Type' => $this->input->post('user_type')
			//	'uUserID' => $this->Rsupm->_getUserID()) ;
                     );
                     $this->Useradmin_model->addUserToDB($form_data_user,$form_data_staff);
                     echo "hello";
                }
    }
}
?>