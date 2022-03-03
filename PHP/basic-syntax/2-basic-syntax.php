<?php
// Khai báo biến
$myName = 'Dyno';
echo $myName;

// Hằng số
define('MY_NAME', 'Dyno Nguyễn');
echo MY_NAME;

// Scope
$x = 1;
function localScope()
{
    // Không thể sử dụng global variable trong scope
    echo "<br/><p>Variable x in inside function: $x</p>";
}
localScope();
echo "<br/><p>Variable x in outside function: $x</p>";

// Global keyword
function localScopeWithGlobalKeyword()
{
    global $x; // $GLOBALS['x']
    echo "<br/><p>Variable x with global keyword in inside function: $x</p>";
}

// Static keyword
function testStatic()
{
    static $staticVar = 1;
    echo $staticVar;
    ++$staticVar;
}
testStatic();
testStatic();
testStatic();

// echo và print, var_dum
// echo - no return, print - return int, var_dum in ra cả kiểu dữ liệu
echo 'Hello ' . $myName . ' Ahihi';
print 'Hello ' . $myName . ' Ahihi';
var_dump('Hello ' . $myName . ' Ahihi');
