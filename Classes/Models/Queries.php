<?

namespace Classes\Models;

class Queries extends \Classes\Config\Dbconn {

    public $conn = "";
    public $err = [];
    public $drive = "";

    public function __construct()
    {
        $this->conn = $this->connection();
        $this->driver = new \mysqli_driver();
        $this->driver->report_mode = mysqli_report(MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        
    }

    // check user login
    public function validate_user( $email ) {

        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param( "s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            $this->err['msg'] = "No result found";
            return $this->err['msg'];
        } else {
            $row = $result->fetch_assoc();
        }
        $stmt->close();

        return $row;
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
    public function find_user( $email ) {
        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param( "s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $row = $result->num_rows;
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

    // Find single user by ID
    public function find_user_by_id( $id ) {
        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bind_param( "i", $id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $row = $result->num_rows;
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

    // Get all user
    public function get_all_user() {

        $users = [];
        try{
            $stmt = $this->conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                $row = $result->num_rows;
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

}