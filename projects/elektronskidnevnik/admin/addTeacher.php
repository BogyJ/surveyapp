<?php
    require_once('../establishDatabaseConnection.php');

    if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1) {
        header('Location: /');
    }
?>

<?php include('../fragments/header.php'); ?>

<main>
    <section>
        <div class="container mt-5">
            <h1 class="display-2">Dodaj nastavnika</h1>
            <form action="registerTeacher.php" method="post" class="row g-3 needs-validation" novalidate>
                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">Ime</label>
                    <input type="text" class="form-control" id="validationCustom01" name="forename" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Prezime</label>
                    <input type="text" class="form-control" id="validationCustom02" name="surname" required>
                    <div class="valid-feedback">
                        Okay!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="validationCustomUsername" class="form-label">Korisničko ime</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="validationCustomUsername" name="username" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Molimo Vas izaberite korisničko ime.
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom03" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="validationCustom03" name="email" required>
                    <div class="invalid-feedback">
                        Molimo Vas, unesite ispravni e-mail.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom04" class="form-label">Lozinka</label>
                    <input type="password" class="form-control password" id="validationCustom04" name="password" required>
                    <div class="invalid-feedback">
                        Lozinke se ne podudaraju.
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Potvrdi lozinku</label>
                    <input type="password" class="form-control confirm-password" id="validationCustom05" required>
                    <div class="invalid-feedback">
                        Lozinke se ne podudaraju.
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Registruj nastavnika</button>
                </div>
            </form>
        </div>
    </section>
</main>
<script src="../assets/js/script.js"></script>

<?php include('../fragments/footer.php'); ?>
