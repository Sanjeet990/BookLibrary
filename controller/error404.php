<?php

Class error404Controller Extends baseController {

public function index() 
{
        $this->registry->template->blog_heading = 'This is the 404'.$_SERVER['QUERY_STRING'];
        $this->registry->template->show('error404');
}

}
?>
