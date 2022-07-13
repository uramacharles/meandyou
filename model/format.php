<?php 
trait format{
	/**==========================================================
		for pagination
	=============================================================**/
	public function getSinglePageVariables($dbase){
		$this->tablename = $dbase;
		connection::connecter();
		$this->w = "SELECT COUNT(id) FROM $this->tablename";
		$this->w1 = $this->mysqli->query($this->w);
		$this->row = $this->w1->fetch_row();
		$this->rows = $this->row[0];
		$this->page_rows = 1;
		$this->last = ceil($this->rows/$this->page_rows);
		if($this->last <1){
			$this->last = 1;
		}
		$this->pagenum = 1;
		if(isset($_GET['pn'])){
			$this->pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
		}
		if($this->pagenum <1){
			$this->pagenum = 1;
		}else if($this->pagenum > $this->last){
			$this->pagenum = $this->last;
		}
		$this->paginationCtrls = "";
		if($this->last != 1){
			if($this->pagenum >1){
				$this->previous = $this->pagenum - 1;
				$this->paginationCtrls .= '<a href = "'.$_SERVER['PHP_SELF'].'?pn='.$this->previous.'" class="btn btn-success" >previous</a>';
			}
			if($this->pagenum != $this->last){
				$this->next = $this->pagenum+1;
				$this->paginationCtrls .='  <a href="'.$_SERVER['PHP_SELF'].'?pn='.$this->next.'" class="btn btn-primary">Next</a>';
			}
		}
		$_SESSION['from'] = ($this->pagenum-1)*$this->page_rows;
		$_SESSION['page_rows'] = $this->page_rows;
		return $this->paginationCtrls;
	}
	/**==========================================================
		for pagination
	=============================================================**/
	public function getPageVariables($dbase){
		$this->tablename = $dbase;
		connection::connecter();
		$this->w = "SELECT COUNT(id) FROM $this->tablename";
		$this->w1 = $this->mysqli->query($this->w);
		$this->row = $this->w1->fetch_row();
		$this->rows = $this->row[0];
		$this->page_rows = 10;
		$this->last = ceil($this->rows/$this->page_rows);
		if($this->last <1){
			$this->last = 1;
		}
		$this->pagenum = 1;
		if(isset($_GET['pn'])){
			$this->pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
		}
		if($this->pagenum <1){
			$this->pagenum = 1;
		}else if($this->pagenum > $this->last){
			$this->pagenum = $this->last;
		}
		$this->paginationCtrls = "";
		if($this->last != 1){
			if($this->pagenum >1){
				$this->previous = $this->pagenum - 1;
				$this->paginationCtrls .= '<a href = "'.$_SERVER['PHP_SELF'].'?pn='.$this->previous.'" class="btn btn-style-one" >previous</a>';
			}
			if($this->pagenum != $this->last){
				$this->next = $this->pagenum+1;
				$this->paginationCtrls .='  <a href="'.$_SERVER['PHP_SELF'].'?pn='.$this->next.'" class="btn btn-style-two">Next</a>';
			}
		}
		$_SESSION['from'] = ($this->pagenum-1)*$this->page_rows;
		$_SESSION['page_rows'] = $this->page_rows;
		return $this->paginationCtrls;
	}
	/**==========================================================
		for Conditional Pagination
	=============================================================**/
	public function getConditionedPageVariables($dbase,$condition){
		$this->tablename = $dbase;
		$this->condition = $condition;
		connection::connecter();
		$this->w = "SELECT COUNT(id) FROM $this->tablename $this->condition ";
		$this->w1 = $this->mysqli->query($this->w);
		$this->row = $this->w1->fetch_row();
		$this->rows = $this->row[0];
		$this->page_rows = 10;
		$this->last = ceil($this->rows/$this->page_rows);
		if($this->last <1){
			$this->last = 1;
		}
		$this->pagenum = 1;
		if(isset($_GET['pn'])){
			$this->pagenum = preg_replace('#[^0-9]#','',$_GET['pn']);
		}
		if($this->pagenum <1){
			$this->pagenum = 1;
		}else if($this->pagenum > $this->last){
			$this->pagenum = $this->last;
		}
		$this->paginationCtrls = "";
		if($this->last != 1){
			if($this->pagenum >1){
				$this->previous = $this->pagenum - 1;
				$this->paginationCtrls .= '<a href = "'.$_SERVER['PHP_SELF'].'?pn='.$this->previous.'" class="btn btn-style-one" >previous</a>';
			}
			if($this->pagenum != $this->last){
				$this->next = $this->pagenum+1;
				$this->paginationCtrls .='  <a href="'.$_SERVER['PHP_SELF'].'?pn='.$this->next.'" class="btn btn-style-two">Next</a>';
			}
		}
		$_SESSION['from'] = ($this->pagenum-1)*$this->page_rows;
		$_SESSION['page_rows'] = $this->page_rows;
		return $this->paginationCtrls;
	}
	/**==========================================================
		URL Formatting
	=============================================================**/
	public function formatUrl($url){
		$this->url = str_replace("../", "", $url);
		return $this->url;
	}
	public function formatUrlforAdmin($url){
		$this->url = str_replace("../", "", $url);
		$this->url = "../".$this->url;
		return $this->url;
	}
	public function formatTextareaUrlForAdmin($text){
		return $texts = str_replace('src="', 'src="../', $text);
	}
	public function truncateText($mess){
		$this->message = $mess;
		$arr = explode(" ", $this->message);
		if(count($arr) > 20){
			$this->message = implode(" ",array_slice($arr,0,20));
			$this->message .= "...";
			return $this->message;
		}else{
			return $this->message;
		}
	}
	public function truncateHeaderText($mess){
		$this->message = $mess;
		connection::connecter();
		preg_match_all('/<[\s]*p[\s]*>(.*?)<[\s]*(\/)p[\s]*>/si' , $this->message, $match);
		if(!empty($match[0])){
			$arr = explode(" ", $match[1][0]);
			if(count($arr) > 20){
				$this->message = implode(" ",array_slice($arr,0,20));
				$this->message .= "...";
				return $this->message;
			}else{
				return $this->message;
			}
		}else{
			$arr = explode(" ", $this->message);
			if(count($arr) > 20){
				$this->message = implode(" ",array_slice($arr,0,20));
				$this->message .= "...";
				return $this->message;
			}else{
				return $this->message;
			}
		}
	}
}
?>