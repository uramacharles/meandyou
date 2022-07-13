<?php
trait htaccess{
	public function setsingleurlvalue($webpath){
		$this->title = str_replace($webpath, "", $_SERVER["REQUEST_URI"]);
	}
}
?>