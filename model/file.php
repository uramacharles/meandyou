<?php
trait file{
	public function createDirectory($patharray){
		$this->patharray = $patharray;
		$this->dir = "";
		$this->count = sizeof($this->patharray);
		for($i = 0;$i<$this->count;$i++){
			$this->dir .= $this->patharray[$i]."/";
			if(!file_exists($this->dir)){
				mkdir($this->dir);
				continue;
			}else{
				continue;
			}
		}
		return $this->dir;
	}
	public function createUserDirectory($patharray){
		$this->patharray = $patharray;
		$this->dir = "../";
		$this->count = sizeof($this->patharray);
		for($i = 0;$i<$this->count;$i++){
			$this->dir .= $this->patharray[$i]."/";
			if(!file_exists($this->dir)){
				mkdir($this->dir);
				continue;
			}else{
				continue;
			}
		}
		return $this->dir;
	}
	function img_Resize($path){
	   $x = getimagesize($path);            
	   $width  = $x['0'];
	   $height = $x['1'];
	   $rs_width  = 1200;//resize to half of the original width.
	   $rs_height = 500;//resize to half of the original height.
	   echo $x['mime'];
	   switch ($x['mime']){
	      case "image/gif":
	         $img = imagecreatefromgif($path);
	         break;
	      case "image/jpeg":
	         $img = imagecreatefromjpeg($path);
	         break;
	      case "image/png":
	         $img = imagecreatefrompng($path);
	         break;
	   }
	   $img_base = imagecreatetruecolor($rs_width, $rs_height);
	   imagecopyresized($img_base, $img, 0, 0, 0, 0, $rs_width, $rs_height, $width, $height);
	   $path_info = pathinfo($path);    
	   switch ($path_info['extension']) {
	        case "gif":
	            imagegif($img_base, $path);  
	        break;
	        case "jpeg":
	            imagejpeg($img_base, $path);  
	        break;
	        case "png":
	            imagepng($img_base, $path); 
	        break;
	   }
	}
	public function uploadfile($filename,$filetemp,$path,$i){
		$this->filename=$filename;
		$this->dat = date('YmjHis');
		$this->newname = $this->dat."_".$i;
		$this->filename = substr_replace($this->filename, $this->newname,0 ,-4);
		$this->filetemp = $filetemp;
		$this->path = $path;
		connection::connecter();
		if(!file_exists($this->path)){
			mkdir($this->path);
			$this->uploadResult =move_uploaded_file($this->filetemp,$this->path.$this->filename);

			return $this->path.$this->filename;
		}else{
			$this->uploadResult =move_uploaded_file($this->filetemp,$this->path.$this->filename);
			return $this->path.$this->filename;
		}
	}
	public function unlinker($address_string){
		if(!empty($address_string)){
			$newval = explode("#",$address_string);
			foreach ($newval as $val){
				unlink($val);
			}
		}
	}
}
?>