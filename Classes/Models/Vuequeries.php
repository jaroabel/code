<?php

namespace Classes\Models;


class Vuequeries extends \Classes\Config\Dbconn {

    public $conn = "";
    public $err = [];
    public $drive = "";

    public function __construct()
    {
        $this->conn = $this->connection();
        $this->driver = new \mysqli_driver();
        $this->driver->report_mode = mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        
    }

    // insert new user (create new account)
    public function add_user( $data ) {

        try {
            $stmt = $this->conn->prepare("INSERT INTO users (fname, lname, username, email, password, rank ) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssi", $data['fname'], $data['lname'], $data['username'], $data['email'], $data['password'], $data['rank']);
            $stmt->execute();
            $insert_id = $this->conn->insert_id;
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }

        return $insert_id;
    }
    // Find single user by email
    public function select_user_by_email( $email ) {
        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param( "s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($result->num_rows === 0) {
                $row = $result->num_rows;
            } else {
                    
                while ($row = $result->fetch_assoc()) {
                    array_push($users, $row);
                }
            }
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }
        
        return $users;
    }

    // Find single user by ID
    public function select_user_by_id( $id ) {
        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param( "i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $users = $result->num_rows;
            } else {

                while ($row = $result->fetch_assoc()) {
                    array_push($users, $row);
                }
            }
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }
        return $users;
    }

    // Retrieve all user
    public function select_all_users() {

        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $users = $result->num_rows;
            } else {
                //$row = $result->fetch_assoc();
                while ($row = $result->fetch_assoc()) {
                    array_push($users, $row);
                }
            }
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }
        return $users;
    }

    // Delete user by ID
    public function delete_user_by_id( $id ) {

        try{

            $stmt = $this->conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }

        return true;
    }

    // Update user info by ID
    public function update_user_by_id( $data ) {

        try{ 
            $stmt = $this->conn->prepare("UPDATE users SET fname = ?, lname = ?, username = ?, email = ?, rank = ? WHERE id = ?");
            $stmt->bind_param("ssssii", $_POST['name'], $_SESSION['id']);
            $stmt->execute();
            $stmt->close();
        } catch(\Exception $e) {
            echo $e->__toString();
            die();
        }

        return true;
    }
}