<?php 
	$page = "";

	if(isset($_GET["page"])) {
		$page = $_GET["page"];
	} 

	$site = "Pixelchata";
	
	$xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT']."/pages/".strtolower($site)."/_config.xml")
			or die("Error: Cannot load config file.");

	$name = $xml->name;
	$logo = $xml->logo;
	$tabs = array();
	foreach ($xml->tabs[0]->tab as $tab) {
		array_push($tabs, [
			"id" 	=> $tab->id,
			"text" 	=> $tab->text,
			"link" 	=> $tab->link,
			"icon" 	=> $tab->icon,
			"color" => $tab->color,
			"file"	=> $tab->file,
			"style" => $tab->style
		]);
	}

	$sdocroot = $_SERVER["DOCUMENT_ROOT"];
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<title><?php echo ucfirst($name); ?></title>
		<link rel='shortcut icon' href="/pixelchata.png">
		<?php require($sdocroot."/_src/php/global-includes/styles.php"); ?>
		<?php 
			echo "<style>"; 
			foreach($tabs as $tab){ echo ".outer-nav .nav-icon.".$tab['id'].".selected { border-bottom-color: ".$tab['color']."; }\n"; } 
			echo "</style>"; 
		?>
		<?php foreach($tabs as $tab) { echo "<link rel='stylesheet' href='/pages/$site/css/".$tab['style']."'>"; } ?>
	</head>
	<body>
		<?php require($sdocroot.'/_src/php/global-includes/header.php'); ?>
		<?php require($sdocroot.'/_src/php/global-includes/background.php'); ?>
		<?php require($sdocroot.'/_src/php/login-form.php'); ?>
		<div class="container">
			<div class="wrapper">
				<?php foreach($tabs as $tab) { ?>
				<div class="page hide <?php echo $tab['id'];?>">
					<div class="header" style="background-color: <?php echo $tab['color'] ?>;"><h2><?php echo ucwords($tab['id']); ?></h2></div>
					<div class="content">
						<?php include($sdocroot.'/pages/'.$site.'/'.$tab['file']); ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<?php require($sdocroot.'/_src/php/global-includes/scripts.php'); ?>
		<script src="_src/js/global/outputstream.js"></script>
	</body>
</html>