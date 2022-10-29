
<?php
include "../Row.php";
date_default_timezone_set("Europe/Moscow");
$start_time = $_SERVER["REQUEST_TIME_FLOAT"];

if (!isset($_GET["cleaning"]) && (!isset($_GET["xCoord"]) || !isset($_GET["yCoord"]) || !isset($_GET["radius"]) || !Row::validateParams($_GET["xCoord"], $_GET["yCoord"], $_GET["radius"]))) {
    require "WrongReq.php";
    exit();
}

global $arrayTable;
if (!isset($_GET["cleaning"])) {
    $x = $_GET["xCoord"];
    $y = $_GET["yCoord"];
    $y = str_ireplace(",", ".", $y);
    $r = $_GET["radius"];
    $r = str_ireplace(",", ".", $r);

    $row = new Row($x, $y, $r);
    $stop_time = microtime(true);
    $scriptTime = round(($stop_time - $start_time) * 10 ** 6);
    $row->setTime($scriptTime, $stop_time);

    if (isset($_COOKIE["table"])) {
        $arrayTable = json_decode($_COOKIE["table"], true);
    }
    $arrayTable[] = $row->getArray();
}
setcookie("table", json_encode($arrayTable));
?>

<!DOCTYPE html>

<html lang="ru">

<head>
    <title>Request</title>
    <style>
        @import "../styles/Request.css";
    </style>
</head>

<body id="reqBack">

<table id="reqTable">
    <tr>
        <td id="reqCap">
            <?php require "Headline.php" ?>
        </td>
    </tr>

    <tr>
        <td>
            <table id="resultForm">
                <tr id="mainRow">
                    <td>X</td>
                    <td>Y</td>
                    <td>R</td>
                    <td>Жив?</td>
                    <td>Время работы скрипта</td>
                    <td>Текущее время</td>
                </tr>
                <?php
                if (isset($arrayTable)) {
                    foreach ($arrayTable as $row) { ?>
                        <tr>
                            <td id="red"><?php echo $row["x"] ?></td>
                            <td id="orange"><?php echo $row["y"] ?></td>
                            <td id="yellow"><?php echo $row["r"] ?></td>
                            <td id="green"><?php echo $row["hit"] ? "Попал, Дантеса закопал" : "Жаль, конечно, этого добряка" ?></td>
                            <td id="lightBlue"><?php echo $row["scriptTime"] . " мкс" ?></td>
                            <td id="blue"><?php echo date("H:i:s", $row["curTime"]) . " по МСК" ?></td>
                        </tr>
                        <?php
                    }
                }
                ?>
            </table>
        </td>
    </tr>

    <tr>
        <td>

            <form action="Request.php" method="get">
                <div id="buttonMove">
                    <input class="accButton" type="submit" name="cleaning" value="Избавиться от улик дуэли">
                </div>
            </form>
        </td>
    </tr>
</table>


</body>

