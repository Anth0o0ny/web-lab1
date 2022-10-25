<!DOCTYPE html>

<html lang="ru">

<head>
    <title>Lab1</title>
    <style>
        @import "styles/mainPage.css";
    </style>
</head>

<body id="bcground">

<!--Верстка таблицы-->
<table id="verstka">

    <!--    1 строка-->
    <!--    Заголовок-->
    <tr>
        <td colspan="2" id="cap">
            <?php require "php/Headline.php" ?>
        </td>
    </tr>


    <!--Вторая строка-->
    <tr>
        <!-- Выбор координаты X-->
        <td id="dataColumn">
            <label xLabal="xLegend">
                <b>Select X coordinate value:</b>
            </label>
            <form class="boxed">
                <input type="radio" id="x = -3" name="xCoord" value="-3">
                <label for="x = -3">-3</label>

                <input type="radio" id="x = -2" name="xCoord" value="-2">
                <label for="x = -2">-2</label>

                <input type="radio" id="x = -1" name="xCoord" value="-1">
                <label for="x = -1">-1</label>

                <input type="radio" id="x = 0" name="xCoord" value="0">
                <label for="x = 0">0</label>

                <input type="radio" id="x = 1" name="xCoord" value="1">
                <label for="x = 1">1</label>

                <input type="radio" id="x = 2" name="xCoord" value="2">
                <label for="x = 2">2</label>

                <input type="radio" id="x = 3" name="xCoord" value="3">
                <label for="x = 3">3</label>

                <input type="radio" id="x = 4" name="xCoord" value="4">
                <label for="x = 4">4</label>

                <input type="radio" id="x = 5" name="xCoord" value="5">
                <label for="x = 5">5</label>
            </form>

        </td>

        <!--Изображение-->
        <td rowspan="2">
            <div class="parent">
                <img id="pict2" src="images/lab1.png" alt="pucture">
                <img id="pictDanthes" src="images/Danthes.png">
                <?php require "php/TaskText.php" ?>
            </div>
        </td>
    </tr>

    <!--3 строка-->
    <tr>
        <!--Ввод координаты Y-->
        <td id="dataColumn">
            <label yLabel="yText">
                <b>Enter Y coordinate value:</b>
            </label>
            <p>
                <input id="yText" name="yCoordinate" type="text" maxlength="10" placeholder="-5 ... 5">
            </p>
        </td>
    </tr>

    <!--4 строка-->
    <tr>
        <!--Ввод радиуса-->
        <td id="dataColumn">
            <label rLabel="rText">
                <b>Enter R radius value:</b>
            </label>
            <p>
                <input id="rRadio" name="rRadius" type="text" maxlength="10" placeholder="1 ... 4">
            </p>
        </td>

        <!--Кнопка-->
        <td>
            <p><input class="submitButton" type="submit" value="Выстрел"></p>
        </td>
    </tr>

</table>
</body>
</html>
