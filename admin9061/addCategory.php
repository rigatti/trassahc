<?php 
//include('../classes/ToolsCore.php');
include_once('../config/defines.inc.php');
include_once('../classes/db/Db.php');

$con = mysqli_connect('localhost','root','','ps1609');

if (mysqli_connect_errno()) {

	echo "Failed to connect to MySQL: " . mysqli_connect_error();

} else {

	mysqli_query($con,"update ps_configuration set value=0 where name='PS_SHOP_ENABLE'");
	mysqli_close($con);
	?>
<html>
<body
	onload="this.location.href='addProduct.php?current=0&p=<?php echo $_GET["p"]?>&attr=<?php echo $_GET["attr"]?>'">
	Mise à jour des catégories en cours
	<br>
	<!-- .com : 04b8528b7b2f77be2f12520159dc5ec5 -->
	<!-- .local : 528210c420e65ce1c6d645bb1788db4e -->
	<iframe id="iframeCategory"
		src="index.php?tab=AdminImport&token=528210c420e65ce1c6d645bb1788db4e&convert=&csv=category.csv&regenerate=&match_ref=on&iso_lang=fr&entity=0&forceIDs=1&import=1&multiple_value_separator=;&separator=|&skip=0&truncate=1&type_value[0]=no&type_value[1]=name&type_value[2]=parent"></iframe>
</body>
</html>
<?php 
}
?>