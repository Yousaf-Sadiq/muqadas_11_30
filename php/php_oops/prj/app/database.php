<?php
declare(strict_types=1);
namespace app\database;
require_once dirname(__DIR__) . "/include/table.php";
require_once dirname(__DIR__) . "/include/web.php";
require_once dirname(__FILE__) . "/trait/checkTable.php";
require_once dirname(__FILE__) . "/trait/insert.php";

class DB
{

    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db = "crudnew11_30";

    protected $conn;

    private $query;

    protected $exe;

    private $result = [];


    public function __construct()
    {
        $this->conn = new \mysqli($this->host, $this->user, $this->password, $this->db);

        if ($this->conn) {
            // echo "OK";
        }
    }



    use \CheckTable, \INserts;




    public function __destruct()
    {
        $this->conn->close();
    }

}


class helper extends DB
{
    public function FilterData(string $data)
    {
        $data = trim($data);
        $data = htmlspecialchars($data);
        $data = stripcslashes($data);
        $data = $this->conn->real_escape_string($data);

        return $data;
    }
}

?>