<?php
trait GetResult
{

    public function get_result()
    {

        $this->result = [];
        while ($row = $this->exe->fetch_assoc()) {
            array_push($this->result, $row);
        }

        return $this->result;
    }
}

?>