<?php

Class indexController Extends baseController {

public function index() {
		
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
        
		$this->registry->template->show('students/index');
		}


public function register() {
		
		$site = new Site();
		$student = new Student();
		$student->cookieLogin();
		
		$student->forNonLogged();
		
		$settings = $site->getSettings();
		
		$error_text = "";
		$msg = "";
		
		if($_POST)
		{
			$name 		= mysql_real_escape_string(@$_POST['full-name']) 	or $error_text .= "<li>No name supplied.</li>";
			$username 	= mysql_real_escape_string(@$_POST['username']) 	or $error_text .= "<li>No username supplied.</li>";
			$password 	= md5(@$_POST['password']) 							or $error_text .= "<li>No password supplied.</li>";
			$rpassword 	= md5(@$_POST['rpassword']) 						or $error_text .= "<li>No repeat password supplied.</li>";
			$roll 		= mysql_real_escape_string(@$_POST['roll']) 		or $error_text .= "<li>No roll no supplied.</li>";
			$session 	= mysql_real_escape_string(@$_POST['session']) 		or $error_text .= "<li>No session supplied.</li>";
			$dept	 	= intval(@$_POST['dept']) 							or $error_text .= "<li>No department supplied.</li>";
			$email	 	= mysql_real_escape_string(@$_POST['email']) 		or $error_text .= "<li>No email supplied.</li>";
			$mobile	 	= mysql_real_escape_string(@$_POST['mobile']) 		or $error_text .= "<li>No mobile supplied.</li>";
			
			if($password && $rpassword)
			{
				if($password != $rpassword) $error_text .= "<li>Passwords doesnot match.</li>";
			}
			if($username)
			{
				if($student->isUsername($username)) $error_text .= "<li>Username already exists.</li>";
			}
			if($email) 
			{
				if($student->isEmail($email)) $error_text .= "<li>Email already exists.</li>";
			}
			if($mobile) 
			{
				if($student->isMobile($mobile)) $error_text .= "<li>Mobile no already exists.</li>";
			}
			
			if($session)
			{
				$session_parts = explode(" - ", $session);
				$session_s = $session_parts[0];
				$session_e = $session_parts[1];
				if($session_e <= $session_s) 
				{
					$error_text .= "<li>Session should atleast be one year long.</li>";
				}
				if($session_s < date("Y") && $session_e <= date("Y")) 
				{
					$error_text .= "<li>Invalid session.</li>";
				}
			}
			
			if($error_text)
			{
				$msg = '<div class="alert alert-danger">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 <b>Please correct following errors:</b><br /><br />'.$error_text.'
						</div>
					</div>';
			}else{
				if($student->newStudent($name, $username, $password, $roll, $session_s, $session_e, $dept, $email, $mobile))
				{
					if($student->isAuth($username))
					{
						$_SESSION['islogged'] = 'yes';
						$_SESSION['loggedas'] = 'student';
						$_SESSION['loggedid'] = $username;
						header("LOCATION: /studentspanel.html");
					}else{
						$msg = '<div class="alert alert-success">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 <b>Account successfully created! </b><br />
							 Please contact your library to activate your account. Once your account is activated, you can login.
						</div>
					</div>';
					}
				}else{
					$msg = '<div class="alert alert-danger">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 Can not register this time. Please try back later!
						</div>
					</div>';
				}
			}
		}
		
		$this->registry->template->settings = $settings;
		$this->registry->template->footer = $site->getFooter();
		$this->registry->template->menu = $site->getMenu();
		$this->registry->template->massege = $msg;
		$this->registry->template->searchmodal = $site->getSearchModal();
		$this->registry->template->departments = $site->getDepartments();
        
		$this->registry->template->show('students/register');
		}

public function login() {
		
		$site = new Site();
		$student = new Student();
		$student->cookieLogin();
		
		$student->forNonLogged();
		
		$settings = $site->getSettings();
		$error_text = "";
		$msg = "";
		
		if($_POST)
		{
			$username 	= mysql_real_escape_string(@$_POST['username']) 	or $error_text .= "<li>No username supplied.</li>";
			$password 	= md5(@$_POST['password']) 							or $error_text .= "<li>No password supplied.</li>";
			$checked 	= intval(@$_POST['remember']) or $checked = 0;
			
			if(!$error_text)
			{
				
				$login = $student->login($username, $password);
				
				if($login)
				{
					if($student->isAuth($username))
					{
						if($checked)
						{
							$ticket = $student->genTicket();
							$student->assignTicket($username, $ticket);
							setcookie('username', $username,time() + (86400 * 7));
							setcookie('ticket', $ticket,time() + (86400 * 7));
						}else{
							setcookie('username', '',time() - (86400 * 7));
							setcookie('ticket', '',time() - (86400 * 7));
						}
						$_SESSION['islogged'] = 'yes';
						$_SESSION['loggedas'] = 'student';
						$_SESSION['loggedid'] = $username;
						header("LOCATION: /studentspanel.html");
					}else{
						$msg = '<div class="alert alert-success">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 <b>Pending activation! </b><br />
							 Please contact your library to activate your account. Once your account is activated, you can login.
						</div>
					</div>';
					}
				}else{
					$msg = '<div class="alert alert-danger">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 <b>Error occurred while login:</b><br />Invalid login details. Please check your details and try again!
						</div>
					</div>';
				}
			}else{
							
				$msg = '<div class="alert alert-danger">
						 <div class="container-fluid">
							 <div class="alert-icon">
								<i class="material-icons">error_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true"><i class="material-icons">clear</i></span>
							</button>
							 <b>Error occurred while login:</b><br />'.$error_text.'
						</div>
					</div>';
			}
			
		}
		
		$this->registry->template->settings = $settings;
		$this->registry->template->footer = $site->getFooter();
		$this->registry->template->massege = $msg;
		$this->registry->template->menu = $site->getMenu();
		$this->registry->template->searchmodal = $site->getSearchModal();
        
		$this->registry->template->show('students/login');

}


public function logout()
{
	session_destroy();
	setcookie('username', '',time() - (86400 * 7));
	setcookie('ticket', '',time() - (86400 * 7));
	header("LOCATION: /index.html");
}


}

?>