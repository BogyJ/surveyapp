<?php 
require_once('../establishDatabaseConnection.php');
include('../fragments/header.php');

if (!isset($_GET['pupil_id'])) {
  header('Location: /');
}

if (!isset($_SESSION['teacher']) || $_SESSION['teacher'] !== 1) {
  header('Location: /');
}

?>

<a href="actions/assess.php?pupil_id=<?php echo $_GET['pupil_id']; ?>" class="btn btn-danger" style="margin: 10px auto 0 auto; display:block; width: 160px;">Oceni</a>

<?php
    $prep = $databaseConnection->getConnection()->prepare('SELECT * FROM grade WHERE grade.user_id = ?;');
    $res = $prep->execute([$_GET['pupil_id']]);
    $grades = [];

    if ($res) {
        $grades = $prep->fetchAll(PDO::FETCH_OBJ);
        echo '<main><section><div class="container">';
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
        echo '</div></section></main>';
    }
?>
    

<?php include('../fragments/footer.php') ?>
