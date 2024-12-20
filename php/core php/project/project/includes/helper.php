<?php
declare(strict_types=1);
ob_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'crud_new12');

function filterData(string $data): string {
    global $conn;
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $data = $conn->real_escape_string($data);
    return $data;
}

function ErrorMsg(string $msg): void {
    echo "<div class='alert alert-danger d-flex justify-content-center align-items-center' role='alert'> 
            <svg style='width:30%' class='bi flex-shrink-0 me-2' role='img' aria-label='Danger:'>
                <use xlink:href='#exclamation-triangle-fill'/>
            </svg> 
            <div> {$msg} </div> 
         </div>";
}

function SuccessMsg(string $msg): void {
    echo "<div class='alert alert-success d-flex align-items-center' role='alert'> 
            <svg class='bi flex-shrink-0 me-2' role='img' aria-label='Success:'>
                <use xlink:href='#check-circle-fill'/>
            </svg> 
            <div> {$msg} </div> 
         </div>";
}

function RefreshUrl(int $sec, string $url): void {
    header("Refresh:{$sec}; url={$url}");
}
?>


