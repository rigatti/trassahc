<html>
<?php
$indexAttributeFile = $_GET["attr"];
if (! isset($indexAttributeFile)) {
	$indexAttributeFile = 0;
}
$i = $_GET["attrCurrent"];
if (! isset($i)) {
	$i = 0;
}

$redirectTo = "addCompleted.php";
if ($i < ($indexAttributeFile)) {
	$redirectTo = "addAttribute.php";
}
?>
<body onload="window.document.frmNext.submit();">
	<form name="frmNext" id="frmNext" action="<?php echo $redirectTo ?>"
		method="get">
		<input type="hidden" value="<?php echo ($i + 1) ?>" name="attrCurrent">
		<input type="hidden" value="<?php echo ($indexAttributeFile) ?>"
			name="attr">
	</form>

	Mise à jour des combinaisons de produits(
	<?php echo $i +1 ?>
	/
	<?php echo ($indexAttributeFile + 1) ?>
	) en cours
	<br>
	<?php 

	if ($i == 0) {
		$truncateValue = 1;
	} else {
		$truncateValue = 0;
	}?>
	<!-- .com : 04b8528b7b2f77be2f12520159dc5ec5 -->
	<!-- .local : 528210c420e65ce1c6d645bb1788db4e -->
	<iframe id="iframeAttribute"
		src="index.php?tab=AdminImport&token=528210c420e65ce1c6d645bb1788db4e&convert=&csv=attribut<?php echo $i ?>.csv&entity=2&iso_lang=fr&regenerate=&import=1&multiple_value_separator=;&separator=|&skip=0&truncate=<?php echo $truncateValue ?>&type_value[0]=id_product&type_value[1]=reference&type_value[2]=group&type_value[3]=price&type_value[4]=wholesale_price&type_value[5]=quantity&type_value[6]=default_on&type_value[7]=image_position&type_value[8]=attribute"></iframe>
</body>
</html>
