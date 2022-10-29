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
<form id="mainForm" action="php/Request.php" method="get" target="php/Request.php">

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
                <label id="xLabel">
                    <b>Select X coordinate value:</b>
                    <br>
                </label>
                <fieldset id="boxed">
                    <div class="xButton">
                        <input type="radio" id="x = -3" name="xCoord" value="-3" class="xBtn">
                        <label for="x = -3">-3</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = -2" name="xCoord" value="-2" class="xBtn">
                        <label for="x = -2">-2</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = -1" name="xCoord" value="-1" class="xBtn">
                        <label for="x = -1">-1</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 0" name="xCoord" value="0" class="xBtn">
                        <label for="x = 0">0</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 1" name="xCoord" value="1" class="xBtn">
                        <label for="x = 1">1</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 2" name="xCoord" value="2" class="xBtn">
                        <label for="x = 2">2</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 3" name="xCoord" value="3" class="xBtn">
                        <label for="x = 3">3</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 4" name="xCoord" value="4" class="xBtn">
                        <label for="x = 4">4</label>
                    </div>

                    <div class="xButton">
                        <input type="radio" id="x = 5" name="xCoord" value="5" class="xBtn">
                        <label for="x = 5">5</label>
                    </div>
                </fieldset>

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
                <label for="yText">
                    <b>Enter Y coordinate value:</b>
                </label>
                <p>
                    <input id="yText" name="yCoord" type="text" maxlength="10" placeholder="-5 ... 5">
                </p>
                <span role="alert" id="wrongValueY"></span>
            </td>
        </tr>

        <!--4 строка-->
        <tr>
            <!--Ввод радиуса-->
            <td id="dataColumn">
                <label for="rText">
                    <b>Enter R (radius) value:</b>
                </label>
                <p>
                    <input id="rText" name="radius" type="text" maxlength="10" placeholder="1 ... 4">
                </p>
                <span role="alert" id="wrongValueR"></span>
            </td>

            <!--Кнопка-->
            <td>
                <p><input class="submitButton" type="submit" value="Выстрел"></p>
                <span role="alert" id="buttonError"></span>
            </td>
        </tr>

    </table>
</form>

<script src="Validator.js"></script>
</body>
</html>
