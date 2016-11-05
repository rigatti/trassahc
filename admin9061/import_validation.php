<p>IMPORTATION DES CLIENTS</p>
<p>
	<font face="Verdana" size="1"><u>Import de fichier</u>:<br /> <?php


	//////////////////////////////////////////////////////////////////
	///	Modifier les valeurs des Variant ci-dessous 		//
	//////////////////////////////////////////////////////////////////
	$strDBNname = "ps1609"; // nom de la base de donn�es
	$strHostname_mysql= "localhost"; // nom ou adresse IP du serveur
	$strLogin = "root"; // Utilisateur pour la connexion � la base de donn�es
	$strPWD = ""; // Mot de passe pour la connexion � la base de donn�es
	$strFileToImport = "validation_web.txt"; // Nom du fichier � importer  !! il faut l'uploader avant
	$strOpenMode = "r"; // Type d'ouverture du fichier Ne pas modifier
	$strErrorOpen = "Ouverture du fichier " . $strFileToImport . " impossible!"; // Message d'erreur si fichier non trouv�
	$strTable = "tbl_societe"; // Table de la base de donn�es dans laquelle on importe les donn�es.
	$strdbField1 = "ref"; // Champ 1 de la base de donn�es
	$strdbField2 = "tarif"; // Champ 2 de la base de donn�es
	$strdbField3 = "code"; // Champ 3 de la base de donn�es
	$strdbField4 = "catrem"; // Champ 3 de la base de donn�es

	if (file_exists($strFileToImport)) // teste la pr�sence du fichier sur le serveue
	{									// debut de la boucle si le cfichier existe

		///////////////////////////////////////////////////////////////////
		/// Ne rien modifier en dessous de cette ligne			///
		///////////////////////////////////////////////////////////////////

		function clean4db($strin){
			$in = array("'", '"');
			$out   = array("''", "");
			$strout = str_replace($in,$out,$strin);
			return $strout;
		}

		$file = fopen($strFileToImport, $strOpenMode) or exit($strErrorOpen );
		$mysql_connexion = mysql_connect($strHostname_mysql,$strLogin,$strPWD);
		$i =0;
		$strsql = "Delete from ".$strTable.";";
		$outdb = mysql_db_query($strDBNname,$strsql);
		$nberror = 0;
		while(!feof($file)){
			$ligne = fgets($file);
			$i++;
			$arligne = explode("|", $ligne);
			$strVal1 = clean4db($arligne[0]);
			$strVal2 = clean4db($arligne[1]);
			$strVal3 = clean4db($arligne[2]);
			$strVal4 = clean4db($arligne[3]);

			$strsql = "Insert into ".$strTable."(".$strdbField1 .",".$strdbField2.",".$strdbField3.",".$strdbField4.")values('". $strVal1."','". $strVal2."','".$strVal3."','".$strVal4."');";
			$outdb = mysql_db_query($strDBNname,$strsql);
			//echo fgets($file);
			if(!$outdb){
				$nberror ++ ;
			}else
				;
			//echo $i."=>".$outdb."<br/>";
		}
		fclose($file);
		if ($nberror>0){
			echo "<font color='red'>".$nberror. " erreurs pendant l'import du fichier!</font>";
		}
		Else
		echo "<font color='blue'>Fichier $strFileToImport import� avec succ�s dans la base de donn�e $strDBNname!</font>";
		;
		unlink($strFileToImport); // on efface le chier sur le serveur pour ne pas avoir de piratage !
		//echo "fichier : ".$strFileToImport." effac� apr�s importation pour des raisons de securit�";


	} // fin de la boucle si le fichier existe
	else { print "Le fichier $strFileToImport ne se trouve pas sur le serveur. Vous devez l'envoyer via le FLEX";
	}  // message si le fichier n'est pas sur le serveur
	?> </font>
</p>
<p>&nbsp;</p>
