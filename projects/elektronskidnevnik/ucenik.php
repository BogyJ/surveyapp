<?php
    require_once('establishDatabaseConnection.php');

    if (!isset($_SESSION['teacher']) || $_SESSION['teacher'] !== 0) {
        die("Morate da se ulogujete kao učenik.");
    }

    if (!isset($_SESSION['login']) || $_SESSION['login'] === FALSE) {
        header('Location: /');
    }
?>
<?php include('fragments/header.php') ?>
    <main>
        <div class="container d-flex flex-column align-content-center justify-content-center mt-3">
            <section class="shadow-lg p-3 mb-5 bg-white rounded">
                <h1>Uploaduj zadatak</h1>
                <form action="actions/task.php" method="post" enctype="multipart/form-data" id="form" class="mt-2">
                    <div class="d-inline-block">
                        <label for="formFile" class="form-label">Dozvoljeni fajlovi su: .jpg, .jpeg, .png</label>
                        <input class="form-control" accept=".jpg,.jpeg,.png" name="task" type="file" id="formFile">
                    </div>
                    <input type="submit" value="Upload" id="upload-btn" class="btn btn-primary d-block btn-upload">
                </form>
            </section>
            <div>
                <h1>Tvoje ocene</h1>
                <?php
                    require_once('establishDatabaseConnection.php');

                    $prep = $databaseConnection->getConnection()->prepare('SELECT * FROM grade WHERE grade.user_id = ?;');
                    $res = $prep->execute([$_SESSION['user_id']]);
                    $grades = [];

                    if ($res) {
                        $grades = $prep->fetchAll(PDO::FETCH_OBJ);
                        foreach ($grades as $grade) {
                            echo '
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Predmet</th>
                                      <th scope="col">Ocena</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <th scope="row">' . $grade->user_id . '</th>
                                      <td>' . $grade->subject . '</td>
                                      <td>' . $grade->mark . '</td>
                                    </tr>
                                  </tbody>
                                </table>
                            ';
                        }
                    }
                ?>
            </div>
        </div>
    </main>
    <script src="assets/js/upload.js"></script>
<?php include('fragments/footer.php') ?>

