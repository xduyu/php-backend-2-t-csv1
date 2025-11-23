<?php
session_start();
// echo $_SERVER['SERVER_NAME'];
// echo $_SERVER['REQUEST_METHOD'];
// echo $_SERVER['REQUEST_URI'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $num1 = $_POST['number_1'] ?? "";
    $num2 = $_POST['number_2'] ?? "";
    $math_op = $_POST['operation'] ?? "+w";
    $result = "";
    if (is_numeric($num1) && is_numeric($num2)) {
        $num2 = (float)$num2;
        $num2 = (float)$num2;
        switch ($math_op) {
            case '+':
                $result = $num1 + $num2;
                break;
            case '-':
                $result = $num1 - $num2;
                break;
            case '*':
                $result = $num1 * $num2;
                break;
            case '/':
                if ($num2 == 0) {
                    $result = "error";
                    exit;
                };
                $result = $num1 / $num2;
                break;
        }
    }
    // echo "Result: " . $result;

    // header('Location: index.php?result=' . urlencode($result)); // GET

    $_SESSION['results'] = $result;
    header('Location: index.php');
} else {
    header("Location: index.php");
    exit;
}
