<?php 

/**
 * 

 */
class texteditormodel extends connection{
	use file, format;
	public function structureImageUrl($imgarray){
		$this->imgarray = explode("#", $imgarray);
		$this->con_result = "";
		foreach ($this->imgarray as $value) {
			$this->con_result .= "<div class='col-md-12'><img src='$value' style='width:100%'/></div>";	
		}
		return $this->con_result;
	}
}
?>