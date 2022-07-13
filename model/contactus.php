<?php
/**
* this is a class that will be relaying the message of the clients to the admin through the contact us page
and also will be in charge of selecting the informations from the contact us database to the admin
*/
class contactus extends connection{
//////////////////////////////////////////////////////
//////////Using the traits needed for the work
////////////////////////////////////////////////////
	use validator , database,format,mailer;
	function __construct(){
	}
	public function sender($toemail){
		connection::connecter();
		$this->newsletter ="";
		if(isset($this->email)){
			$this->newsletter .= "<h3>From: $this->name</h3> <br/>"; 
			$this->newsletter .= "<h3>Email: $this->email</h3> <br/>"; 
			$this->newsletter .= "<h2>Subject: $this->subject</h2> <br/>"; 
			$this->newsletter .= "<pre>$this->message</pre> <br/>";
		}
		$res = $this->sendMail($this->subject,$this->newsletter,$this->name,$toemail);
	}
}
?>