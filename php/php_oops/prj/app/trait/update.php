<?php
trait UPdates
{
    public function update(string $table, array $data, string $where)
    {

        //  UPDATE `table_name` SET `colName`='value' , `colName`='value'  WHERE `id`='3' 
        $status = [
            "error" => 0,
            "msg" => []
        ];

        if ($this->CheckTable($table)) {
            // $col = array_keys($data); // ["error","msg"]

            // $val = array_values($data); // ["0",[]]
            $value = "";

            foreach ($data as $key => $val) {
                $value .= "`{$key}` = '{$val}' ,";
            }

            $value = rtrim($value, ",");

            $this->query = "UPDATE `{$table}` SET {$value}  WHERE  $where";

            $this->exe = $this->conn->query($this->query);

            if ($this->exe) {
                if ($this->conn->affected_rows > 0) {
                    array_push($status['msg'], "DATA HAS BEEN UPDATED");
                } else {

                    array_push($status['msg'], "DATA REMAIN SAME");
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