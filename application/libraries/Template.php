<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Template {
	var $ci;
         
   	function __construct() {
            $this->ci =& get_instance();
    }
	
	//This is HMVC framework
	
	function load($tpl_view, $body_view = null, $data = null) {
		
		$header ='themes/'.$tpl_view.'/header.php';
		$sidebar ='themes/'.$tpl_view.'/sidebar.php';
		$content = $tpl_view.'/'.$body_view;
		$footer ='themes/'.$tpl_view.'/footer.php';
		$this->ci->load->view($header, $data);
		$this->ci->load->view($sidebar, $data);
		$this->ci->load->view($content, $data);
		$this->ci->load->view($footer, $data);
	}

	function getpage($tpl_view, $body_view = null, $data = null) {
		
		$header ='themes/'.$tpl_view.'/header.php';
		$content = $tpl_view.'/'.$body_view;
		$footer ='themes/'.$tpl_view.'/footer.php';
		$Template = $this->ci->load->view($header, $data ,true);
		$Template = $Template.$this->ci->load->view($content, $data ,true);
		$Template = $Template.$this->ci->load->view($footer, $data ,true);
		return $Template;

	}
	
	//  This is for non HMVC framwork 

    function load1( $tpl_view, $body_view = null, $data = null) {
		if ( ! is_null( $body_view ) ) 
		{
			
			if ( file_exists( APPPATH.'views\themes\\'.$tpl_view.'\\'.$body_view ) ) 
			{
				
				//$body_view_path ='themes/'.$tpl_view.'/'.$body_view;
				$header ='themes/'.$tpl_view.'/header.php';
				$content = $body_view;
				$header ='themes/'.$tpl_view.'/footer.php';
				$this->ci->load->view($header, $data);
				//$this->ci->load->view($content, $data);
				$this->ci->load->view($footer, $data);
				
			}
			else if ( file_exists( APPPATH.'views\themes\\'.$tpl_view.'\\'.$body_view.'.php' ) ) 
			{
				
				$body_view_path = 'themes/'.$tpl_view.'/'.$body_view.'.php';
			}
			else if ( file_exists( APPPATH.'views/'.$body_view ) ) 
			{
				
				$body_view_path = $body_view;
			}
			else if ( file_exists( APPPATH.'views/'.$body_view.'.php' ) ) 
			{
				$body_view_path = $body_view.'.php';
			}
			else
			{
				show_error('Unable to load the requested file: ' . $tpl_view.'/'.$body_view.'.php');
			}
			 
			//$body = $this->ci->load->view($body_view_path, $data, TRUE);
			 
		
		}
		 
		$this->ci->load->view($body_view_path, $data);
	}

	function check_validation()
	{
		$obj=&get_instance();
		
		if(validation_errors())
		{
			echo '<div class="container"><div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button><p><i class="glyphicon glyphicon-ban-circle"></i> '.validation_errors().'</p></div></div>';
		}

		if($obj->session->flashdata('error'))
		{
			echo '<div class="container"><div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button><p><i class="glyphicon glyphicon-ban-circle"></i> '.$obj->session->flashdata('error').'</p></div></div>';
		}

		if($obj->session->flashdata('success'))
		{
			echo '<div class="container"><div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button><p><i class="glyphicon glyphicon-ok"></i> '.$obj->session->flashdata('success').'</p></div></div>';
		}

		if($obj->session->flashdata('warning'))
		{
			echo '<div class="container"><div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button><p><i class="glyphicon glyphicon-warning-sign"></i> '.$obj->session->flashdata('warning').'</p></div></div>';
		}

		if($obj->session->flashdata('info'))
		{
			echo '<div class="container"><div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss= "alert">&times;</button><p><i class="glyphicon glyphicon-info-sign"></i> '.$obj->session->flashdata('info').'</p></div></div>';
		}

	}


	
}