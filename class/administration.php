<?php
class class_administration {
	public  function adminPanel(){
		//echo(dirname(__FILE__). '/../views/som_adminPanel.php');
		include(dirname(__FILE__). '/../views/adminPanel.php');
	}
	
	function configureMenu() {
		$appName = CONST_PLUGIN_NAME;
		$appID = $appName.'_plugin';
		// Usage : add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
		// Usage : add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function ); 
		
		/*Si l'utilisateur est administrateur spécial du plugin*/
		if ( current_user_can('som_admin') ) {
			add_menu_page($appName, $appName, 'administrator', $appID, array(&$this,'adminPanel'));
			add_submenu_page( $appID,'Options générales','Options générales ','administrator','plugin_basic_options', array(&$this,'adminPanelBasicOptions'));
			add_submenu_page( $appID,'Mes Produits','Mes Produits','administrator','plugin_product_options', array(&$this,'adminPanelProductOptions'));
		}
		else {
			// Ajouter le panneau d'administration SOM si l'utilisateur est administrateur du WordPress
			add_menu_page($appName, $appName, 'administrator', $appID, array(&$this,'adminPanel'));
			add_submenu_page( $appID,'Options générales','Options générales ','administrator','plugin_basic_options', array(&$this,'adminPanelBasicOptions'));
			add_submenu_page( $appID,'Profils clients','Profils clients','administrator','plugin_clients_profils', array(&$this,'adminPanelClientsProfils'));
		}
	}
	//Sous menu : Options générales
	public function adminPanelBasicOptions(){
		include(dirname(__FILE__). '/../views/adminPanelBasicOptions.php');
	}
	//Sous menu : Profils clients
	public function adminPanelClientsProfils(){
		include(dirname(__FILE__). '/../views/adminPanelClientsProfils.php');
	}
	//Insère le CSS du paneau d'administration
	public function css_javascript() {
		/*Remplacer PPS-Dev par la Constante et nommer le dossier du plugin comme la Constante CONST_PLUGIN_NAME*/
		echo '<link href="'. WP_PLUGIN_URL .'/PPS-Dev/style.css" rel="stylesheet" type="text/css" />';
	}
}
