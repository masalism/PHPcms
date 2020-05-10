<?php

// Add and Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_REQUEST['title']) && isset($_REQUEST['content']) && isset($_REQUEST['update_id'])) {
        $page = $entityManager->find('Page', $_REQUEST['update_id']);
        $page->setTitle($_REQUEST['title']);
        $page->setContent($_REQUEST['content']);
        $entityManager->flush();
        header("Location: " . DIRADMIN . "admin.php");
    } else  if (isset($_REQUEST['title']) && isset($_REQUEST['content'])) {
        $title = $_REQUEST['title'];
        $content = $_REQUEST['content'];
        $page = new Page();
        $page->setTitle($title);
        $page->setContent($content);
        $entityManager->persist($page);
        $entityManager->flush();
        header("Location: " . DIRADMIN . "admin.php");
    }
}

// Delete page
if (isset($_GET['delete'])) {
    $page = $entityManager->find('Page', $_GET['delete']);
    $entityManager->remove($page);
    $entityManager->flush();
    header("Location: " . DIRADMIN . "admin.php");
}
