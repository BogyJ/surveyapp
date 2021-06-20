<?php include('../../fragments/header.php'); ?>
<main>
    <section>
        <div class="container">
            <form action="addMark.php" method="post" class="mt-5 row gx-3 gy-2 align-items-center">
                <div class="col-sm-3">
                    <?php
                        if (!isset($_GET['pupil_id'])) {
                            header('Location: /');
                        }
                    ?>
                    <label for="specificSizeInputName">Ucenik ID: <?php echo strip_tags($_GET['pupil_id']); ?></label>
                    <input type="hidden" class="form-control" id="specificSizeInputName" name="user_id" value="<?php echo $_GET['pupil_id']; ?>">
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden" for="specificSizeInputName">Ocena</label>
                    <input type="number" class="form-control" id="specificSizeInputName" name="grade" min="1" max="5" placeholder="Ocena (izmedju 1 i 5)">
                </div>
                <div class="col-sm-3">
                    <label class="visually-hidden" for="specificSizeSelect">Predmet</label>
                    <select class="form-select" name="subject" id="specificSizeSelect">
                        <option selected disabled>Izaberi...</option>
                        <option value="Srpski jezik">Srpksi jezik</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Fizika">Fizika</option>
                        <option value="Hemija">Hemija</option>
                        <option value="Fizičko">Fizičko</option>
                        <option value="Likovna kultura">Likovna kultura</option>
                        <option value="Muzička kultura">Muzička kultura</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Oceni učenika</button>
                </div>
            </form>
        </div>
    </section>
</main>
<?php include('../../fragments/footer.php'); ?>
