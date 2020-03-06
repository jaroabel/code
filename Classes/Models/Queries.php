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
            //$this->err['msg'] = "No result found";
            //return $this->err['msg'];
            $row = $result->num_rows;
        } else {
            $row = $result->fetch_assoc();
        }
        $stmt->close();

        return $row;
    }

}