<?php
class class_userType{
	//Ajoute le type "Client" aux types d'utilisateurs dans la base de donnée !
	public function som_createUserTypes(){
		$result = add_role('client', 'Client', array(
			'read' => true, // True allows that capability
			'edit_posts' => true,
			'delete_posts' => false, // Use false to explicitly deny
		));
		if (null !== $result) {
			echo 'Yay!  New role created!';
		} else {
			//echo 'Oh... the basic_contributor role already exists.';
		}
			$result = add_role('som_admin', 'Administrateur SOM', array(
			'read' => true, // True allows that capability
			'edit_posts' => true,
			'delete_posts' => false, // Use false to explicitly deny
		));
		if (null !== $result) {
			echo 'Yay!  New role created!';
		} else {
			//echo 'Oh... the basic_contributor role already exists.';
		}
	}
	//Enleve le type "Client" aux types d'utilisateurs de la base de donnée !
	public function som_deleteUserTypes(){
		remove_role('client');
		remove_role('som_admin');
	}
}
/*Cette classe contient toutes les fonctions utiles à l'utilisateur en Front-End*/
class class_userProfil{
	/*Add Public User Profil*/
	public function viewUserProfil(){
		include(dirname(__FILE__). '/../views/users/user_profil.php');
	}
	/*Modify Public User Profil*/
	public function modifyUserProfil(){
		include(dirname(__FILE__). '/../views/users/modify_user_profil.php');
	}
}
