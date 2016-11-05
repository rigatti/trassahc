<?php 
$reference = 0;
$nom = 1;
$spec = 2;
$specOrdre = 3;
$cleClassement1 = 4;
$cleClassement2 = 5;
$description = 6;
$photo = 7;
$nomClassement1Order = 8;
$nomClassement2Order= 9;
$nomOrdre = 10;
$isActive=11;
$isInStock=12;
$pdf=13;
$tvaTx = 14;
$nomClassement1 = 15;
$nomClassement2 = 16;
$isNew = 17;
$filler1 = 18;
$prixPartHTVA = 19;
$prixProfHTVA = 20;
$filler2 = 21;
$promoTexte = 22;
$aLaUne = 23;
$quantity1PxRendu = 24;
$quantity2PxRendu = 25;
$quantity3PxRendu = 26;
$quantity4PxRendu = 27;
$quantity5PxRendu = 28;
$quantityPxRendu = 29;
$Pxtransport = 30;
$pourcentPxRendu = 31;
$unit = 32;
$pxRenduFlag = 33;

$strFileToImport = "Catalogue.txt"; // Nom du fichier ï¿½ importer
$strOpenMode = "r"; // Type d'ouverture du fichier Ne pas modifier
$strErrorOpen = "Ouverture du fichier " . $strFileToImport . " impossible!"; // Message d'erreur si fichier non trouvï¿½
?>
<!-- 
<?php
unlink("import/attribut.csv");
unlink("import/category.csv");
for ($i=0;$i<40;$i++) {
unlink("import/product" . $i . ".csv");
unlink("import/attribut" . $i . ".csv");
}

?>
-->
<?php
$file = fopen($strFileToImport, 'r') or exit($strErrorOpen );

$strErrorOpen = "Ouverture du fichier " . "category.csv" . " impossible!";
$catFile = fopen("category.csv", 'w') or exit($strErrorOpen );

$indexProductFileGlobal=0;
$indexProductFile=0;
$maxProductByFile = 20;
$strErrorOpen = "Ouverture du fichier " . "product" . $indexProductFile . ".csv" . " impossible!";
$prodFile = fopen("product" . $indexProductFile . ".csv", 'w') or exit($strErrorOpen );

$strErrorOpen = "Ouverture du fichier " . "attribut.csv" . " impossible!";
$attributFile = fopen("attribut.csv", 'w') or exit($strErrorOpen );

$nberror = 0;

$prodListValue = array();
$prodListImages;
$prodListId = array();
$catList = array();
$catListSorted = array();
$catNameTreated = array();
$categoryNameClassement1 = array();
$categoryNameClassement2 = array();
$prodListAttribute;

$productId = 0;
$categoryId = 2;

$categoryNbrTreated = 0;

