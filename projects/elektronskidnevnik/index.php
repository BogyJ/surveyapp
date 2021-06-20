<?php include('fragments/header.php'); ?>
<main>
    <section>
        <?php
            require_once('establishDatabaseConnection.php');

            if (isset($_SESSION['login']) && $_SESSION['login']) {
                if (isset($_SESSION['message'])) {
                    echo '<div class="container mt-5 d-flex justify-content-center"><p class="lead fs-2">' . $_SESSION['message'] . "</p></div>";
                    unset($_SESSION['message']);
                }

                echo '<div class="container d-flex justify-content-center mt-5"><p class="lead fs-2">Ulogovani ste kao: '. $_SESSION['forename'] . '</p></div><br><br>';
                echo '<div class="container d-flex justify-content-center"><a href="/actions/logout.php" class="login-btn btn btn-danger mb-3">Izloguj se</a></div>';

                if (isset($_SESSION['teacher']) && $_SESSION['teacher'] === 1 && $_SESSION['admin'] === 0) {
                    echo '<div class="container d-flex justify-content-center"><a href="/teacher/index.php" class="login-btn btn btn-primary">Profil</a></div>';
                } elseif (isset($_SESSION['teacher']) && $_SESSION['teacher'] !== 1 && $_SESSION['admin'] === 0) {
                    echo '<div class="container d-flex justify-content-center mt-3"><a href="/ucenik.php" class="login-btn btn btn-primary">Profil</a></div>';
                } else {
                    echo '<div class="container d-flex justify-content-center mt-3"><a href="/admin/admin.php" class="login-btn btn btn-primary">Profil</a></div>';
                }
            } else {
                echo '
                    <div class="container-sm mt-5">
                        <h1 class="display-3">Ulogujte se</h1>
                        <form action="actions/login.php" method="post" class="mt-5">
                          <div class="form-floating mb-3">
                              <input type="text" class="form-control" id="floatingInput" name="username" placeholder="name@example.com, ppetrovic">
                              <label for="floatingInput">E-mail adresa ili korisničko ime</label>
                          </div>
                        <div class="form-floating">
                          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                          <label for="floatingPassword">Lozinka</label>
                        </div>
                          <button type="submit" class="btn btn-primary mt-4">Login</button>
                        </form>
                    </div>
                ';
            }
        ?>
    </section>
</main>

<?php include('fragments/footer.php'); ?>
