<?php
class Database
{
    private $_conn;

    public function getConnection($username = "root", $password = "", $host = "localhost", $database = "game", $port = 3306)
    {
        $this->_conn = null;

        try {
            $this->_conn = new PDO("mysql:host=" . $host . ";port=" . $port . ";dbname=" . $database, $username, $password);

            $this->_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->_conn;
    }
}

?>