<?php
class Functions
{
  protected $db;

	public function __construct()
	{
		$this->db=new Database('mingleocean_mvc');
	}

	public function redirectTo($link)
	{
		header("Location:".$link);
	}
	
	public function setCorrectTimezone()
	{
		date_default_timezone_set('Asia/Calcutta');
	}
	
	public function getCurrentURL()
	{
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		 return $pageURL;
	}
	
	public function printCalender($day,$month,$year)
	{
		$first_day=mktime(0,0,0,$month,1,$year);
		$title=date('F',$first_day);
		$day_of_week=date('D',$first_day);
		switch($day_of_week){
			case "Sun" : $blank=0; break;
			case "Mon" : $blank=1; break;
			case "Tue" : $blank=2; break;
			case "Wed" : $blank=3; break;
			case "Thu" : $blank=4; break;
			case "Fri" : $blank=5; break;
			case "Sat" : $blank=6; break;
		}
		$days_in_month=cal_days_in_month(0,$month,$year);
		echo "<table cellspacing=0 width=100%>";
		echo "<tr><th colspan=7><span id=\"prev-button\" style=\"cursor:pointer\">Prev</span> $title $year <span id=\"next-button\" style=\"cursor:pointer\">Next</span></th></tr>";
		echo "<tr><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>";
		$day_count=1;
		echo "<tr>";
		while($blank>0){
			echo "<td></td>";
			$blank--;
			$day_count++;
		}
		$day_num=1;
		while($day_num<=$days_in_month){
			echo "<td class=\"calender-item\" style=\"cursor:pointer\">$day_num</td>";
			$day_num++;
			$day_count++;
			if($day_count>7){
				echo "</tr><tr>";
				$day_count=1;
			}
		}
		while($day_count>1 && $day_count<=7){
			echo "<td></td>";
			$day_count++;
		}
		echo "</tr></table>";
	}
}
?>
