<?php

trait GetID
{
    public function getID()
    {

        $id = $this->conn->insert_id;

        return $id;
    }
}

?>