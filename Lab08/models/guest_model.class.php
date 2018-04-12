<?php
// name: Blake R.
class GuestModel {
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblGuest;

    //constructor for the GuestModel
    private function __construct(){
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblGuest = $this->db->getGuestTable();

        foreach($_POST as $key => $value){
            $_POST[$key] = $this->dbConnection->real_escape_string($value);
        }

        foreach($_GET as $key => $value){
            $_GET[$key] = $this->dbConnection->real_escape_string($value);
        }
    }

    //makes sure there is only one instance
    public static function getGuestModel(){
        if(self::$_instance == NULL){
            self::$_instance = new GuestModel();
        }
        return self::$_instance;
    }

    //grabs all guests from the database and puts them in ana array of objects
    public function showGuests(){
        $sql = "SELECT * FROM " . $this->tblGuest;

        //execute the query
        $query = $this->dbConnection->query($sql);
        //if the query failed
        if(!$query) {
            header("Location: index.php?action=error&message=No guest was found.");
            exit;
        }

        //if the query succeeded, but no movie was found
        if($query->num_rows === 0) {
            return 0;
        }

        $guests = array();

        //puts the query into an object
        while($obj = $query->fetch_object()){
            $guest = new Guest($obj->guest_id, $obj->first_name, $obj->last_name, $obj->birth_date, $obj->email);

            //add the movie to the array
            $guests[] = $guest;
        }

        return $guests;
    }

    //grabs the user information from the table and puts them in the database
    public function addGuest($firstName, $lastName, $birthdate, $email){
        $fname = stripcslashes($firstName);
        $lname = stripcslashes($lastName);
        $dob = stripcslashes($birthdate);
        $e = stripcslashes($email);

        $sql = "INSERT INTO " . $this->tblGuest . "(first_name, last_name, birth_date, email) VALUES('$fname', '$lname', '$dob', '$e')";


        //execute the query
        $query = $this->dbConnection->query($sql);

        if(!$query) {
            header("Location:index.php?action=error&message=" . $this->dbConnection->error . "<br>" . $sql);
        }
    }
}