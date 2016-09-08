# bankloan
a calculator of bank loan.

[![Build Status](https://travis-ci.org/jiangbianwanghai/bankloan.svg?branch=master)](https://travis-ci.org/jiangbianwanghai/bankloan) [![Code Coverage](https://scrutinizer-ci.com/g/jiangbianwanghai/bankloan/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jiangbianwanghai/bankloan/?branch=master) [![Latest Stable Version](https://poser.pugx.org/jiangbianwanghai/bankloan/v/stable)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![Total Downloads](https://poser.pugx.org/jiangbianwanghai/bankloan/downloads)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![Latest Unstable Version](https://poser.pugx.org/jiangbianwanghai/bankloan/v/unstable)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![license](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](https://github.com/jiangbianwanghai/bankloan/master/LICENSE)

##Installation
Use Composer to install the library.

``` bash
$ composer require jiangbianwanghai/bankloan
```

##Usage
```php
<?php
require_once __DIR__.'/vendor/autoload.php';
use Jiangbianwanghai\BankLoan\BankLoan;
$bl = new BankLoan();
var_dump($bl->getACPI());
```

output:

``` bash
array(12) {
  [1] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "362.50"
    'principal' =>
    string(7) "8168.49"
    'lesstotal' =>
    string(8) "91831.51"
  }
  [2] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "332.89"
    'principal' =>
    string(7) "8198.10"
    'lesstotal' =>
    string(8) "83633.41"
  }
  [3] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "303.17"
    'principal' =>
    string(7) "8227.82"
    'lesstotal' =>
    string(8) "75405.59"
  }
  [4] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "273.35"
    'principal' =>
    string(7) "8257.64"
    'lesstotal' =>
    string(8) "67147.95"
  }
  [5] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "243.41"
    'principal' =>
    string(7) "8287.58"
    'lesstotal' =>
    string(8) "58860.37"
  }
  [6] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "213.37"
    'principal' =>
    string(7) "8317.62"
    'lesstotal' =>
    string(8) "50542.75"
  }
  [7] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "183.22"
    'principal' =>
    string(7) "8347.77"
    'lesstotal' =>
    string(8) "42194.97"
  }
  [8] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "152.96"
    'principal' =>
    string(7) "8378.03"
    'lesstotal' =>
    string(8) "33816.94"
  }
  [9] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(6) "122.59"
    'principal' =>
    string(7) "8408.40"
    'lesstotal' =>
    string(8) "25408.54"
  }
  [10] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(5) "92.11"
    'principal' =>
    string(7) "8438.88"
    'lesstotal' =>
    string(8) "16969.65"
  }
  [11] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(5) "61.51"
    'principal' =>
    string(7) "8469.48"
    'lesstotal' =>
    string(7) "8500.18"
  }
  [12] =>
  array(4) {
    'priandint' =>
    string(7) "8530.99"
    'interest' =>
    string(5) "30.81"
    'principal' =>
    string(7) "8500.18"
    'lesstotal' =>
    string(5) "-0.00"
  }
}
```

##License
The MIT License (MIT). Please see License File for more information.
