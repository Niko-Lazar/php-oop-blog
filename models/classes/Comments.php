<?php

namespace models\classes;

class Comments
{
    public array $comments = [];
    
    public function __construct($postID)
    {
        $stmt = \models\classes\Database::$mysqli->prepare("SELECT * FROM comments WHERE postID=?");
        $stmt->bind_param("s", $postID);
        $stmt->execute();

        $result = $stmt->get_result();

        $this->comments = $result->fetch_all(MYSQLI_ASSOC);
    }


    public function deleteComment($commentID) : bool {
        $stmt = \models\classes\Database::$mysqli->prepare("DELETE FROM comments WHERE id=?");
        $stmt->bind_param("s", $commentID);
        $result = $stmt->execute();

        return $result;
    }
}


?>