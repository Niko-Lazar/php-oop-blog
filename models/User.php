<?php

namespace Models;

class User
{
    public string $id = '';
    public string $name = '';
    public string $lastName = '';
    public string $date = '';
    public string $token = '';

    public function __construct($token)
    {
        $stmt = \Models\Database::$mysqli->prepare("SELECT * FROM users WHERE token=?");
        $stmt->bind_param("s", $token);
        $stmt->execute();

        $result = $stmt->get_result();

        $data = $result->fetch_array(MYSQLI_ASSOC);

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->lastName = $data['lastName'];
        $this->date = $data['date'];
        $this->$token = $token;
    }

}


?>