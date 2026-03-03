<?php
session_start();
require_once __DIR__ . '/../common/dp.php';
if (isset($_POST['signup'])) {

    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $address  = trim($_POST['address']);

    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required");
    }

    $stmt = $conn->prepare(
        "INSERT INTO users (Username, Email, Password, Address)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("ssss", $username, $email, $password, $address);

    if ($stmt->execute()) {

        $_SESSION['user'] = [
            'user_id'  => $conn->insert_id,
            'username' => $username,
            'email'    => $email
        ];

        header("Location: /discuss");
        exit;
    }

    die("Signup failed");
}


else if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        // Save session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email']   = $user['email'];
        $_SESSION['address']    = $user['address'];

        // ADMIN LOGIN
        if ($user['address'] === 'admin') {
            $_SESSION['admin'] = true;
            header("Location: ../common/admin_dashboard.php");
            exit;
        }

        // NORMAL USER LOGIN
        header("Location: ..common/admin_dashboard.php");
        exit;

    } else {
        echo "Invalid Email or Password";
    }
}

/* ===================== LOGOUT ===================== */
elseif (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: /discuss");
    exit;
}

elseif (isset($_POST['ask'])) {

    if (!isset($_SESSION['user'])) {
        header("Location: /discuss");
        exit;
    }

    $title       = trim($_POST['title']);
    $description = trim($_POST['description']);
    $category_id = (int) $_POST['category_id'];
    $user_id     = (int) $_SESSION['user']['user_id'];

    $stmt = $conn->prepare(
        "INSERT INTO questions (Title, Description, Category_Id, User_Id)
         VALUES (?, ?, ?, ?)"
    );

    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /discuss");
        exit;
    }

    die("Failed to post question");
}

/* ===================== POST ANSWER ===================== */
elseif (isset($_POST['answer'])) {

    if (!isset($_SESSION['user'])) {
        header("Location: /discuss");
        exit;
    }

    $question_id = (int) $_POST['question_id'];
    $answer      = trim($_POST['answer']);
    $user_id     = (int) $_SESSION['user']['user_id'];

    $stmt = $conn->prepare(
        "INSERT INTO answers (Question_Id, Answer, User_Id)
         VALUES (?, ?, ?)"
    );

    $stmt->bind_param("isi", $question_id, $answer, $user_id);

    if ($stmt->execute()) {
        header("Location:/discuss/?q-id=" . $question_id);
        exit;
    }

    die("Failed to post answer");
}
