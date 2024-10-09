<?php
trait Mysql
{

    public function MySql(string $a, bool $numRow = false)
    {
        $this->query = $a;

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
    }
}

?>