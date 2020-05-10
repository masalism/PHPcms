<?php
session_start();
$pages = $entityManager->getRepository('Page')->findAll();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="<?php echo DIR; ?>">My CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <?php foreach ($pages as $page) : ?>
                    <a href="<?php echo DIR . '?page=' . $page->getId(); ?>" class="nav-item nav-link"> <? echo $page->getTitle(); ?> </a>
                <?php endforeach; ?>
            </div>
            <a href="<?php echo DIR . 'src/admin/admin.php' ?>" class="btn  btn-outline-dark ml-auto">Admin</a>
        </div>
    </div>
</nav>