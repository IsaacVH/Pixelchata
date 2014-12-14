<?php
	if(isset($_POST['email']) && isset($_POST['password'])) {
		if($_POST['email'] == "pixelchata@gmail.com" && $_POST['password'] == "bowchika") {
			echo "success";
		} else {
			echo "username/password mismatch";
		}
	}
?>