$productLine = "";
$productImageTreated = 0;
while(!feof($file)){

	$ligne = fgets($file);

	$arligne = explode("|", $ligne);

	if (trim($ligne) != "" && $arligne[$nomClassement1] != "" && $arligne[$nomClassement2] != "") {

		if ( array_key_exists(strtoupper($arligne[$nomClassement1]), $catList) ) {
			//continue
			$finalNameClassement1 = $catList[strtoupper($arligne[$nomClassement1])];
		} else {

			// treat category names to avoid dupplicates

			$needsRenamingClassement1 = false;
			if ( array_key_exists(strtoupper($arligne[$nomClassement1]), $catNameTreated) ) {
				$needsRenamingClassement1 = true;
			}

			$catNameTreated[strtoupper($arligne[$nomClassement1])."-Home"] = "isset";


			if ( $needsRenamingClassement1 ) {
				$finalNameClassement1 = $arligne[$nomClassement1] . " RenameClassement1 " . $categoryNbrTreated;
			}else {
				$finalNameClassement1 = $arligne[$nomClassement1];
			}
			// end of treat category names to avoid dupplicates

			$catListSorted[$arligne[$nomClassement1Order] . "-Home"] = utf8_encode($finalNameClassement1) . "|" . "Accueil" . "\n";
			$catList[strtoupper($arligne[$nomClassement1])] = $finalNameClassement1;
			$categoryId += 1;

		}
		if ( array_key_exists(strtoupper($arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]), $catList) ) {
			// continue
		} else {

			if ( strtoupper($arligne[$nomClassement2]) == strtoupper($arligne[$nomClassement1]) ) {

				$categoryNameClassement2[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]] = $finalNameClassement1;
					
			} else {

				$categoryId += 1;

				// treat category names to avoid dupplicates

				$needsRenamingClassement1 = false;
				if ( array_key_exists(strtoupper($arligne[$nomClassement1]), $catNameTreated) ) {
					$needsRenamingClassement1 = true;
				}
					
				$needsRenamingClassement2 = false;
				if ( array_key_exists(strtoupper($arligne[$nomClassement2]), $catNameTreated) ) {
					$needsRenamingClassement2 = true;
				}
					
				$categoryNbrTreated++;
				$catNameTreated[strtoupper($arligne[$nomClassement2])] = "isset";

				// end of treat category names to avoid dupplicates

				if ( $needsRenamingClassement1 ) {
					$categoryNameClassement1[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]] = $arligne[$nomClassement1] . " RenameClassement1 " . $categoryNbrTreated;
				}else {
					$categoryNameClassement1[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]] = $arligne[$nomClassement1];
				}


				//if ( $needsRenamingClassement2 ) {
				$categoryNameClassement2[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]] = $arligne[$nomClassement2] . " RenameClassement2 " . $categoryNbrTreated;
				//}else {
				//	$categoryNameClassement2[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]] = $arligne[$nomClassement2];
				//}

				//$finalNameClassement1 = $categoryNameClassement1[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]];
				$finalNameClassement2 = $categoryNameClassement2[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]];

				$catListSorted[$arligne[$nomClassement1Order] . "-" . $arligne[$nomClassement2Order]] = utf8_encode($finalNameClassement2) . "|" . utf8_encode($finalNameClassement1) . "\n";
				$catList[strtoupper($arligne[$nomClassement2] . "|" . $arligne[$nomClassement1])] = "isset";

			}

		}

		$urlImg = "";

		if ( array_key_exists($arligne[$nom], $prodListId) ) {

			if ($arligne[$photo] != "" ) {
				$urlImg = "../img/import/" . $arligne[$photo];

				if ( ! strrpos ( $prodListValue[$arligne[$nom]], $urlImg) ) {
					$prodListValue[$arligne[$nom]] .= ";" . $urlImg;
					$prodListImages[$arligne[$nom]][$urlImg] = true;
					$nbrimg++;
				}
			}

			if ($prodIsNew[$arligne[$nom]] == 'NON' && $arligne[$isNew] == 'OUI') {
				$prodIsNew[$arligne[$nom]] = 'OUI';
			}

		} else {

			if ($arligne[$photo] != "" ) {

				$urlImg = "../img/import/" . $arligne[$photo];

				$prodListImages[$arligne[$nom]][$urlImg] = true;
				$nbrimg = 1;
			}

			$descriptionVar = str_replace("ï¿½","'",str_replace("/n","<br>",$arligne[$description]));

			$urlPdf = "";
			if ($arligne[$pdf] != "" ) {
				$urlPdf = "/documents/" . $arligne[$pdf];

				$descriptionVar = $descriptionVar . " <br> <br><a target='frmPDF' href='" . $urlPdf . "'>Description détaillée (format pdf)</a>";

			}

			$categoryList = $categoryNameClassement2[$arligne[$nomClassement2] . "|" . $arligne[$nomClassement1]];
			if ($arligne[$aLaUne] == "OUI") {
				$categoryList = $categoryList . ";Accueil";
			}
			$IDTaxGroup = 1;
			if ($arligne[$tvaTx] == 21) {
				$IDTaxGroup = 1;
			} else if ($arligne[$tvaTx] == 12) {
				$IDTaxGroup = 2;
			} else if ($arligne[$tvaTx] == 6) {
				$IDTaxGroup = 3;
			}

			$productLine = $arligne[$reference] . "|" . utf8_encode($arligne[$nom]) . "|" . utf8_encode($descriptionVar) . "|" . utf8_encode($categoryList) /*. "|" . $arligne[20] */. "|" . $IDTaxGroup  . "|" . $urlImg;

			$productId += 1;

			$prodListId[$arligne[$nom]] = $productId;
			$prodListValue[$arligne[$nom]] = $productLine;
			$prodIsNew[$arligne[$nom]] = $arligne[$isNew];
		}

		if ($arligne[$specOrdre] == "01") {
			$isDefault = 1;
		} else {
			$isDefault = 0;
		}

		$nbrStock = 0;
		if ($arligne[$isInStock] == "OUI") {
			$nbrStock = 10000;
		}
		$option = utf8_encode($arligne[$spec]);
		if (strlen($option) > 64) {
			$option = substr($option, 0, 61) . "...";
		}


		$shortNomOrdre = $arligne[$nomOrdre];
		$extraFieldOrdre = "0";
		if (strlen($shortNomOrdre) == 3) {
			$extraFieldOrdre = substr($shortNomOrdre, -1);
			$shortNomOrdre = substr($shortNomOrdre, 0, -1);
		}
		$currentKey = intval($arligne[$nomClassement1Order]) . "-" . intval($arligne[$nomClassement2Order]) . "-" . intval($shortNomOrdre) . "-" . intval($extraFieldOrdre);
		$prodListNames[$currentKey] = $arligne[$nom];

		$prodListAttribute[$arligne[$nom]][$arligne[$reference]] = $arligne[$reference] . "|" . utf8_encode("Sélection=") . $option . /*"|" . $arligne[1] . */ "|" . ( $arligne[$prixPartHTVA] * (($arligne[$tvaTx] / 100) + 1) ) . "|" . $arligne[$prixProfHTVA] . "|" . $nbrStock . "|" . $isDefault;
		$prodListAttributeImageUrl[$arligne[$nom]][$arligne[$reference]] = $urlImg;

		//if ($isDefault == 1) {
		//	$isDefault = 0;
		//}
	}
}

