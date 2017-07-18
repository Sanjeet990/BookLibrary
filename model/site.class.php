<?


class site{


public function __construct() {

}


public function getMenu($selected="")
{
	$accountsel = "";
	$homesel = "";
	
	##### Selected menu item
	if($selected == "account") $accountsel = "active";
	if($selected == "home") $homesel = "active";
	
	$cont = "";
	$cont .= '<div class="navbar-collapse collapse navbar-right">
          <ul class="nav navbar-nav">
            <li class="'.$homesel.'"><a href="/index.html">HOME</a></li>
            <li class="dropdown '.$accountsel.'">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">ACCOUNT <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/login.html">LOGIN</a></li>
                <li><a href="/register.html">REGISTER</a></li>
                <li><a href="/forgot-password.html">FORGOT PASSWORD</a></li>
              </ul>
            </li>
			<li><a href="about.html">ABOUT</a></li>
            <li><a href="contact.html">CONTACT</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">PAGES <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="blog.html">BLOG</a></li>
                <li><a href="single-post.html">SINGLE POST</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="single-project.html">SINGLE PROJECT</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->';
		return $cont;
}

public function getFooter(){
	$cont = "";
	$cont .= '<div id="footerwrap">
	 	<div class="container">
		 	<div class="row">
		 		<div class="col-md-4">
		 			<h4>About</h4>
		 			<div class="hline-w"></div>
		 			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s.</p>
		 		</div>
		 		<div class="col-md-4">
		 			<h4>Social Links</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				<a href="#"><i class="fa fa-dribbble"></i></a>
		 				<a href="#"><i class="fa fa-facebook"></i></a>
		 				<a href="#"><i class="fa fa-twitter"></i></a>
		 				<a href="#"><i class="fa fa-instagram"></i></a>
		 				<a href="#"><i class="fa fa-tumblr"></i></a>
		 			</p>
		 		</div>
		 		<div class="col-md-4">
		 			<h4>Our Bunker</h4>
		 			<div class="hline-w"></div>
		 			<p>
		 				Some Ave, 987,<br/>
		 				23890, New York,<br/>
		 				United States.<br/>
		 			</p>
		 		</div>
		 	
		 	</div><! --/row -->
	 	</div><! --/container -->
	 </div><! --/footerwrap -->';
	 return $cont;
}

public function getSettings()
{
	$res = mysql_query("SELECT * FROM site_settings LIMIT 1");
	return mysql_fetch_assoc($res);
	
}

public function getQuotation()
{
	return "lol";
	
}

public function getSearchModal()
{
	return "lol";
	
}

public function getDepartments()
{
	$res = mysql_query("SELECT * FROM departments ORDER BY dept_name ASc");
	$ret = "<option value=\"0\" selected disabled>Select department</option>";
	while($res2 = mysql_fetch_assoc($res))
	{
		$ret .= "<option value=\"".$res2['id']."\">".$res2['dept_name']."</option>";
	}
	return $ret;
}


private static function nicename($string)
{
$string = str_replace(" ", "-", $string);
$string = str_replace("_", "-", $string);
$string = str_replace("_", "-", $string);
$string = str_replace("+", "-", $string);
$string = str_replace("/", "-", $string);
$string = str_replace("\\", "-", $string);
$string = str_replace("{", "", $string);
$string = str_replace("}", "", $string);
$string = str_replace("[", "", $string);
$string = str_replace(":", "", $string);
$string = str_replace(";", "", $string);
$string = str_replace("\"", "", $string);
$string = str_replace("'", "", $string);
$string = str_replace("<", "", $string);
$string = str_replace(">", "", $string);
$string = str_replace(",", "", $string);
$string = str_replace(".", "", $string);
$string = str_replace("\?", "", $string);
$string = str_replace("!", "", $string);
$string = str_replace("@", "", $string);
$string = str_replace("#", "", $string);
$string = str_replace("$", "", $string);
$string = str_replace("%", "", $string);
$string = str_replace("^", "", $string);
$string = str_replace("&", "", $string);
$string = str_replace("*", "", $string);
$string = str_replace("(", "", $string);
$string = str_replace(")", "", $string);
return $string;
}

}


?>