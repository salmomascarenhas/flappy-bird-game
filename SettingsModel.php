<?php
class Settings
{
    private $conn;
    private string $username;
    private string $scenary;
    private int $points;


    public function __construct(PDO $conn, string $username, string $scenary = 'day', int $points = 0)
    {
        $this->conn = $conn;
        $this->username = $username;
        $this->scenary = $scenary;
        $this->points = $points;

    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getScenary()
    {
        return $this->scenary;
    }

    public function getPoints()
    {
        return $this->points;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
    }

    public function setScenary(string $scenary)
    {
        $this->scenary = $scenary;
    }

    public function setPoints(int $points)
    {
        $this->points = $points;
    }

    public function saveSettings()
    {
        $result = $this->conn->prepare(
            "INSERT INTO settings (username, scenary, points) VALUES (:username, :scenary, :points)",

        );

        $result->bindParam(':username', $this->username);
        $result->bindParam(':scenary', $this->scenary);
        $result->bindParam(':points', $this->points);

        $result->execute();

        return $result;
    }

    public function __toString()
    {
        return json_encode(
            array(
                'username' => $this->getUsername(),
                'scenary' => $this->getScenary(),
                'points' => $this->getPoints()
            )
        );
    }
}
?>