//fwrite($catFile, $categoryId . "|" . utf8_encode($arligne[$nomClassement1]) . "|" . "Home" . "\n");
//$catListSorted($arligne[nomClassement1Order] . "-" . $arligne[nomClassement2Order])

$catIndex = 2;
for ($i=0 ; $i<100; $i +=1 ) {
	$index_i = $i;
	if ($i < 10) {
		$index_i = "0" . $index_i;
	}
	if ( isset($catListSorted[$index_i . "-Home"]) ) {
		fwrite($catFile, $catIndex . "|" . $catListSorted[$index_i . "-Home"]);
		$catIndex += 1;
	}

	for ($j=0 ; $j<100; $j +=1 ) {
		$index_j = $j;
		if ($j < 10) {
			$index_j = "0" . $index_j;
		}
		if ( isset($catListSorted[$index_i . "-" . $index_j]) ) {
			fwrite($catFile, $catIndex . "|" . $catListSorted[$index_i . "-" . $index_j]);
			$catIndex +=1;
		}
	}
}

//print_r($prodListNames);
$globalIndexImg = 0;
$productId = 0;
for ($i = 0 ; $i < 100 ; $i+=1) {
	for ($j = 0 ; $j < 100 ; $j+=1) {
		for ($k = 0 ; $k < 100 ; $k+=1) {
			for ($l = 0 ; $l < 10 ; $l+=1) {
				if (isset($prodListNames[$i . "-" . $j . "-" . $k . "-" . $l]) ) {

					$keyName = $prodListNames[$i . "-" . $j . "-" . $k . "-" . $l];
					$productId++;

					//$isNewDate = "01-01-1900";
					//if ($prodIsNew[$keyName] == "NON") {
					//	$isNewDate = date('Y-m-d H:i:s');
					//}

					$value = $prodListValue[$keyName] .  "|" . $prodIsNew[$keyName];

					// write products
					fwrite($prodFile, $value . "\n");

					$indexProductFileGlobal++;
					if  (stripos($indexProductFileGlobal / $maxProductByFile, ".") == "") {
						fclose($prodFile);
						copy("product" . $indexProductFile . ".csv", "import/" . "product" . $indexProductFile . ".csv");
						$indexProductFile++;
						$prodFile = fopen("product" . $indexProductFile . ".csv", 'w') or exit($strErrorOpen );
					}

					$attributeIndex = 1;
					//write attributes
					foreach ($prodListAttribute[$keyName] as $keyReference => $attributeValue) {

						$currentImgUrl = $prodListAttributeImageUrl[$keyName][$keyReference];
						$currentImgs = "";
						$currentIndexImg = $globalIndexImg;
						$defaultImgIndex="";
						if (isset($prodListImages[$keyName])) {
							foreach ($prodListImages[$keyName] as $imgName => $imgIsSet) {
								$currentIndexImg++;
								if ($imgName == $currentImgUrl) {
									$currentImgs += $currentIndexImg . ";";
									$prodListImages[$keyName][$imgName] = $currentIndexImg;
								}
							}
							// in case that no img selected but default exist, assign the default img.
							// or set the "no img available"
						}
						fwrite($attributFile, $productId . "|" . $attributeValue . "|" . $currentImgs . "|" . $attributeIndex . "\n");
						$attributeIndex++;

					}
					if (isset($prodListImages[$keyName])) {
						$globalIndexImg += count($prodListImages[$keyName]);
					}
				}
			}
		}
	}
}

