<?


class student{


public function __construct() {
	$res = mysql_query("SELECT * FROM site_settings WHERE id = '1' LIMIT 1");
	$this->settings = mysql_fetch_assoc($res);
}

public function isUsername($username)
{
	$res = mysql_query("SELECT * FROM students WHERE username = '$username' LIMIT 1");
	return mysql_num_rows($res);
}

public function isEmail($email)
{
	$res = mysql_query("SELECT * FROM students WHERE email = '$email' LIMIT 1");
	return mysql_num_rows($res);
}

public function isMobile($mobile)
{
	$res = mysql_query("SELECT * FROM students WHERE mobile = '$mobile' LIMIT 1");
	return mysql_num_rows($res);
}

public function isAuth($username)
{
	$res = mysql_query("SELECT * FROM students WHERE username = '$username' AND isauth = '1'");
	return mysql_num_rows($res);
}

public function login($username, $password)
{
	$res = mysql_query("SELECT * FROM students WHERE username = '$username' AND password = '$password'");
	return mysql_num_rows($res);
}

public function forNonLogged()
{
	if(@$_SESSION['islogged'] && @$_SESSION['loggedas'] == 'student')
	{
		header("LOCATION: /studentspanel.html");
	}
}

public function cookieLogin()
{
	if(@!$_SESSION['islogged'] && @$_SESSION['loggedas'] != 'student' && @$_COOKIE['username'] && @$_COOKIE['ticket'])
	{
		$username 	= mysql_real_escape_string(@$_COOKIE['username']);
		$ticket 	= mysql_real_escape_string(@$_COOKIE['ticket']);
		
		$res = mysql_query("SELECT * FROM students WHERE username = '$username' AND ticket = '$ticket'");
		if(mysql_num_rows($res))
		{
			$ticket = $this->genTicket();
			$this->assignTicket($username, $ticket);
			setcookie('username', $username,time() + (86400 * 7));
			setcookie('ticket', $ticket,time() + (86400 * 7));
			$_SESSION['islogged'] = 'yes';
			$_SESSION['loggedas'] = 'student';
			$_SESSION['loggedid'] = $username;
			header('Location: '.$_SERVER['REQUEST_URI']);
		}else{
			setcookie('username', '',time() - (86400 * 7));
			setcookie('ticket', '',time() - (86400 * 7));
		}
	}
}

public function genTicket()
{
	$tick = base64_encode(rand(1111, 9999).time());
	$tick = md5(substr($tick,0,30));
	$tick = substr($tick,0,40);
	
	$res = mysql_query("SELECT * FROM students WHERE ticket = '$tick'");
	$count = mysql_num_rows($res);
	
	if($count)
	{
		return genTicket();
	}else{
		return $tick;
	}
}

public function assignTicket($username, $ticket)
{
	return mysql_query("UPDATE students SET ticket = '$ticket' WHERE username = '$username'");
}

public function newStudent($name, $username, $password, $roll, $session_s, $session_e, $dept, $email, $mobile)
{
	if($this->settings['auto_valid_user'])
	{
		$isauth = 1;
		$authby = -99;
	}else{
		$isauth = 0;
		$authby = 0;
	}
	return mysql_query("INSERT INTO students (`name`, `username`, `password`, `rollno`, `dept`, `session-start`, `session-end`, `regdate`, `isauth`, `authby`, `email`, `mobile`) VALUES ('$name', '$username', '$password', '$roll', '$dept', '$session_s', '$session_e', NOW(), '$isauth', '$authby', '$email', '$mobile')");
}

}


?>