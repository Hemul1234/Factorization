<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 'on');
	mb_internal_encoding('UTF-8');
	
	spl_autoload_register();

    $multipliers = new \Calc\Factorization;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css?v=2.9">
</head>
<body>
    <main class="main">
        <div class="window">
            <h1 class="question">Введите число</h1>
            <form class="form" action="" method="POST">
                <input class="input" type="number" name="number">
                <input class="button" type="submit">
            </form>
            <div class="result-container">
                <?php if (!empty($_POST['number'])): ?>
                    <?php
                        $multipliers->getMultipliers($_POST['number']);
                        $num = $_POST['number'];
                        $steps = $multipliers->steps;
                        if (count($multipliers->arr) > 1):
                    ?>
                        <p class="result">
                            <?= $_POST['number'] ?> = <?= implode(' * ', $multipliers->arr) ?>
                        </p>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="result">Введите число</p>
                <?php endif ?>
            </div>
        </div>
        <div class="solution">
            <p class="result">Решение:</p>
            <?php if (count($multipliers->arr) > 1): ?>
                <p class="result" style="text-align: left;">
                    <?= $_POST['number'] ?> - не является простым числом
                </p>
                <?php foreach ($multipliers->arr as $elem): ?>
                    <?php if (count($steps) > 1): ?>
                        <p class="result" style="text-align: left;">
                            <?= array_shift($steps) ?> делится на <?= $elem ?>
                        </p>
                    <?php else: ?>
                        <p class="result" style="text-align: left;">
                            <?= $elem ?> - простое число
                        </p>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php elseif (!empty($num)): ?>
                <p class="result" style="text-align: left;">
                    <?= $num ?> - простое число
                </p>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>