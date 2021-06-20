<?php
    require_once('../establishDatabaseConnection.php');

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1) {
        header('Location: /');
    }
?>

<?php include('../fragments/header.php'); ?>

<main>
    <section>
        <?php
            if (isset($_SESSION['message'])) {
                echo '<div class="container mt-5 d-flex justify-content-center"><p class="lead fs-2">' . $_SESSION['message'] . "</p></div>";
                unset($_SESSION['message']);
            }
        ?>
        
        <div class="container d-flex flex-column justify-content-center align-items-center mt-5">
            <a href="../teacher/showAllPupils.php" class="btn btn-primary fs-3">Lista ucenika</a>
            <a href="../teacher/addPupil.php" class="btn btn-primary fs-3 mt-3">Dodaj novog ucenika</a>
            <a href="addTeacher.php" class="btn btn-primary fs-3 mt-3">Dodaj novog nastavnika</a>
        </div>
    </section>
</main>

<?php include('../fragments/footer.php'); ?>

