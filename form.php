<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workers's form</title>
</head>

<body>
    <form action="./process.php" method="POST">
        <input type="text" placeholder="ФИО" name="fio"> <br>
        <input type="text" placeholder="Должность" name="position"> <br>
        <input type="number" placeholder="Phone" name="phone"> <br>
        <input type="number" placeholder="salary" name="salary"> <br>
        <button>save data</button>
    </form>
    <?php
    $result = [];
    session_start();
    if ($_SESSION['form_data']) {
        $result[] = $_SESSION['form_data'];
        // print_r($result);
        if (!empty($result)) {
            $arr = $result[0];
            if (!empty($arr['error'])) {
                $errors_arr = $arr['error'];
                echo "<h2>Errors:</h2>";
                for ($i = 0; $i < sizeof($errors_arr); $i++) {
                    echo ($i + 1) . " " . $errors_arr[$i] . "</br>";
                }
            } else {
                echo "Register is done" . "</br> " . "FIO: " . $arr['fio'] . "</br>";
                echo "<a href='./users.csv' download>download this file</a>" . "</br>";
            }
        }
    }
    ?>
</body>

</html>