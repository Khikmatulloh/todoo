<?php

declare(strict_types=1);

class User
{
    public function create()
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email    = $_POST['email'];
            $password = $_POST['password'];

            $db   = DB::connect();
            $stmt = $db->prepare("INSERT INTO tasks (email, password) VALUES (:email, :password)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();

            echo $result ? 'New record created successfully' : 'Something went wrong';
        }
    }
    public function login(): void {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $db = DB::connect(); // FIXME: move to constructor
        $stmt = $db->prepare("SELECT * FROM tasks WHERE email = :email AND password = :password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $_SESSION['user'] = $user['email'];
            header('Location: /');
            exit();
        } else {
            echo 'Email or password is incorrect'; 
        }
    }
    public function isUserExists(): bool {
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
            $db = DB::connect();
            $stmt = $db->prepare("SELECT * FROM tasks WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            return (bool) $stmt->fetch();
        }
        return false;
    }
    public function register()
    {
        if ($this->isUserExists()) {
            echo "User already exists"; 
            return;
        }

        $user = $this->create();

        $_SESSION['user'] = $user['email'];
        header('Location: /');
    }




}