<?php
if ( ! defined( 'WPINC' ) ) {
    die;
}

include_once( DT_FIW_HOME_DIR . '/framework/class-toolbox.php' ); 

//Include files in "includes" folder
DFIW_tb::include_folder( "inc/" , "php" );

class devons_tools_core {
    
    //All actions to be performed goes here. 
    public function __construct(){
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_css') );
        add_action( 'wp_enqueue_scripts', array($this, 'enqueue_js') );

        add_action( 'admin_print_scripts', array($this, 'enqueue_js_admin') );
        add_action( 'admin_print_styles', array($this, 'enqueue_css_admin') );
    }
    
    //Enqeue any css for the front end. 
    public function enqueue_css(){
		DFIW_tb::include_folder( "css/" , "css" ); 
    }

    //Enqeue any css for dashboard.
    public function enqueue_css_admin(){
		DFIW_tb::include_folder( "css/admin/" , "css" ); 
    }    

    //Enqeue any js for the front end/
    public function enqueue_js(){ 
		DFIW_tb::include_folder( "js/" , "js" ); 
    }

    //Enqeue any js for dashboard.
    public function enqueue_js_admin(){
		DFIW_tb::include_folder( "js/admin/" , "js" ); 	
    }
}

$dhg_core = new devons_tools_core();