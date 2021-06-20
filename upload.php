<?php
	# var_dump($_FILES["file-upload"]);
	# 5000kb = 5MB
	# 5000000b = 5MB

	if ($_FILES["file-upload"]["size"] < 1000000) {
		$fileName = basename($_FILES["file-upload"]["name"]);

		if (move_uploaded_file($_FILES["file-upload"]["tmp_name"], "uploads/" . $fileName)) {
			echo "File uploaded.";
		} else {
			echo "Error uploading file, check permissions.";
		}

	} else {
		echo "File is too big";
	}
