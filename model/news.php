<?php
/**
* 
*/
class news extends connection{
	use database,htaccess, validator,file,format;
	function __construct(){
		connection::connecter();
		//creating the table IF it is not already existing
		$this->query="
			CREATE TABLE IF NOT EXISTS `news`(
			  `id` int(11) NOT NULL AUTO_INCREMENT,
			  `newsurl` varchar(200) NOT NULL,
			  `category` varchar(15) NOT NULL,
			  `description` text NOT NULL,
			  `date_updated` varchar(20) NOT NULL,
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
	public function addNews(){
		connection::connecter();
		$this->date = date('F d, Y');
		$this->description = "test";
		$dataname = array("newsurl","category","description","date_updated");
		$datavalues = array($this->newsurl,$this->category,$this->description,$this->date);

		$result = $this->insertToDatabase("news",$dataname,$datavalues,"");
		if($result !="false"){
			return "true";
		}else{
			return "false";
		}
	}

	public function deletenews($id){
		connection::connecter();
		$this->id = $id;
		$ret = $this->isExist("news","id","WHERE id = '$this->id'");
		if($ret != "false"){
			$result = $this->deleteFromDatabase("news","id",$this->id);
			return $result;
		}else{
			return"Please select a news";	
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
				$categ .= "<a href = 'addnews.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a>";
			}else{
				$categ .= "<a href = 'addnews.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a> & ";
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
				$categ .= "<a href = 'news.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a>";
			}else{
				$categ .= "<a href = 'news.php?ct=$res[1]'>".str_replace("-", " ", $res[1])."</a> & ";
			}
		}
		return $categ;
	}
	public function getNews(){
		connection::connecter();
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","newsurl","category","date_updated");
		$res = $this->simpleSelect("news",$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function searchnews(){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];

		$this->items = array("id","newsurl","category","date_updated");
		$this->column = "description";
		$this->searchkeywords = explode(" ", $this->searchitem);
		connection::connecter();
		return $this->simpleSearch2("news",$this->column,$this->searchkeywords,$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
	}
	public function relayNews(){
		if($_SESSION["category"] == "search"){
		 return $this->searchnews();
		}elseif($_SESSION["category"] == "all"){
			return $this->getNews();
		}else{
			return $this->getNewsByCategory($_SESSION["category"]);
		}
	}
	public function getMoreNews($t){
		connection::connecter();
		$this->post_id = $t;
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		$this->items = array("id","newsurl","category","date_updated");
		$res = $this->simpleSelect("news",$this->items,"WHERE NOT id = '$this->post_id' ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getCategoryId($cat){
		$this->category = str_replace(" ", "-", $category);
		$this->items = array("id");
		$cat = $this->simpleSelect("category",$this->items,"WHERE name = '$this->category'");
		return $cat[0];		
	}
	public function getNewsByCategory($category){
		$this->from = $_SESSION['from'];
		$this->page_rows = $_SESSION['page_rows'];
		connection::connecter();
		
		$this->category_id = $this->getCategoryId($category);

		$this->items = array("id","newsurl","category","date_updated");
		$this->column = "category";
		$this->searchitem = array($this->category_id);
		connection::connecter();
		$res = $this->simpleSearch2("news",$this->column,$this->searchitem,$this->items,"ORDER BY id DESC LIMIT $this->from,$this->page_rows");
		return $res;
	}
	public function getcategorypreview($cat){
		$cat_ret = "";
		$cat_array = explode(" ", $cat);
		foreach ($cat_array as $value) {
			connection::connecter();
			$this->items = array("name");
			$ret = $this->simpleSelect("category",$this->items,"WHERE id = ".$value);
			$cat_ret .= "<a href = 'addnews.php?ct=$ret[0]'>".$ret[0]."</a> & ";
		}
		return trim($cat_ret," & ");
	}
	public function formatnewscategorypreview($cat){
		$cat_ret = "";
		$cat_array = explode(" ", $cat);
		foreach ($cat_array as $value) {
			connection::connecter();
			$this->items = array("name");
			$ret = $this->simpleSelect("category",$this->items,"WHERE id = ".$value);
			$cat_ret .= "<a href = 'news.php?ct=$ret[0]'>".$ret[0]."</a> & ";
		}
		return trim($cat_ret," & ");
	}
	public function getLatestNews($num){
		connection::connecter();
		$this->items = array("id","newsurl","date_updated");
		$res = $this->simpleSelect("news",$this->items," ORDER BY id DESC LIMIT $num");
		if($res!="false"){
			return $res;
		}else{
			return "false";
		}
	}
	public function fetchdata($url,$raw = false){
		$this->url = $url;
		$result = false;
		$contents = $this->getUrlContents($url);
		if(isset($contents) && is_string($contents)){
			$title = null;
			$metaTags = null;
			$metaProperties = null;
			preg_match('/<title>([^>]*)<\/title>/si', $contents, $match);

			if(isset($match)&&is_array($match)&&count($match)>0){
				$title = strip_tags($match[1]);
			}

			preg_match_all('/<[\s]*meta[\s]*(name|property)="?'.'([^>"]*)"?[\s]*'.'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si' , $contents, $match);

			if(isset($match)&&is_array($match)&&count($match)==4){
				$originals = $match[0];
				$names = $match[2];
				$values = $match[3];
				if(count($originals) == count($names) && count($names)==count($values) ){

					$metaProperties = $metaTags = array();

					if($raw){
						if(version_compare(PHP_VERSION, "5.4.0")== -1){
							$flags = ENT_COMPAT;
						}else{
							$flags = ENT_COMPAT | ENT_HTML401;
						}
					}
					$limiti = count($names);
					for($i=0;$i<$limiti;$i++){
						if($match[1][$i]=="name"){
							$meta_type = "metaTags";
						}else{
							$meta_type = "metaProperties";
						}
						if($raw){
							${$meta_type}[$names[$i]] = array(
								'html' => htmlentities($originals[$i],$flags,'UTF-8'),
								'value' => $values[$i]
							);
						}else{
							${$meta_type}[$names[$i]] = array(
								'html' => $originals[$i],
								'value' => $values[$i]
							);
						}
					}
				}
			}
			$result = array(
				'title' => $title,
				'metaTags' => $metaTags,
				'metaProperties' => $metaProperties
			);
		}
		return $result;
	}
	public function getUrlContents($url,$maximumRedirections = null,$currentRedirection = 0){
		$result = false;
		$contents = @file_get_contents($url);
		//check if we need to go somewhere else
		if(isset($contents)&&is_string($contents)){
			preg_match_all('/<[\s]*meta[\s]*http-equiv="?REFRESH"?'.'[\s]*content="?[0-9]*;[\s]*URL[\s]*=[\s]*([^>"]*)"?'.'[\s]*[\/]?[\s]*>/si' , $contents, $match);
			if(isset($match) && is_array($match)&&count($match) == 2 && count($match[1])==1){
				if(!isset($maximumRedirections) || $currentRedirection < $maximumRedirections){
					return $this->getUrlContents($match[1][0],$maximumRedirections,++$currentRedirection);
				}
				$result = false;
			}else{
				$result = $contents;
			}
		}
		return $contents;
	}
}

?>