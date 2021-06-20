<?php
    include('../fragments/header.php');

    require_once('../establishDatabaseConnection.php');

    if (!isset($_SESSION['teacher']) || $_SESSION['teacher'] !== 1) {
      header('Location: /');
  }

    $prep = $databaseConnection->getConnection()->prepare('SELECT * FROM user WHERE is_teacher != 1;');
    $res = $prep->execute();
    $users = [];

    if ($res) {
        $users = $prep->fetchAll(PDO::FETCH_OBJ);

        echo '<main><section><div class="container">';
        foreach($users as $user) {
            echo '
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Ime</th>
                  <th scope="col">Prezime</th>
                  <th scope="col">Oceni</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">' . $user->user_id . '</th>
                  <td>' . $user->forename . '</td>
                  <td>' . $user->surname . '</td>
                  <td><a href="grades.php?pupil_id='. $user->user_id . '" class="btn btn-danger">Oceni učenika</a></td>
                </tr>
              </tbody>
            </table>
                ' . '<br><br>
        ';

        }
        echo '<a href="/" class="btn btn-info mb-3">Početna</a></div></section></main>';
    }
    include('../fragments/footer.php');
