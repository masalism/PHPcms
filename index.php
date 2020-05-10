<?php
require_once 'bootstrap.php';

$pages = $entityManager->getRepository('Page')->findAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($pages as $page) : ?>
        <a href="<?php echo DIR . '?page=' . $page->getId(); ?>" class=""> <? echo $page->getTitle(); ?> </a>

    <?php endforeach; ?>
    <a href="<?php echo DIR . 'src/admin/admin.php' ?>">Admin</a>

    <div>
        <?php
        if (empty($pages)) {
            echo "No pages found";
        } else if (isset($_GET['page'])) {
            $id = $_GET['page'];
            $page = $entityManager->find('Page', $id);
            echo $page->getTitle();
            echo $page->getContent();
        } else {
            $id = $pages[0]->getId();
            $pages = $entityManager->find('Page', $id);
            echo $pages->getTitle();
            echo $pages->getContent();
        }

        // $id = $_GET['page'];
        // if (isset($_GET['page'])) {
        //     $page = $entityManager->find('Page', $id);
        //     echo $page->getTitle();
        //     echo $page->getContent();
        // }

        // echo $id;

        // if (isset($_GET['page']) != $id) {
        //     $pageId = $_GET['page'];
        //     echo $pageId;
        //     $page = $entityManager->find('Page', $pageId);
        //     echo $pages->getTitle();
        //     echo $pages->getContent();
        //     header("Location: " . DIR . "?page=" . $pageId);

        // }



        // if (!isset($_GET['page'])) {
        //     $id = $_GET['page'];
        //     $pages = $entityManager->find('Page', $id);
        //     echo $pages->getTitle();
        //     echo $pages->getContent();
        //     header("Location: " . DIR . "?page=" . $id);
        // }
        // 

        // if (empty($pages)) {
        //     header("Location: " . DIR);
        //     echo "No pages found";
        // } else {
        //     $pages = $entityManager->find('Page', $id[0]);
        //     echo $pages->getTitle();
        //     echo $pages->getContent();
        //     header("Location: " . DIR . "?page=" . $pages->id[0]);

        // $pages = $entityManager->find('Page', $id);
        // echo $pages->getTitle();
        // echo $pages->getContent();
        // }
        ?>
    </div>
    <?php
    // $pages = $entityManager->find('Page', $pages->getId());
    // echo $pages->getContent();
    ?>

</body>

</html>