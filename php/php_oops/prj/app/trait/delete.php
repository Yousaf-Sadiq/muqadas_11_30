<?php

trait DELETES
{
    public function delete(string $table, string $where)
    {
        //  DELETE FROM table_name WHERE col_name= val
        $status = [
            "error" => 0,
            "msg" => []
        ];

        if ($this->CheckTable($table)) {


            $this->query = "DELETE FROM `{$table}` WHERE {$where}";

            $this->exe = $this->conn->query($this->query);

            
            if ($this->exe) {
                if ($this->conn->affected_rows > 0) {
                    array_push($status['msg'], "DATA HAS BEEN DELETED");
                } else {

                    array_push($status['msg'], "DELETION ERROR ");
                }
            } else {
                $status['error']++;
                array_push($status['msg'], "ERROR IN QUERY");
            }



        } else {
            $status['error']++;
            array_push($status['msg'], "TABLE NOT FOUND");

        }


        return json_encode($status);
    }
}

?>