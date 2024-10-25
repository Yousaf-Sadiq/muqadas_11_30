<?php
declare(strict_types=1);
namespace app\database;
session_start();


require_once dirname(__DIR__) . "/include/table.php";
require_once dirname(__DIR__) . "/include/web.php";
require_once dirname(__FILE__) . "/trait/checkTable.php";
require_once dirname(__FILE__) . "/trait/insert.php";
require_once dirname(__FILE__) . "/trait/customSql.php";
require_once dirname(__FILE__) . "/trait/select.php";
require_once dirname(__FILE__) . "/trait/getResult.php";
require_once dirname(__FILE__) . "/trait/update.php";
require_once dirname(__FILE__) . "/trait/delete.php";
require_once dirname(__FILE__) . "/trait/GetId.php";

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



    use \CheckTable, \INserts, \Mysql, \Select, \GetResult, \UPdates, \DELETES,\GetID;




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

    public function pre(array $a)
    {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }

    public function FIleUPload(string $input, array $ext, string $to)
    {
        $file = $_FILES[$input];

        $file_name = rand(1, 99) . "_" . $file["name"];
        $tmp_name = $file["tmp_name"];

        $fileExt = pathinfo($file_name, PATHINFO_EXTENSION);
        $fileExt = strtolower($fileExt);

        if (!in_array($fileExt, $ext)) {

            return 1;
        }


        $rel_path = rel_url . "/" . $to . "/" . $file_name;
        $abs_path = abs_url . "/" . $to . "/" . $file_name;


        if (move_uploaded_file($tmp_name, $rel_path)) {
            $b = [
                "relUrl" => $rel_path,
                "absUrl" => $abs_path
            ];

            return $b;
        } else {
            return 2;
        }


    }
}

?>