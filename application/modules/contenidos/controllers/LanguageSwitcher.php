<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LanguageSwitcher extends MX_Controller{

    public function __construct() {
        parent::__construct();     
    }
 
    function switchLang($language = "") {
        
        $language = ($language != "") ? $language : "english";
        $this->session->set_userdata('site_lang', $language);

        switch ($this->session->userdata('site_lang')){
            case 'spanish': $this->session->set_userdata("idioma_id", 1);   break;
            case 'english': $this->session->set_userdata("idioma_id", 2);   break;            
            default:        $this->session->set_userdata("idioma_id", 1);   break;
        }
        
        //redirect($_SERVER['HTTP_REFERER']);
        redirect(site_url());
        
    }
    
}