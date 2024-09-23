<?php
declare(strict_types=1);
ob_start();
function filterData(string $data)
{
  global $conn;
  $data = trim($data);
  $data = stripcslashes($data);
  $data = htmlspecialchars($data);
  $data = $conn->real_escape_string($data);

  return $data;

}


function ErrorMsg(string $msg)
{

  echo "<div class='alert alert-danger d-flex justify-content-center align-items-center' role='alert'>
 <svg style='width:30%' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
  <div>
{$msg}
  </div>
</div>";
}

function SuccessMsg(string $msg)
{

  echo "<div class='alert alert-success d-flex align-items-center' role='alert'>
  <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
  <div>
    {$msg}
  </div>
</div>";
}




function RefreshUrl(int $sec, string $url)
{
  header("Refresh:{$sec},url={$url}");
}

function Redirect_url(string $url)
{
  header("Location:{$url}");
}

function pre(array $a)
{
  echo "<pre>";
  print_r($a);
  echo "</pre>";
}





function File_upload(string $input, array $extension, $dest)
{
  $file = $_FILES[$input];

  // pre($file);
  //   abc.jpg

  $file_name = rand(1, 88) . "_" . $file["name"];

  $tmp_name = $file["tmp_name"];


  $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);


  $file_ext = strtolower($file_ext); // png



  $ext = $extension;

  //            T 
  if (!in_array($file_ext, $ext)) {



    return 1;
  }


  $rel_path = rel_url . $dest . $file_name;


  $abs = domain1 . $dest . $file_name;



  if (move_uploaded_file($tmp_name, $rel_path)) {

    $a = [
      "rel_path" => $rel_path,
      "abs_path" => $abs
    ];

    return $a;

  } else {
    return 7;
  }

}


function GetFileURLNAME($filename)
{
  //              helper                                        .              php
  $a = pathinfo($filename, PATHINFO_FILENAME) . "." . pathinfo($filename, PATHINFO_EXTENSION);
  return $a;
}
?>