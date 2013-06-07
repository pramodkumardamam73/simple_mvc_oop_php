<?php
class Session
{
  static private $sessionId;
	static private $loggedIn;
	static private $user;

	public function __construct()
	{
		
	}

	static public function startSession()
	{
		session_start();
		if(!isset($_SESSION['SESSION_ID'])){
			$_SESSION['SESSION_ID']=uniqid();
		}
		if(!isset($_SESSION['LOGGED_IN'])){
			$_SESSION['LOGGED_IN']=false;
		}
	}	

	static public function endSession()
	{
		session_destroy();
		$_SESSION['LOGGED_IN']=false;
	}

	static public function setUser($user)
	{
		$retVal=false;
		if(!isset($_SESSION['USER'])){
			self::$user=$user;
			$_SESSION['LOGGED_IN']=true;
			$_SESSION['USER']=$user;
			$retVal=true;
		}
		return $retVal;
	}
	
	static public function getSessionId()
	{
		return $_SESSION['SESSION_ID'];
	}
	
	static public function isLoggedIn()
	{
		$val=false;
		if($_SESSION['LOGGED_IN']){
			$val=true;
		}
		return $val;
	}
	
	static public function getUser()
	{
		if(isset($_SESSION['USER'])){
			return $_SESSION['USER'];
		}else{
			return false;
		}
	}

	static public function getSpaceFor($name)
	{
		$_SESSION[$name]=new Packet();
	}

	static public function addValue($name,$key,$value)
	{
		$_SESSION[$name]->setValue($key,$value);
	}

	static public function getValue($name,$key)
	{
		return $_SESSION[$name]->getValue($key);
	}
}
?>
