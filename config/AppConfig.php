<?php
define('APP_PATH',"C:/xampp/htdocs/mvc_oop/");

class Controller
{
  public function __construct($isView,$controller,$path="")
	{
		include(APP_PATH.'controller/'.$path.$controller.'Controller.php');
		$name=$controller.'Controller';
		$m=new $name($isView,$controller);
	}
}
class AppController
{
	protected $outputBoolean=false;
	
	public function __construct($isView=true,$view)
	{
		$this->index();
		$this->_includeView($isView,$view);
		
	}
	public function index()
	{

	}

	public function _includeView($isView,$view)
	{
		if($isView){
			include(APP_PATH.'view/'.$view.'View.php');
		}else{
			//include(APP_PATH.'view/DefaultView.php');
			echo $this->outputBoolean;
		}
	}

	public function getParam($key)
	{
		$value;

		if(isset($_GET[$key])){
			$value=$_GET[$key];
		}
		elseif(isset($_POST[$key])){
			$value=$_POST[$key];
		}
		else{
			$value=false;
		}

		return $value;
	}
}
?>
