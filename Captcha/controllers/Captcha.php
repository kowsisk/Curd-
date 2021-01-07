<?php 
defined('BASEPATH') OR 
    exit('No direct script access allowed');
/**
 * Version: 1.0.0
 *
 * Description of Captcha Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 *
 **/

// Captcha class
class Captcha extends CI_Controller {
    function __construct() {
        parent::__construct(); 
        // Load the captcha helper
        $this->load->helper('captcha');
        $this->load->library('session');
    }
    // index
    public function index(){
        $data = array();
        $data['metaDescription'] = 'Build Captcha in CodeIgniter using Captcha Helper';
        $data['metaKeywords'] = 'Build Captcha in CodeIgniter using Captcha Helper';
        $data['title'] = "Build Captcha in CodeIgniter using Captcha Helper";
        $data['breadcrumbs'] = array('Build Captcha in CodeIgniter using Captcha Helper' => '#');
        // If captcha form is submitted
        if($this->input->post('submit')) {
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            

            if($inputCaptcha == $sessCaptcha){
                $data['msg'] = '<div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> Captcha code matched.
                </div>';
            }else{
                 $data['msg'] = '<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Failed!</strong> Captcha does not match, please try again.
                </div>  ';
            }
        }
        // Captcha configuration
        $config = array(
            'img_path'      => 'assets/uploads/captcha_images/',
            'img_url'       => base_url().'assets/uploads/captcha_images/',
            'font_path'     => 'index.php\system\fonts\texb.ttf',
            'img_width'     => 170,
            'img_height'    => 55,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 25,
           
           
                
            'colors'        => array(
                'background' => array(171, 194, 177),
                'border' => array(10, 51, 11),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
                 /*'word' => 'Random word',
    'img_path' => './captcha/',
    'img_url' => 'http://example.com/captcha/',
    'font_path' => './path/to/fonts/texb.ttf',
    'img_width' => '150',
    'img_height' => 30,
    'expiration' => 7200*/
       )  
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode', $captcha['word']);
        // Pass captcha image to view
        $data['captchaImg'] = $captcha['image'];
        // Load the view
        $this->load->view('index', $data);
    }
    // refresh
    public function refresh(){
        // Captcha configuration
         $config = array(
            'img_path'      => 'assets/uploads/captcha_images/',
            'img_url'       => base_url().'assets/uploads/captcha_images/',
            'font_path'     => 'index.php/system/fonts/texb.ttf',
            'img_width'     => 170,
            'img_height'    => 55,
            'expiration'    => 7200,
            'word_length'   => 6,
            'font_size'     => 25,
            'colors'        => array(
                'background' => array(171, 194, 177 ),
                'border' => array(10, 51, 115),
                'text' => array(0, 0, 0),
                'grid' => array(185, 234, 237)
            )
        );
        $captcha = create_captcha($config);
        // Unset previous captcha and set new captcha word
        $this->session->unset_userdata('captchaCode');
        $this->session->set_userdata('captchaCode',$captcha['word']);
        // Display captcha image
        echo $captcha['image'];
    }
}