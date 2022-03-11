<?php

namespace App;

class User
{
    public int $userId;
    public string $username;
    public string $email;
    public string $password;

    public function __construct()
    {
    }

    public function addUser($username, $email, $password)
    {
        DB::getInstance()->exec("INSERT INTO Users (username, email, password)  VALUES ('$username','$email','$password')");
    }

    public function getUser($email)
    {
        $sql = DB::getInstance()->prepare(
            "Select * from Users where email ='$email'"
        );
        $sql->execute();
        $result = $sql->setFetchMode(\PDO::FETCH_ASSOC);
        foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
            return $v;
        }
    }



    public function checkUser($email, $password)
    {
        $sql = DB::getInstance()->prepare("Select * from Users where email = '$email' ");
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        $user = $sql->fetch();
        if ($user == '') {
            return "Account Don't Exists";
        }
        if ($user['password'] != $password) {
            return "Password Don't match";
        }
        if ($user['status'] == 'Restricted') {
            return "Wait for Approval";
        }
        return $user;
        // foreach (new \RecursiveArrayIterator($sql->fetchAll()) as $k => $v) {
        //     return $v;
        // }
    }

    public function deleteUser($userId)
    {
        $sql = DB::getInstance()->prepare(
            "Delete from Users where userId = '$userId'"
        );
        $sql->execute();
        $sql->setFetchMode(\PDO::FETCH_ASSOC);
        return 'delete';
    }

    public function approveUser($userId)
    {
        $sql = "UPDATE Users SET status =? where userId = '$userId'";
        $stmt = DB::getInstance()->prepare($sql);
        $stmt->execute(['Approved']);
        return $userId;
    }

    public function restrictUser($userId)
    {
        DB::getInstance()->exec(
            "UPDATE Users SET status = 'Restricted' where userId = '$userId'"
        );
        return $userId;
    }
}
