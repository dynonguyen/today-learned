<?php
// Khai báo trực tiếp
function funcName()
{
    echo "Hi hi </br>";
}
funcName();

// Đặt biến
$funcName2 = function () {
    echo 'Hi hi hi';
};
$funcName2();

// Tham số
function funcName3($param1, $param2 = 'Default value')
{
    echo "<br/>" . $param1 . " " . $param2 . "<br/>";
}
funcName3(1);


// Anonymous function (Lamda, callback)
$arr = [1, 2, 3];
array_walk($arr, function ($value, $key) {
    echo "Key = " . $key . " - Value = " . $value . "<br/>";
});
