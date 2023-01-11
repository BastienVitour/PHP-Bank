<?php

class UserManager {
    private $db;

    function __construct($bdd){
        $this->db = $bdd;
    }

    public function insert(User $user) {
        $stmh = $this->db->prepare("INSERT INTO users(fullname, email, password, role, last_ip) VALUES(?, ?, ?, ?, ?)");
        $stmh->execute([
            $user->fullname, $user->email, $user->password, $user->role, $user->last_ip
        ]);
        return $this->db->lastInsertId();
    }

    public function getByEmail($email) {
        $stmh = $this->db->prepare("SELECT * FROM users where email = ?");
        $stmh->execute([$email]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmh->fetch();
        return $user;
    }

    public function getById($id) {
        $stmh = $this->db->prepare("SELECT * FROM users where id = ?");
        $stmh->execute([$id]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'User');
        $user = $stmh->fetch();
        return $user;
    }

}