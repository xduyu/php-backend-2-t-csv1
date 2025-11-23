<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $fio = $_POST['fio'] ?? "";
    $position = $_POST['position'] ?? "";
    $salary = $_POST['salary'] ?? 0;
    $phone = $_POST['phone'] ?? "";

    $errors = [];

    if (empty($fio)) $errors[] = "uncorrected fio";
    if (empty($position)) $errors[] = "uncorrected position";
    if (empty($salary)) $errors[] = "uncorrected salary";
    if (empty($phone)) $errors[] = "uncorrected phone";

    $_SESSION['form_data'] = [
        "fio" => $fio,
        "error" => $errors
    ];

    if (empty($errors)) {
        $filename = "users.csv";
        $file = fopen($filename, "a");
        if (filesize($filename) == 0) {
            fwrite($file, "\xEF\xBB\xBF"); // BOM для UTF-8
            fputcsv($file, ["FIO", "POSITION", "SALARY", "PHONE", "Reg. Date"], ";");
        }
        date_default_timezone_set("asia/yekaterinburg");
        fputcsv($file, [$fio, $position, $salary, $phone, date("Y-m-d H:i")], ";");
        fclose($file);
    }
    header('Location: form.php');
} else {
    header('Location: form.php');
    exit;
}
