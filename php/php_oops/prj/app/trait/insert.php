<?php
// API
trait INserts
{

  public function inserts(string $table, array $data)
  {
    $status = [
      "error" => 0,
      "msg" => []
    ];

    /**
      [
        "email"=>"",
        "password"=>""
      ]
        ["email","password"]
     */
    if ($this->CheckTable($table)) {

      $col = array_keys($data);

      $col = "`" . implode("` , `", $col) . "`"; // arrays => string  
// =========================================================================
      $val = array_values($data);
      $val = "'" . implode("' , '", $val) . "'";



      $this->query = "INSERT INTO `{$table}` ({$col})  VALUES ({$val})";


      $this->exe = $this->conn->query($this->query);
      if ($this->exe && $this->conn->affected_rows > 0) {

        array_push($status['msg'], "DATA HAS BEEN INSERTED");
      } else {

        $status["error"]++;
        array_push($status['msg'], "DATA HAS NOT BEEN  INSERTED");
      }
    } else {
      $status["error"]++;
      array_push($status['msg'], "TABLE NOT EXIST");
    }


    return json_encode($status);
  }
}


?>