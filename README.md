# bankloan

[![Join the chat at https://gitter.im/bankloan/Lobby](https://badges.gitter.im/bankloan/Lobby.svg)](https://gitter.im/bankloan/Lobby?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Amortization Schedule Calculator

[![Build Status](https://travis-ci.org/jiangbianwanghai/bankloan.svg?branch=master)](https://travis-ci.org/jiangbianwanghai/bankloan) 
[![Code Coverage](https://scrutinizer-ci.com/g/jiangbianwanghai/bankloan/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/jiangbianwanghai/bankloan/?branch=master) 
[![Latest Stable Version](https://img.shields.io/packagist/v/jiangbianwanghai/bankloan.svg?style=flat-square)](https://packagist.org/packages/jiangbianwanghai/bankloan) 
[![Total Downloads](https://img.shields.io/packagist/dt/jiangbianwanghai/bankloan.svg?style=flat-square)](https://packagist.org/packages/jiangbianwanghai/bankloan) 
[![license](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](https://github.com/jiangbianwanghai/bankloan/master/LICENSE)

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
$bl = new BankLoan(['loanAmount' => 100000, 'year' => 10]);
var_dump($bl->getELP()); // Get equal loan payments result.
var_dump($bl->getEPP()); // Get equal principal payments result.
```

##Note

Now only supports China。


##License
The MIT License (MIT). Please see License File for more information.
