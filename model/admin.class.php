<?


class admin{


private function __construct() {

}

################################################################
#################### User's Functions ##########################
################################################################



public static function mustlogin()
{
if(!@$_SESSION['isadmin']) header("LOCATION: /admin/index.html");
}

public static function login($username, $password)
{
$res = mysql_query("SELECT * FROM admins WHERE username = '$username' AND password = '".base64_encode($password)."'");
$num = mysql_num_rows($res);
if($num)
{
$res2 = mysql_fetch_assoc($res);
return $res2['id'];
}else{
return false;
}
}

public static function isuser($username)
{
$res = mysql_query("SELECT * FROM admins WHERE username = '$username'");
if(mysql_num_rows($res)) return true;
else return false;
}

public static function newadmin($username, $password, $rank)
{
mysql_query("INSERT INTO admins (username, password, level) VALUES ('$username', '$password', '$rank')");
return true;
}

public static function deladmin($id)
{
return mysql_query("DELETE FROM admins WHERE id = '$id'");
}

public static function level($username)
{
$res = mysql_query("SELECT * FROM admins WHERE username = '$username'");
$res2 = mysql_fetch_assoc($res);
return $res2['level'];
}

public static function setrank($id, $rank)
{
return mysql_query("UPDATE admins SET level = '$rank' WHERE id = '$id'");
}

public static function setpassword($id, $password)
{
return mysql_query("UPDATE admins SET password = '".base64_encode($password)."' WHERE id = '$id'");
}

public static function levelbyid($id)
{
$res = mysql_query("SELECT * FROM admins WHERE id = '$id'");
$res2 = mysql_fetch_assoc($res);
return $res2['level'];
}

public static function listadmin()
{
$ret = "
<script>
function ask(id)
{
if(confirm('Are u sure you want to remove this admin?'))
{
window.location = '/admin/deladmin/' + id + '.html';
}
}
</script>";
$res = mysql_query("SELECT * FROM admins WHERE level > '".self::level($_SESSION['username'])."' OR username = '".$_SESSION['username']."' ORDER BY level ASC");

$ret .= '<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                <thead>
                  <tr>
                    <th>Username <i class="fa fa-sort"></i></th>
                    <th>Rank <i class="fa fa-sort"></i></th>
                    <th>Change Password</th>
                    <th>Change Rank</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>';
				
$allrank = array("-- Management Service --", "Super Admin", "Admin", "Manager", "Promotor");
				
while($res2 = mysql_fetch_assoc($res))
{
$ret .= "<tr><td>".$res2['username']."</td><td>".$allrank[($res2['level']-1)]."</td><td><a class=\"btn btn-default\" href=\"/admin/password/".$res2['id'].".html\">Change password</a></td><td><a class=\"btn btn-default\" href=\"/admin/rank/".$res2['id'].".html\">Rank</a></td><td><a class=\"btn btn-default\" href=\"javascript:ask('".$res2['id']."');\">Delete</a></td></tr>";
}

$ret .= "</tbody></table></div>";
return $ret;
}



public static function adminexists($id)
{
$res = mysql_query("SELECT * FROM admins WHERE id = '$id'");
if(!mysql_num_rows($res)) header("LOCATION: /admin/admins.html");
}

################################################################
#################### Author's Functions ########################
################################################################

public static function pre_authors($allauthors)
{
$ret = "";
$authors = array_filter(explode(", ", $allauthors));
foreach($authors as $author)
{
$res = mysql_query("SELECT * FROM authors WHERE id = '$author'");
$res2 = mysql_fetch_assoc($res);
$ret .= "<option value=\"".$author."\" class=\"selected\">".$res2['name']."</option>";
}
return $ret;
}

public static function searchauthors($term)
{
$ret = "
<script>
function ask(id)
{
if(confirm('Are u sure you want to remove this author?'))
{
window.location = '/admin/delauthor/' + id + '.html';
}
}
</script>";
$res = mysql_query("SELECT * FROM authors WHERE name LIKE '%$term%'ORDER BY name ASC");

$ret .= '<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Author\'s Name <i class="fa fa-sort"></i></th>
                    <th>Gender <i class="fa fa-sort"></i></th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>';
				
while($res2 = mysql_fetch_assoc($res))
{
$ret .= "<tr><td class=\"row\">".$res2['name']."</td><td>".ucfirst($res2['gender'])."</td><td><a class=\"btn btn-default\" href=\"/admin/editauthor/".$res2['id'].".html\">Edit</a></td><td><a class=\"btn btn-default\" href=\"javascript:ask('".$res2['id']."');\">Delete</a></td></tr>";
}

$ret .= "</tbody></table></div>";
return $ret;
}

public static function author($id)
{
$res = mysql_query("SELECT * FROM authors WHERE id = '$id'");
return mysql_fetch_assoc($res);
}

public static function authorexists($id)
{
$res = mysql_query("SELECT * FROM authors WHERE id = '$id'");
if(!mysql_num_rows($res)) header("LOCATION: /admin/authors.html");
}

public static function saveauthor($id, $aname, $amail, $amob, $asex, $aloc, $adesc)
{
if(mysql_query("UPDATE authors SET name = '$aname', email = '$amail', mobile = '$amob', descr = '$adesc', gender = '$asex', location = '$aloc' WHERE id = '$id'"))
{
return true;
}else{
return false;
}
}

public static function addauthor($aname, $amail, $amob, $asex, $aloc, $adesc)
{
if(mysql_query("INSERT INTO authors (name, email, mobile, descr, gender, location) VALUES ('$aname', '$amail', '$amob', '$adesc', '$asex', '$aloc')"))
{
return mysql_insert_id();
}else{
return false;
}
}

public static function delauthor($id)
{
return mysql_query("DELETE FROM authors WHERE id = '$id'");
}



################################################################
#################### Book's Functions ##########################
################################################################


public static function listbooks()
{
$ret = "
<script>
function ask(id)
{
if(confirm('Are u sure you want to remove this book?'))
{
window.location = '/admin/delbook/' + id + '.html';
}
}
</script>";
$res = mysql_query("SELECT * FROM books ORDER BY name ASC");

$ret .= '<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Title <i class="fa fa-sort"></i></th>
                    <th>ISBN <i class="fa fa-sort"></i></th>
                    <th>Price <i class="fa fa-sort"></i></th>
                    <th>Modify</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>';
				
while($res2 = mysql_fetch_assoc($res))
{
$ret .= "<tr><td>".$res2['name']."</td><td>".$res2['isbn10']."</td><td>".$res2['price']."</td><td><a class=\"btn btn-default\" href=\"/admin/editbook/".$res2['id'].".html\">Modify</a></td><td><a class=\"btn btn-default\" href=\"javascript:ask('".$res2['id']."');\">Delete</a></td></tr>";
}

$ret .= "</tbody></table></div>";
return $ret;
}

public static function bookexists($id)
{
$res = mysql_query("SELECT * FROM books WHERE id = '$id'");
if(!mysql_num_rows($res)) header("LOCATION: /admin/admins.html");
}

public static function bookInfo($id)
{
$res = mysql_query("SELECT * FROM books WHERE id = '$id'");
return mysql_fetch_assoc($res);
}



public static function delbook($id)
{
return mysql_query("DELETE FROM books WHERE id = '$id'");
}

public static function addBook($title, $e_author, $e_genre, $isbn10, $isbn13, $adesc, $price, $bflip, $bhs, $binfi, $bamazon, $localname, $bdetail, $bdate, $bpages, $bweight, $blang, $bbind, $isbestseller, $forthcoming, $bsort)
{
if(mysql_query(mysql_query("INSERT INTO books (name, author, genre, isbn10, isbn13, descr, price, flipkart, hs18, infi, amazon, pic, detailedsub, dateprinted, pages, weight, lang, binding, isbestseller, forthcoming, xsort) VALUES ('$title', '$e_author', '$e_genre', '$isbn10', '$isbn13', '$adesc', '$price', '$bflip', '$bhs', '$binfi', '$bamazon', '$localname', '$bdetail', '$bdate', '$bpages', '$bweight', '$blang', '$bbind', '$isbestseller', '$forthcoming', '$bsort')")))
{
return mysql_insert_id();
}else{
return false;
}	
}

public static function modifyBook($title, $e_author, $e_genre, $isbn10, $isbn13, $adesc, $price, $bflip, $bhs, $binfi, $bamazon, $bdetail, $bdate, $bpages, $bweight, $blang, $bbind, $bst, $forthcoming, $id, $bsort)
{
if(mysql_query(mysql_query("UPDATE books SET name = '$title', author = '$e_author', genre = '$e_genre', isbn10 = '$isbn10', isbn13 = '$isbn13', descr = '$adesc', price = '$price', flipkart = '$bflip', hs18 = '$bhs', infi = '$binfi', amazon = '$bamazon', detailedsub = '$bdetail', dateprinted = '$bdate', pages = '$bpages', weight = '$bweight', lang = '$blang', binding = '$bbind', isbestseller = '$bst', forthcoming = '$forthcoming', xsort = '$bsort' WHERE id = '$id'")))
{
return true;
}else{
return false;
}	
}

################################################################
##################### Genre's Functions ########################
################################################################


public static function newgenre($genre)
{
mysql_query("INSERT INTO genre (name) VALUES ('$genre')");
return true;
}

public static function listgenre()
{
$ret = "
<script>
function ask(id)
{
if(confirm('Are u sure you want to remove this genre?'))
{
window.location = '/admin/delgenre/' + id + '.html';
}
}
</script>";
$res = mysql_query("SELECT * FROM genre ORDER BY name ASC");

$ret .= '<div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
                    <th>Genre Name <i class="fa fa-sort"></i></th>
                    <th>Rename</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>';
				
while($res2 = mysql_fetch_assoc($res))
{
$ret .= '<tr><td>'.$res2['name'].'</td><td><button onClick="window.location = \'/admin/editgenre/'.$res2['id'].'.html\'; " class="btn btn-default">Rename</button></td><td><button onClick="ask(\''.$res2['id'].'\');" class="btn btn-default">Delete</button></td></tr>';
}

$ret .= "</tbody></table></div>";
return $ret;
}


public static function delgenre($id)
{
return mysql_query("DELETE FROM genre WHERE id = '$id'");
}

public static function pre_genres($allgenres)
{
$ret = "";
$genres = array_filter(explode(", ", $allgenres));
foreach($genres as $genre)
{
$res = mysql_query("SELECT * FROM genre WHERE id = '$genre'");
$res2 = mysql_fetch_assoc($res);
$ret .= "<option value=\"".$genre."\" class=\"selected\">".$res2['name']."</option>";
}
return $ret;
}

public static function genrerexists($id)
{
$res = mysql_query("SELECT * FROM genre WHERE id = '$id'");
if(!mysql_num_rows($res)) header("LOCATION: /admin/genre.html");
}

public static function setgenre($id, $genre)
{
return mysql_query("UPDATE genre SET name = '$genre' WHERE id = '$id'");
}

public static function genrename($id)
{
$res = mysql_query("SELECT * FROM genre WHERE id = '$id'");
$res2 = mysql_fetch_assoc($res);
return $res2['name'];
}

#############################################################################################
#############################################################################################

public static function setfeatured($featured)
{
return mysql_query("UPDATE settings SET featured = '$featured' WHERE id = '1'");
}


public static function setslider($slide1, $slide2, $slide3, $slide4)
{
return mysql_query("UPDATE settings SET slide1 = '$slide1', slide2 = '$slide2', slide3 = '$slide3', slide4 = '$slide4' WHERE id = '1'");
}

public static function setchoice($slide1, $slide2, $slide3)
{
return mysql_query("UPDATE settings SET choice1 = '$slide1', choice2 = '$slide2', choice3 = '$slide3' WHERE id = '1'");
}

public static function setmisc($phone, $email, $facebook, $twitter, $address, $about, $adesc)
{
return mysql_query("UPDATE settings SET phone = '$phone', email = '$email', facebook = '$facebook', twitter = '$twitter', address = '$address', about = '$about', sdesc = '$adesc' WHERE id = '1'");
}



}


?>