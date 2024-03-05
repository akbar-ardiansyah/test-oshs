<?php

class User_model
{
    private $table = '_users';
    private $db;

      public function __construct()
    {
        $this->db = new Database;
    }

    public function login($email, $password)
    {
        $this->db->query("SELECT * FROM _users WHERE email = :email");
        $this->db->bind(':email', $email);
        $user = $this->db->single();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                return true;
            }
        }
        return false;
    }
   public function isEmailRegistered($email)
    {
        $this->db->query("SELECT * FROM _users WHERE email = :email");
        $this->db->bind(':email', $email);
        $result = $this->db->single();
        return $result !== false;
    }

    public function registerUser($nama, $email, $hashedPassword)
        {
            $this->db->query("INSERT INTO _users (name, email, password) VALUES (:nama, :email, :password)");
            $this->db->bind(':nama', $nama);
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $hashedPassword);
            return $this->db->execute();
        }

        public function getAllUser()
    {
        $this->db->query('SELECT * FROM _users');
        return $this->db->resultSet();
    }
    
    public function deleteData($id)
    {
        $query = "DELETE FROM _users WHERE id_users = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateUserData($userId, $nama, $email, $password)
    {
        if (!empty($password)) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $existingPassword = $this->getPasswordById($userId);
            $hashedPassword = $existingPassword ?: '';
        }
        $this->db->query("UPDATE _users SET name = :nama, email = :email, password = :password WHERE id_users = :user_id");
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':nama', $nama);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);

        return $this->db->execute();
    }



}

?>
