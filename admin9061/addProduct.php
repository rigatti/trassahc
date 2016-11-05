<html>
<?php
$indexProductFile = $_GET["p"];
if (! isset($indexProductFile)) {
	$indexProductFile = 0;
}
$i = $_GET["current"];
if (! isset($i)) {
	$i = 0;
}

$redirectTo = "addAttribute.php?attrCurrent=0&attr=" . $_GET["attr" ];
if ($i < ($indexProductFile)) {
	$redirectTo = "addProduct.php?current=" . ($i + 1) . "&p=" . $indexProductFile . "&attr=" . $_GET["attr"];
}
?>
<body onload="this.location.href='<?php echo $redirectTo ?>'">
	Mise à jour des produits(
	<?php echo $i +1 ?>
	/
	<?php echo ($indexProductFile + 1) ?>
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

	<iframe id="iframeProduct<?php echo $i ?>"
		src="index.php?tab=AdminImport&token=528210c420e65ce1c6d645bb1788db4e&convert=&csv=product<?php echo $i ?>.csv&regenerate=&match_ref=on&entity=1&iso_lang=fr&forceIDs=1&import=1&multiple_value_separator=;&separator=|&skip=0&truncate=<?php echo $truncateValue ?>&type_value[0]=id&type_value[1]=name&type_value[2]=description&type_value[3]=category&type_value[4]=id_tax_rules_group&type_value[5]=image&type_value[6]=isNew"></iframe>
</body>
</html>
