<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Register user
    public function register($data)
    {
        //Insert Query
        $this->db->query('INSERT INTO users (name,email,avatar,username,password,about,last_activity)
        VALUES(:name,:email,:avatar,:username,:password,:about,:last_activity)');
        //Bind the values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':avatar', $data['avatar']);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':about', $data['about']);
        $this->db->bind(':last_activity', $data['last_activity']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadAvatar()
    {
        $allowedExtensions = array('gif', 'jpeg', 'jpg', 'png');
        $temp = explode(".", $_FILES["avatar"]["name"]);
        $extension = end($temp);
        if ((($_FILES["avatar"]["type"] == "image/gif") || ($_FILES["avatar"]["type"] == "image/jpeg") || ($_FILES["avatar"]["type"] == "image/jpg") || ($_FILES["avatar"]["type"] == "image/pjpeg") || ($_FILES["avatar"]["type"] == "image/x-png") || ($_FILES["avatar"]["type"] == "image/png")) && ($_FILES["avatar"]["size"] < 50000) && in_array($extension, $allowedExtensions)
        ) {
            if ($_FILES["avatar"]["error"] > 0) {
                redirect('register.php', $_FILES["avatar"]["error"], 'error');
            } else {
                if (file_exists("images/avatars/" . $_FILES["avatar"]["name"])) {
                    redirect('register.php', 'File already exists', 'error');
                } else {
                    move_uploaded_file($_FILES["avatar"]["tmp_name"], "images/avatars/" . $_FILES["avatar"]["name"]);
                    return true;
                }
            }
        } else {
            redirect("register.php", "Invalid File Type! ", "error");
        }
    }

    public function login($username, $password)
    {
        $this->db->query("SELECT * FROM users WHERE username=:username AND password =:password");

        $this->db->bind(':username', $username);
        $this->db->bind(':password', $password);

        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $this->setUserdata($row);
            return true;
        } else {
            return false;
        }
    }

    private function setUserData($row)
    {
        $_SESSION['is_logged_in'] = true;
        $_SESSION['user_id'] = $row->id;
        $_SESSION['username'] = $row->username;
        $_SESSION['name'] = $row->name;
    }

    public function logout()
    {
        unset($_SESSION['is_logged_in']);
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['name']);
        return true;
    }

    public function getTotalUsers()
    {
        $this->db->query("SELECT * FROM users");
        $this->db->resultset();
        return $this->db->rowCount();
    }
}
