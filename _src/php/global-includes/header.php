<nav class="outer-nav before-login navy-theme">
	<h1 class="title"><?php echo strtoupper($name); ?></h1>
	<ul>
		<?php foreach($tabs as $tab){
			$selected = $page == $tab['id'] ? " selected" : "";
			echo "
			<li data-tab='".$tab['id']."' class='nav-icon ".$tab['id']."$selected'>
					<div>
						<img class='icon' src='/_assets/icons/".$tab['icon']."'/>
						<span>".$tab['text']."</span>
					</div>
			</li>\n
			";
		} ?>
	</ul>
</nav>