fclose($file);
fclose($catFile);
copy("category.csv", "import/" . "category.csv");

fclose($prodFile);
copy("product" . $indexProductFile . ".csv", "import/" . "product" . $indexProductFile . ".csv");

fclose($attributFile);

// split attributes file
$maxAttributeByFile = 50;
$attributeIndex = 0;
$totalIndexAttributeFiles = 0;
$attributFile = fopen("attribut.csv", 'r') or exit($strErrorOpen );
$attributFileSplitted = fopen("import/attribut" . $totalIndexAttributeFiles . ".csv", 'w') or exit($strErrorOpen );
while(!feof($attributFile)){
	$attributeIndex++;
	if  (stripos($attributeIndex / $maxAttributeByFile, ".") == "") {
			fclose($attributFileSplitted);
			$totalIndexAttributeFiles++;
			$attributFileSplitted = fopen("import/attribut" . $totalIndexAttributeFiles . ".csv", 'w') or exit($strErrorOpen );
	}
	$currentLine = fgets($attributFile);
	if (strcmp(trim($currentLine),"") != 0){
		fwrite($attributFileSplitted,$currentLine);
	}
}
fclose($attributFileSplitted);
fclose($attributFile);

//copy("attribut.txt", "import/" . "attribut.txt");
rename( $strFileToImport , $strFileToImport . date('Y-m-d') . "-" . time() . ".txt");

copy("../classes/EmployeeDEV.php", "../classes/Employee.php");
copy("../classes/controller/AdminControllerDEV.php", "../classes/controller/AdminController.php");


?>
<html>
<body
	onload="this.location.href='addCategory.php?p=<?php echo $indexProductFile?>&attr=<?php echo $totalIndexAttributeFiles?>'">
	Mise à jour en cours
	<br>
	<!-- .com : 04b8528b7b2f77be2f12520159dc5ec5 -->
	<!-- .local : 528210c420e65ce1c6d645bb1788db4e -->
	<ifr id="iframeCategory"
		src="index.php?tab=AdminBackup&addbackup&token=528210c420e65ce1c6d645bb1788db4e">
	</iframe>

</body>
</html>
