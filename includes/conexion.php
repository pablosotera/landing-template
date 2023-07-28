<?php
{
	function OpenCon()
	{
		$cnx = new PDO('mysql:host=localhost;dbname=modelado_aprendiendoentuhogar;charset=utf8', 'modelado_ad_academia', '~#%ReXfldkl%');
		return $cnx;
	}
 }
?>