<?php
    include('../fragments/header.php');

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES['task']['name']);
    $uploadOk = TRUE;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    if ($_FILES['task']['size'] > 500000) {
        echo "Fajl je preveliki.";
        $uploadOk = FALSE;
    }

    if (!$uploadOk) {
        echo "Fajl nije uploadovan.";
    } else {
        if (move_uploaded_file($_FILES['task']['tmp_name'], $target_file)) {
            echo "Fajl je uploadovan";
        } else {
            echo "Greška pri uploadovanju, proveri permissions.";
        }
    }

    include('../fragments/footer.php');
