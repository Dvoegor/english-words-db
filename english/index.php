<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>База данных</title>
        <link rel="icon" href="database.png" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <header></header>
        <main>
            <div class="container">
                <div class="row">
                    <h1 class="display-4 mb-4" style="margin: auto">База данных фигур знания</h1>
                </div>
                <div class="row">
                    <div class="col-sm p-4" style="background-color: #eeffe6; text-align: center">
                        <h2>Спорт</h2>
                        <p classl="lead">тематика</p>
                    </div>
                    <div class="col-sm p-4" style="background-color: #ffebe6; text-align: center">
                        <h2>Английский</h2>
                        <p classl="lead">язык</p>
                    </div>
                    <div class="col-sm p-4" style="background-color: #f2f2f2; text-align: center">
                        <h2>Тысяча</h2>
                        <p classl="lead">количество строк</p>
                    </div>
                </div>
                <div class="row p-2" style="background-color: #d9f2f2;">
                <a style="margin: auto" href="https://yadi.sk/d/noQhiZp7EJ-Iqg" style="color: #f5bea3;" target="_blank">Скачать базу данных SQL</a>
            </div>

            <?php

            if (isset($_GET['answer']) and !empty($_GET['answer'])) {
                $answer = $_GET['answer'];
            }
            if (isset($_GET['method']) and !empty($_GET['method'])) {
                $method = $_GET['method'];
            }
            if (isset($_GET['subjectArea']) and !empty($_GET['subjectArea'])) {
                $subjectArea = $_GET['subjectArea'];
            }
            if (isset($_GET['question']) and !empty($_GET['question'])) {
                $question = $_GET['question'];
            }
            if (isset($_GET['fun']) and !empty($_GET['fun'])) {
                $fun = $_GET['fun'];
            }

            ?>

            <form>
            <div class="form-row">
            <div class="form-group mt-4 col">
                <label for="amount">Знак</label>
                <input type="text" class="form-control" name="answer" placeholder="<?php echo $answer ?>">
            </div>
            <div class="form-group mt-4 col">
                <label for="amount">Способ</label>
                <input type="text" class="form-control" name="method" placeholder="<?php echo $method ?>">
            </div>
            <div class="form-group mt-4 col">
                <label for="amount">Область</label>
                <input type="text" class="form-control" name="subjectArea" placeholder="<?php echo $subjectArea ?>">
            </div>
            </div>

            <div class="form-row">
            <div class="form-group mt-2 col-8">
                <label for="amount">Формула смысла</label>
                <input type="text" class="form-control" name="question" placeholder="<?php echo $question ?>">
            </div>
            <div class="form-group mt-2 col-4">
                <label for="fun">Функция</label>
                <input type="text" class="form-control" name="fun" placeholder="<?php echo $fun ?>">
            </div>
            </div>

            <button type="submit" class="btn btn-primary">Показать</button>
            </form>
            <form action="clear.php" method="post" class="mt-2">
            <button type="submit" class="btn btn-danger">Сбросить</button>
            </form>

            <div class="row mt-4">
            <?php
            if ($_GET['amount']>1000) {
                $_GET['amount'] = 1000;
            }
            $amount = $_GET['amount'];
            require_once 'connection.php';
            
            $link = mysqli_connect($host, $user, $password, $database) 
                or die("Ошибка " . mysqli_error($link)); 
                
            $query ="SELECT * FROM crossWords";
            require 'filter.php'; 
            
            $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
            if($result)
            {
                $rows = mysqli_num_rows($result);

                echo "<h3>Получено строк: $rows</h3>";

                echo "<table  class=\"table\"><tr><th>Номер</th><th>Формула смысла</th><th>Знак</th><th>Функция</th><th>Способ</th><th>Области</th></tr>";
                for ($i = 0 ; $i < $rows ; ++$i)
                {
                    $row = mysqli_fetch_row($result);
                    echo "<tr>";
                        for ($j = 0 ; $j < 6 ; ++$j) echo "<td>$row[$j]</td>";
                    echo "</tr>";
                }
                echo "</table>";
                
                // очищаем результат
                mysqli_free_result($result);
            }
            
            mysqli_close($link);
            ?>
            </div>
            </div>
        </main>
        <footer></footer>
    </body>
</html>