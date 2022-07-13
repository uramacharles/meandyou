<?php
/**
* 
*/
class posts extends connection{
	use database,htaccess, validator,file,format;
	function __construct(){
		connection::connecter();
		//creating the table IF it is not already existing
		$this->query="
			CREATE TABLE IF NOT EXISTS `posts`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `title` varchar(200) NOT NULL,
			  `titlelink` varchar(250) NOT NULL,
			  `post` text NOT NULL,
			  `category` varchar(15) NOT NULL,
			  `source` varchar(255) ,
			  `post_land_image` varchar(40) NOT NULL,
			  `post_other_image` text ,
			  `date_updated` varchar(20) NOT NULL,
			  PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
		connection::connecter();
		$this->query="
			CREATE TABLE IF NOT EXISTS `postcomment` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`post_id` varchar(100) NOT NULL,
				`email` varchar(50) NOT NULL,
				`comment` text NOT NULL,
				`date` varchar(20) NOT NULL,
				PRIMARY KEY (`id`)
			) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
		";
		$this->mysqli->query($this->query);
		
	}
	public function setCategory($categ){
		$count = count($categ);
		$this->category = "";
		for($i=0;$i<$count;$i++){
			if($i == $count-1){
				$this->category .= $categ[$i];
			}else{
				$this->category .= $categ[$i]." ";
			}
		}
	}
	public function addPost($imagepath1,$imagepath2){
		connection::connecter();
		$this->post_land_image = $imagepath1;
		$this->post_other_image = $imagepath2;
		$this->source = "contact-us.php";
		$this->date = date('F d, Y');
		$this->titlelink = str_replace(" ", "-", $this->title);
		$dataname = array("title","titlelink","post","category","source","post_land_image","post_other_image","date_updated");
		$datavalues = array($this->title,$this->titlelink,$this->post,$this->category,$this->source,$this->post_land_image,$this->post_other_image,$this->date);

		$result = $this->insertToDatabase("posts",$dataname,$datavalues,"");
		if($result !="false"){
			return "true";
		}else{
			return "false";
		}	
	}

	public function deletepost($id){
		connection::connecter();
		$this->id = $id;
		$ret = $this->isExist("posts","id","WHERE id = '$this->id'");
		if($ret != "false"){
			$this->item = array("post_other_image","post_land_image");
			$res = $this->simpleSelect("posts",$this->item,"WHERE id = ".$this->id);
			if($res != "false"){
				if($res[1] != "../posts/images/defaultpost.jpg"){
					unlink($res[1]);
				}
				$this->unlinker($res[0]);
				$result = $this->deleteFromDatabase("posts","id",$this->id);
				return $result;
			}else{
				return "Please try again";
			}
		}else{
			return"Please select a post";	
		}
	}
	public function editPost($id){
		connection::connecter();
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->titlelink = str_replace(" ", "-", $this->title);
		$dataname = array("title","titlelink","post","category","date_updated");
		$datavalues = array($this->title,$this->titlelink,$this->post,$this->category,$this->date);
		$result = $this->updateDatabase("posts",$dataname,$datavalues,"WHERE id = '$this->id'");
		if($result =="true"){
			return "true";
		}else{
			return "false";
		}
	}
	public function deletepicture($id,$imagepath){
		connection::connecter();
		$this->imagepath = $imagepath;
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->items = array("post_other_image");
		/*========================================
			Select the Old concatenated urls
		===========================================*/
		$res = $this->simpleSelect("posts",$this->items,"WHERE id='$this->id'");
		if($res!="false"){
			/*====================================================================================
				REMOVE THE DELETED URL FROM THE CONCATENATED STRINGS TO GET AN UPDATED STRING.
			========================================================================================*/	
			$this->oldpath = $res[0];
			$this->newpath = str_replace($imagepath, "", $this->oldpath);
			$this->newpath = str_replace("##", "#", $this->newpath);
			if($this->newpath[0] == "#"){
				$this->newpath[0] = "";
			}
			$cn = strlen($this->newpath);
			if($this->newpath[$cn-1] == "#"){
				$this->newpath[$cn-1] = "";
			}

			$this->newpath = ltrim($this->newpath);
			$this->newpath = rtrim($this->newpath);
			
			/*====================================================
				Update the database with the new url.
			===========================================================*/
			$this->date = date('F d, Y');
			$dataname = array("post_other_image","date_updated");
			$datavalues = array($this->newpath,$this->date);
			$result = $this->updateDatabase("posts",$dataname,$datavalues,"WHERE id = '$this->id'");
			if($result !="false"){
				/*===========================================================
					If the update is successful, then we delete the picture.
				==============================================================*/
				unlink($this->imagepath);
				return "true";
			}else{
				return "false";
			}
		}else{
			return "false";
		}
	}
	public function change_land_image($id,$imagepath){
		connection::connecter();
		$this->imagepath = $imagepath;
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->items = array("post_land_image");
		$res = $this->simpleSelect("posts",$this->items,"WHERE id='$this->id'");
		if($res!="false"){
			$this->oldpath = $res[0];
			$this->date = date('F d, Y');
			$dataname = array("post_land_image","date_updated");
			$datavalues = array($this->imagepath,$this->date);
			$result = $this->updateDatabase("posts",$dataname,$datavalues,"WHERE id = '$this->id'");
			if($result !="false"){
				if($this->oldpath != "../posts/images/defaultpost.jpg"){
					unlink($this->oldpath);
				}
				return $result;
			}else{
				return "false";
			}
		}else{
			return "false";
		}
	}
	public function add_other_image($id,$imagepath){
		connection::connecter();
		$this->imagepath = $imagepath;
		$this->id = $id;
		$this->date = date('F d, Y');
		$this->items = array("post_other_image");
		$res = $this->simpleSelect("posts",$this->items,"WHERE id='$this->id'");
		if($res!="false"){
			$this->oldpath = $res[0];
			$this->imagepath = ltrim($this->oldpath."#".$this->imagepath);
			if($this->imagepath[0] == "#"){
				$this->imagepath[0] = "";
			}
			$this->date = date('F d, Y');
			$dataname = array("post_other_image","date_updated");
			$datavalues = array($this->imagepath,$this->date);
			$result = $this->updateDatabase("posts",$dataname,$datavalues,"WHERE id = '$this->id'");
			if($result !="false"){
				return "true";
			}else{
				return "false";
			}
		}else{
			return "false";
		}
	}
	public function getCategory($cat){
		$list = explode(" ", $cat);
		$num = 0;
		$co = count($list);
		$categ = "";
		foreach ($list as $value) {
			$num++;
			$this->items = array("id","name");
			connection::connecter();
			$res = $this->simpleSelect("category",$this->items,"WHERE id = '$value'");
			if($num == $co){
				$categ .= "<a href = 'posts.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a>";
			}else{
				$categ .= "<a href = 'posts.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a> & ";
			}
		}
		return $categ;
	}
	public function getUserCategory($cat){
		$list = explode(" ", $cat);
		$num = 0;
		$co = count($list);
		$categ = "";
		foreach ($list as $value) {
			$num++;
			$this->items = array("id","name");
			connection::connecter();
			$res = $this->simpleSelect("category",$this->items,"WHERE id = '$value'");
			if($num == $co){
				$categ .= "<a href = 'publications.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a>";
			}else{
				$categ .= "<a href = 'publications.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a> & ";
			}
		}
		return $categ;
	}
	public function getPosts(){
		connection::connecter();
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","title","titlelink","category","source","post_land_image","date_updated");
		$res = $this->simpleSelect("posts",$this->items,"ORDER BY RAND() LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function searchpost(){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];

		$this->items = array("id","title","titlelink","category","source","post_land_image","date_updated");
		$this->column = "title";
		if(!is_array($this->searchitem)){
			$this->searchkeywords = array($this->searchitem);
		}else{
			$this->searchkeywords = explode(" ", $this->searchitem);
		}
		connection::connecter();
//		unset($_SESSION["searchitem"]);
		return $this->simpleSearch2("posts",$this->column,$this->searchkeywords,$this->items,"LIMIT $this->from,$this->page_rows");
	}
	public function relayPost(){
		if($_SESSION["category"] == "search"){
		 return $this->searchpost();
		}elseif($_SESSION["category"] == "all"){
			return $this->getPosts();
		}else{
			return $this->getPostByCategory($_SESSION["category"]);
		}
	}
	public function getMorePosts($t){
		connection::connecter();
		$this->post_id = $t;
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","title","titlelink","category","post_land_image","date_updated");
		$res = $this->simpleSelect("posts",$this->items,"WHERE NOT id = '$this->post_id' ORDER BY RAND() LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getPostByTitle($title,$id){
		connection::connecter();
		$this->title = $title;
		$this->id = $id;
		$this->items = array("id","title","titlelink","post","category","source","post_land_image","post_other_image","date_updated");
		$res = $this->simpleSelect("posts",$this->items,"WHERE titlelink = '$this->title' AND id = '$this->id' ");
		return $res;
	}
	public function getPostMetaInfo($title,$id){
		connection::connecter();
		$this->title = $title;
		$this->id = $id;
		$this->items = array("id","title","titlelink","post","post_land_image");
		$res = $this->simpleSelect("posts",$this->items,"WHERE titlelink = '$this->title' AND id = '$this->id' ");
		return $res;
	}
	public function getPostById($id){
		connection::connecter();
		$this->id = $id;
		$this->items = array("id","title","titlelink","post","category","source","post_land_image","post_other_image","date_updated");
		$res = $this->simpleSelect("posts",$this->items,"WHERE id = '$this->id' ");
		return $res;
	}
	public function getPictures($id){
		connection::connecter();
		$this->id = $id;
		$result = array();
		$this->items = array("post_land_image","post_other_image");
		$res = $this->simpleSelect("posts",$this->items,"WHERE id = '$this->id'");
		$result = explode("#",$res[1]);
		$result[] = $res[0];
		return $result;
	}
	public function getPostByCategory($category){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		connection::connecter();
		$this->category = str_replace(" ", "-", $category);
		$this->items = array("id");
		$cat = $this->simpleSelect("category",$this->items,"WHERE name = '$this->category'");

		$this->category_id = $cat[0];

		$this->items = array("id","title","titlelink","category","source","post_land_image","date_updated");
		$this->column = "category";
		$this->searchitem = array($this->category_id);
		connection::connecter();
		$res = $this->simpleSearch2("posts",$this->column,$this->searchitem,$this->items,"ORDER BY RAND() LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getcategorypreview($cat){
		$cat_ret = "";
		$cat_array = explode(" ", $cat);
		foreach ($cat_array as $value) {
			connection::connecter();
			$this->items = array("name");
			$ret = $this->simpleSelect("category",$this->items,"WHERE id = ".$value);
			$cat_ret .= "<a href = 'publications.php?ct=$ret[0]'>".$ret[0]."</a> & ";
		}
		return trim($cat_ret," & ");
	}
	public function getLatestPosts($num){
		connection::connecter();
		$this->items = array("id","title","titlelink","post_land_image","date_updated");
		$res = $this->simpleSelect("posts",$this->items," ORDER BY id DESC LIMIT $num");
		if($res!="false"){
			return $res;
		}else{
			return "false";
		}
	}
	public function fetchTopic($contents){
		connection::connecter();
		preg_match_all('/<[\s]*a[\s]*(href)="?'.'([^>"]*)"?[\s]*'.'rel="?([^>"]*)"?[\s]*[\/]?[\s]*'.'title="?([^>"]*)"?[\s]*[\/]?[\s]*>/si' , $contents, $match);
		$return = str_replace("'Permanent Link: ","", $match[4][0]);
		$this->title = substr($return,0,-1);
		$this->title = $this->mysqli->escape_string($this->title);
	}
	public function fetchBody($contents){
		connection::connecter();
//<div class="entry-content">  <div class='entry-content-wrapper clearfix standard-content'>  <div id="wpautbox-below">
		preg_match_all('/<[\s]*div[\s]*(class)="?(entry-content)"?[\s]*>(.*?)<[\s]*div[\s]*(id)="?(wpautbox-below)"?[\s]*>/is' , $contents, $match);
		$this->post = $this->mysqli->escape_string($match[0][0]);
	}
	public function checkLandingPicture(){
		if(!isset($this->post_land_image)){
			$this->post_land_image = "../posts/images/defaultpost.jpg";
		}
		$this->post_other_image = "";
	}
	public function fetchcontent($url){
		$this->url = $this->source = $this->newsurl;
		connection::connecter();
		$this->metadata =file_get_contents($this->url);
		$this->fetchTopic($this->metadata);
		$this->fetchBody($this->metadata);
		$this->checkLandingPicture();
		return $this->addPost($this->post_land_image,$this->post_other_image);
	}


/*=======================================================================================================
		For Comments
=========================================================================================================*/

	public function getComments($id,$num){
		connection::connecter();
		$this->items = array("id","email","comment","date");
		if($num == "all"){
			$res = $this->simpleSelect("postcomment",$this->items,"WHERE post_id = '$id' ORDER BY id ASC");
		}else{
			$res = $this->simpleSelect("postcomment",$this->items,"WHERE post_id = '$id' ORDER BY id ASC LIMIT $num ");
			
		}
		if($res!="false"){
			return $res;
		}else{
			return "false";
		}
	}

	public function addcomment($id){
		connection::connecter();
		$send =$this->insertToDatabase(
			"postcomment",
			array("post_id","email","comment","date"),
			array($id,$this->email,$this->comment,date('F d, Y')),
			""
		);
		if($send !="false"){
			return "true";
		}else{
			return "false";
		}	
	}
	public function delete_comment($id){
		connection::connecter();
		$this->id = $id;
		$ret = $this->isExist("postcomment","id","WHERE id = '$this->id'");
		if($ret != "false"){
			return $this->deleteFromDatabase("postcomment","id",$this->id);	
		}else{
			return"Please select a post";	
		}
	}
}

?>