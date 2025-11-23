<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Калькулятор</h2>
    <form action="./calc.php" method="POST">
        <input type="number" name="number_1" id="">
        <input type="number" name="number_2" placehoder="number 1" id="">
        <select name="operation" id="">
            <option value="+" >+</option>
            <option value="-" >-</option>
            <option value="*" >*</option>
            <option value="/" >/</option>
        </select>
        <button>=</button>
    </form>
    <?php
    session_start();
        // if (isset($_GET['result'])) {
        //     echo $_GET['result'];
        // }
        // сессии

        if (isset($_SESSION['results'])) {
            $res = $_SESSION['results'];
            echo $res;
        }
    ?>
    <a href="./form.php" class="">Перейти на форму сотрудников</a>
</body>
</html>