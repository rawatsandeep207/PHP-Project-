<?php
session_start();
$isLoggedIn = isset($_SESSION['user']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Discuss</title>
<?php include './client/commonfiles.php'; ?>
</head>
<body>

<?php include './client/header.php'; ?>

<?php
if (isset($_GET['signup']) && !$isLoggedIn) {

    include './client/signup.php';

} elseif (isset($_GET['login']) && !$isLoggedIn) {

    include './client/login.php';

} elseif (isset($_GET['ask']) && $isLoggedIn) {

    include './client/ask.php';

} elseif (isset($_GET['q-id'])) {

    $qid = (int) $_GET['q-id'];
    include './client/question-details.php';

} elseif (isset($_GET['c-id'])) {

    $cid = (int) $_GET['c-id'];
    include './client/questions.php';

} elseif (isset($_GET['u-id'])) {

    $uid = (int) $_GET['u-id'];
    include './client/questions.php';

} elseif (isset($_GET['latest'])) {

    include './client/questions.php';

} else {

    // ✅ HOME PAGE (NO LOGIN FORCE)
    include './client/home.php';
}
?>

</body>
</html>
