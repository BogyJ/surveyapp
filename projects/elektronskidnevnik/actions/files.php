<?php 
    include('../fragments/header.php');
    require_once('../establishDatabaseConnection.php');

    if (!isset($_SESSION['teacher']) || $_SESSION['teacher'] !== 1) {
        header('Location: /');
    }
    

?>
<main>
    <section>
        <?php 
            # Read files from /uploads directory and display them
            $target_dir = '../uploads/';

            echo '<div class="grid-images mt-5">';
            function renderHTML(array $files) {
                foreach ($files as $file) {
                    echo '
                        <img src="../uploads/' . $file . '" class="rounded uploaded-img">
                    ';
                }
            }

            function readFiles(string $dir): array {
                $files = array();

                if ($handle = opendir($dir)) {
                    while (FALSE !== ($file = readdir($handle))) {
                        if ($file != '.' && $file != '..') {
                            $files[] = $file;
                        }
                    }
                    closedir($handle);
                }
                return $files;
            }

            renderHTML(readFiles($target_dir));
            echo '</div>';
        ?>
    </section>
</main>
<script defer src="../assets/js/gallery.js"></script>
<?php include('../fragments/footer.php'); ?>
