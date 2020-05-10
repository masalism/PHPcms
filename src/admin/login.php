<?php require_once '../includes/header.php'; ?>
<?php require_once '../../bootstrap.php'; ?>
<?php require_once '../includes/navbar.php'; ?>

    <?php

    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_REQUEST['login'])) {
            $user = $entityManager->getRepository('User')->findBy(array('username' => $_REQUEST['username']));
            if ($user[0] !== NULL) {
                $password = $user[0]->getPassword();
                if ($password === $_REQUEST['password']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = $user[0]->getUsername();
                    header('Location: ' . DIRADMIN . 'admin.php');
                }
            }
        }
    }

    ?>

    <div class="container mt-5">
        <h1 class="display-4 my-5 text-center">Login to admin dashboard</h1>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username: mantas</label>
                    <input type="text" name="username" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="username">Password: test123</label>
                    <input type="password" name="password" class="form-control" id="">
                </div>
                <input type="submit" name="login" value="login" class="btn btn-success">
            </form>
        </div>
    </div>
    <?php require_once '../includes/footer.php'; ?>