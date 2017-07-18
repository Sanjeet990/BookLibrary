<?php

Class adminController Extends baseController {

public function index()
{
	header("LOCATION: /404.html");
} 

public function login() {
		$site = new Site();
		
		$settings = $site->getSettings();
		$msg = "";
		$error_text = "";
		
		if($_POST)
		{
			$username = mysql_real_escape_string($_POST['username']) or $error_text .= "<li>Username not supplied</li>";
			$password = mysql_real_escape_string($_POST['password']) or $error_text .= "<li>Password not supplied</li>";
			
			
			if(!$error_text)
			{
				$admin = new admin();
				$login = $admin->doLogin($username, $password);
				
				if($login)
				{
					$_SESSION['islogged'] = 'yes';
					$_SESSION['loggedas'] = 'admin';
					$_SESSION['loggedid'] = 'admin';
					header("LOCATION: /admin/dashboard.html");
				}else{
					$error_text .= "<li>Invalid login details.</li>";
				}
			}
			
			if($error_text)
			{
				$msg = '<div class="alert alert-danger">
						 <div class="container-fluid">
							 <b>Please correct following errors:</b><br /><br />'.$error_text.'
						</div>
					</div>';
			}
		}
		
		$this->registry->template->settings = $settings;
		$this->registry->template->message = $msg;
		
        $this->registry->template->show('admin/index');
}

public function dashboard() {
		
		$site = new Site();
		$student = new Student();
		$student->cookieLogin();
		$student->forNonLogged();
		
		$settings = $site->getSettings();
		$quotation = $site->getQuotation();
		
		$this->registry->template->settings = $settings;
		$this->registry->template->quotation = $quotation;
		$this->registry->template->footer = $site->getFooter();
		$this->registry->template->menu = $site->getMenu();
		$this->registry->template->searchmodal = $site->getSearchModal();
        
		$this->registry->template->show('admin/dashboard');
}



public function logout()
{
	session_destroy();
	header("LOCATION: /admin/dashboard.html");
}

}

?>
