<?php require_once 'bootstrap.php'; ?>
<?php require_once 'src/includes/header.php'; ?>
<?php require_once 'src/includes/navbar.php'; ?>
<?php
if (isset($_GET['logout'])) {
    logOut();
}
?>

<div class="container">
    <?php if (empty($pages)) : ?>
        <h1 class="text-center display-3 text-danger mt-4"><?php echo "No pages found. Please create new page!" ?></h1>
    <?php elseif (!isset($_GET['page'])) : ?>
        <?php
        $id = $pages[0]->getId();
        $pages = $entityManager->find('Page', $id);
        ?>
        <h1 class="text-center display-3 text-success text-bold mt-4"><?php echo $pages->getTitle(); ?></h1>
        <p class="text-muted text-center p-5"><?php echo $pages->getContent(); ?></p>
    <?php else : ?>
        <?php
        $id = $_GET['page'];
        $pages = $entityManager->find('Page', $id);
        ?>
        <h1 class="text-center display-3 text-success text-bold mt-4"><?php echo $pages->getTitle(); ?></h1>
        <p class="text-muted text-center p-5"><?php echo $pages->getContent(); ?></p>
    <?php endif;  ?>
</div>

<?php require_once 'src/includes/footer.php'; ?>