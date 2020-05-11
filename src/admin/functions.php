<?php


// Update page
if (isset($_POST['update'])) {
    $id =  $_POST['update_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $page = $entityManager->find('Page', $id);
    $page->setTitle($title);
    $page->setContent($content);
    $entityManager->flush();
    header("Location: " . DIRADMIN . "admin.php");
}

// Add new page
if (isset($_POST['new'])) {
    $title = $_REQUEST['title'];
    $content = $_REQUEST['content'];
    $page = new Page();
    $page->setTitle($title);
    $page->setContent($content);
    $entityManager->persist($page);
    $entityManager->flush();
    header("Location: " . DIRADMIN . "admin.php");
}

// Delete page
if (isset($_GET['delete'])) {
    $page = $entityManager->find('Page', $_GET['delete']);
    $entityManager->remove($page);
    $entityManager->flush();
    header("Location: " . DIRADMIN . "admin.php");
}
