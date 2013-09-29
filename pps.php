<?php
/*
Plugin Name: PPS
Description: Maquette PPS
Author: Valls y Machinant David
Author URI: http://www.valls.be
Description: PPS Development Plugin
Version: 0.2
License: ALL RIGHT RESERVED Valls y Machinant David
*/
	/*Constante utilisée pour différencier le plugin par son NOM*/
	define("CONST_PLUGIN_NAME", "PPS18");
	$siteurl = get_option('siteurl');
	$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__));
	$url_style = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/pps_style.css';
/*
	echo dirname(__FILE__) .'somclass/administration.php';
	echo'<br>';
	echo dirname(__FILE__) .'somclass/users.php';
	*/
	include_once dirname(__FILE__) .'/class/administration.php';
	include_once dirname(__FILE__) .'/class/users.php';
	
	function som_uninstall(){
		try{
			$somclass_users = new somclass_users();
		} catch (Exception $e) {
			var_dump($e);
		}
		$somclass_users->som_deleteUserTypes();
	}
	
	
	//Create new instance of class
    $object_adminPanel = new class_administration();

	//Actions and Filters

	//Administration Actions
	add_action('admin_menu', array(&$object_adminPanel,'configureMenu'));
	add_action('admin_head', array(&$object_adminPanel,'som_css_javascript'));
	

	//$class_addUsers = new class_addUsers();
	/*When plugin is activated :*/
	//register_activation_hook(__FILE__, array(&$somclass_users,'som_createUserTypes') );
	/*When plugin is desactivated :*/
	//register_deactivation_hook(__FILE__, 'som_uninstall' );
	
	/*Load User Profil ShortCodes*/
	$object_userProfil = new class_userProfil();
	add_shortcode('viewUserProfil', array(&$object_userProfil,'viewUserProfil'));
	add_shortcode('modifyUserProfil', array(&$object_userProfil,'modifyUserProfil'));
?>