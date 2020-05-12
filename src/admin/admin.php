<?php require_once "../includes/header.php" ?>
<?php require_once "../../bootstrap.php"; ?>
<?php require_once "../helpers/sessionHelper.php"; ?>
<?php require_once "./functions.php"; ?>

<?php

session_start();

if (!$_SESSION['logged_in']) {
    header("Location: " . DIRADMIN . "login.php");
}

if (isset($_GET['logout'])) {
    logOut();
}

$pages = $entityManager->getRepository("Page")->findAll();
?>

<div class="bg-light">
    <div class="container py-3 d-flex justify-content-between align-items-center">
        <div >
            <h1 class="display-6 mr-3">DASHBOARD</h1>
        </div>
        <div class="d-flex align-items-center">
            <a class="btn btn-success mr-3" href="<?php echo DIR; ?>"">Site</a>
            <a class=" btn btn-danger" href="?logout"">Log Out</a>
        </div>
    </div>
</div>
    

<div class=" container">
    <table class="table mt-5">
        <thead class="thead-dark">
            <tr>
                <th>Page</th>
                <th>Actions</th>
            </tr>
                </thead>
                <tbody>
                        <?php foreach ($pages as $page) : ?>
                            <tr>
                                <td><?php echo $page->getTitle(); ?></td>
                                <td>
                                    <a href=" <?php echo DIRADMIN . "admin.php?update=" . $page->getId(); ?>">EDIT</a>
                                    <a href="<?php echo DIRADMIN . "admin.php?delete=" . $page->getId(); ?>">DELETE</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class=" btn btn-primary mb-3" href=" ?new"">New Page</a>

               

        <?php if (isset($_GET["update"])) : ?>
            <?php $page = $entityManager->find('Page', $_GET['update']); ?>

            <form action="" method="POST">
                    <input type="hidden" name="update_id" value="<?php echo $page->getId(); ?>">
                    <div class="form-group">
                        <input class="form-control" type="text" name="title" value="<?php echo $page->getTitle(); ?>">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" type="text" name="content" rows="3"><?php echo $page->getContent(); ?></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-info" type="submit" name="update">
                    </div>
                    </form>
                <?php endif; ?>

                <?php if (isset($_GET['new'])) : ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input class="form-control" type="text" name="title" placeholder="Page title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" type="text" name="content" placeholder="Page Content"></textarea>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" name="new">
                        </div>
                    </form>
                <?php endif; ?>
        </div>
        <?php require_once "../includes/footer.php" ?>