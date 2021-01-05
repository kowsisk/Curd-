<?php 

class Welcome extends CI_Controller {
    
    public function add_user()
    {
        //insert or update code
        $this->session->set_flashdata('message', 'Successfully Added.');
        $this->load->view('index');
    }
    

}