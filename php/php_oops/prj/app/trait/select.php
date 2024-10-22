<?php

trait Select
{
    public function select(bool $numRow = false, string $table, string $row = "*", string $where = null, string $orderBy = null, string $limit = null, string $join = null)
    {
        /**
          SELECT * FROM table_name
          SELECT * FROM table_name WHERE `col_name`='value'
          SELECT * FROM table_name WHERE `col_name`='value' ORDERBY ID DESC
          SELECT * FROM table_name WHERE `col_name`='value' ORDERBY ID ASC  LIMIT 5
          
         */
        if ($this->CheckTable($table)) {

            $this->query = "SELECT {$row} FROM `{$table}`";



            if ($join != null) {
                $this->query .= " {$join}";
            }



            if ($where != null) {
                $this->query .= " WHERE {$where}";
            }


            if ($orderBy != null) {
                $this->query .= " ORDERBY {$orderBy}";
            }

            if ($limit != null) {
                $this->query .= " LIMIT {$limit}";
            }


            // echo $this->query;
            $this->exe = $this->conn->query($this->query);

            if ($this->exe) {



                if ($numRow) {
                    if ($this->exe->num_rows > 0) {
                        return true;
                    } else {
                        return false;
                    }
                }

                return true;

            } else {
                return false;
            }
        } else {
            return false;
        }




    }
}


?>