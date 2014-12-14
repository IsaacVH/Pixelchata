<div class="content-grid">
	<?php foreach ($tabs as $tab) { 
	if($tab['id'] != 'home'){
	?>
	<div class="<?php echo $tab['id'] ?> grid-item">
		<?php include($_SERVER['DOCUMENT_ROOT']."/pages/".$site."/".$tab['file']); ?>
	</div>
	<?php }} ?>
</div>