<?php

$banknotesFace = array(500, 200, 100, 50, 20, 10, 5, 2, 1);

$sum = ($argv[1]);

$options = array(
    'options' => array(
        'default' => false,
        'min_range' => 0,
        'max_range' => 100000,
    )
);

if (!filter_var($sum, FILTER_VALIDATE_INT, $options)) {
    echo "Введите целое число от 0 до 100 000";
    return;
}

$amountArr = array();
for ($i = 0; $i < count($banknotesFace); $i++) {

    $amount = (int)($sum / $banknotesFace[$i]);

    if ($amount > 0) {
        $newArr = [$banknotesFace[$i] => $amount];
        $amountArr += $newArr;
    }

    $sum = $sum % $banknotesFace[$i];
}
print_r($amountArr);
