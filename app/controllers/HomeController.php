<?php 

/**
 * Home Page Controller
 * @category  Controller
 */
class HomeController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		if(strtolower(USER_ROLE) == 'security'){
			$this->render_view("home/security.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'loading'){
			$this->render_view("home/loading.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'lab'){
			$this->render_view("home/lab.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'inventory'){
			$this->render_view("home/inventory.php" , null , "main_layout.php");
		}
		elseif(strtolower(USER_ROLE) == 'commercial'){
			$this->render_view("home/commercial.php" , null , "main_layout.php");
		}
		else{
			$this->render_view("home/index.php" , null , "main_layout.php");
		}
	}
}
