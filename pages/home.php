<ul class="content-grid">
	<?php foreach ($tabs as $tab) { 
	if($tab['id'] != 'home'){
	?>
	<li class="<?php echo $tab['id'] ?> grid-item">
		<div class="inner-page-content">
			<?php include($_SERVER['DOCUMENT_ROOT']."/pages/".$tab['file']); ?>
		</div>
	</li>
	<?php }} ?>
</ul>