<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 3/22/2018
 * Time: 2:42 PM
 * Description: This file was created to
 */
class ToyModel {
    private $db; // db object
    private $connection; // db connection object

    public function __construct() {
        $this->db = Database::getInstance();
        $this->connection = $this->db->getConnection();
    }

    // this method retrieves all toys from the database and
    // returns an array of Toy objects if successful or false if failed.

    public function getToys() {
        //SQL select statement
        $sql = "SELECT * FROM " . $this->db->getToyTable();

        //execute the query
        $query = $this->connection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all toys
            $toys = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $toy = new Toy($query_row["id"],
                    $query_row["name"],
                    $query_row["description"],
                    $query_row["price"]);

                //push the toy into the array
                $toys[] = $toy;
            }
            return $toys;
        }
        return false;
    }
}