<?php include('../../fragments/header.php'); ?>
    <main>
        <section>
            <?php
                require_once('../../establishDatabaseConnection.php');

                $mark = $_POST['grade'];
                $user_id = $_POST['user_id'];
                $subject = $_POST['subject'];

                if (!isset($mark) || !isset($user_id) || !isset($subject)) {
                    header('Location: /');
                }

               $prep = $databaseConnection->getConnection()->prepare("SELECT * FROM grade WHERE grade.user_id = ? AND grade.subject = ?;");
               $res = $prep->execute([intval($user_id), $subject]);

               if ($res) {
                   $ocena = $prep->fetch(PDO::FETCH_OBJ);
                   if ($ocena->subject != "") {
                        $_SESSION['message'] = 'Učenik je već ocenjen iz tog predmeta (' . $ocena->subject . ').';
                        header('Location: ../index.php');
                        die();
                   }
               }

                $prep = $databaseConnection->getConnection()->prepare("INSERT INTO grade(user_id, subject, mark) VALUES (?, ?, ?);");
                $res = $prep->execute([$user_id, $subject, $mark]);

                if ($res) {
                    $_SESSION['message'] = 'Učenik je ocenjen.';
                    header('Location: ../index.php');
                } else {
                    $_SESSION['message'] = 'Došlo je do greške.';
                    header('Location: ../index.php');
                }


            ?>
        </section>
    </main>
<?php include('../../fragments/footer.php'); ?>