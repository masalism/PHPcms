<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php require_once "../../bootstrap.php"; ?>
    <?php require_once "functions.php"; ?>
    <?php
    $pages = $entityManager->getRepository("Page")->findAll();
    ?>

    <button>
        <a href="?new"">New Page</a>
    </button>

    <table>
        <thead>
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

    <?php if (isset($_GET["update"])) : ?>
        <?php $page = $entityManager->find("Page", $_GET["update"]); ?>
        <form action="" method="POST">
            <input type="hidden" name="update_id" value="<?php echo $page->getId(); ?>">
            <div class="form-group">
                <input class="form-control" type="text" name="title" value="<?php echo $page->getTitle(); ?>">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="content" rows="3"><?php echo $page->getContent(); ?></textarea>
            </div>
            <div class="form-group">
                <input type="submit">
            </div>
        </form>
    <?php endif; ?>

    <?php if (isset($_GET["new"])) : ?>
        <form action="" method="POST">
            <div class="form-group">
                <input class="form-control" type="text" name="title" placeholder="Page title">
            </div>
            <div class="form-group">
                <textarea class="form-control" type="text" name="content" placeholder="Page Content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <input type="submit">
            </div>
        </form>
    <?php endif; ?>

</body>

</html>