<?php
include_once('../config/defines.inc.php');
include_once('../classes/db/Db.php');

copy("../classes/EmployeePROD.php", "../classes/Employee.php");
copy("../classes/controller/AdminControllerPROD.php", "../classes/AdminController.php");

//copy("../img/fr.jpg", "../img/p/fr.php");
//copy("../img/fr-default-home.jpg", "../img/p/fr-default-home.jpg");
//copy("../img/fr-default-large.jpg", "../img/p/fr-default-large.jpg");
//copy("../img/fr-default-medium.jpg", "../img/p/fr-default-medium.jpg");
//copy("../img/fr-default-small.jpg", "../img/p/fr-default-small.jpg");
//copy("../img/fr-default-thickbox.jpg", "../img/p/fr-default-thickbox.jpg");

?>
<!--
<?php
function clean4db($strin){
	$in = array("'", '"');
	$out   = array("''", "''");
	$strout = str_replace($in,$out,$strin);
	return $strout;
}

	$con = mysqli_connect('localhost','root','','ps1609');
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

$results = mysqli_query($con,"select distinct name, id_category, link_rewrite from ps_category_lang where name like '%Rename%'");

if (!$results) {
	echo ("Error: " . mysqli_error($con));
}
	while($row = mysqli_fetch_array($results, true)) {
		$valueName = $row['name'];
		$newName = trim( substr($valueName, 0, stripos($valueName, "Rename") ) );
		$updateResult = mysqli_query($con,"update ps_category_lang set name = '" . clean4db($newName) . "' where id_category=" . $row['id_category']);
		if (!$updateResult) {
			echo ("Error: " . mysqli_error($con));
		} else {
			echo (" Success new name: " . $newName);
		}
		
		$valueLink = $row['link_rewrite'];
		$newLink = trim( substr($valueLink, 0, stripos($valueLink, "-rename") ) );
		$updateResult = mysqli_query($con,"update ps_category_lang set link_rewrite = '" . clean4db($newLink) . "' where id_category=" . $row['id_category']);
		if (!$updateResult) {
			echo ("Error: " . mysqli_error($con));
		} else {
			echo (" Success new link: " . $newLink);
		}
		
	}
	
	mysqli_query($con,"update ps_configuration set value=1 where name='PS_SHOP_ENABLE'");

	mysqli_close($con);

?>
 -->
<?php
//Db::getInstance()->getRow('update category_lang set `ps_product` WHERE `id_product` = '. 1);
?>
<html>
<body>
	<p>
		Mise à  jour effectuée. Merci de valider les données sur le <a
			href="/public/">site</a>.
	</p>
</body>
</html>
