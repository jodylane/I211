<?php
// name: blake R.
class Database {
    //define the database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'guestbook',
        'tblGuests' => 'guests'
    );

    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    private function __construct(){
        $this->objDBConnection = @new mysqli(
            $this->param['host'], $this->param['login'], $this->param['password'], $this->param['database']
        );
        if(mysqli_connect_errno() != 0){
            $message = "Connecting database failed: " . mysqli_connect_error() . ".";
            echo $message;
            exit;
        }
    }

    //ensure there is just one Database instance
    static public function getDatabase(){
        if(self::$_instance == NULL)
            self::$_instance = new Database();
        return self::$_instance;
    }

    //returns the connection object
    public function getConnection(){
        return $this->objDBConnection;
    }

    //gets the guest table
    public function getGuestTable(){
        return $this->param['tblGuests'];
    }
}
