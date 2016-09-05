# bankloan
a calculator of bank loan.

[![Build Status](https://travis-ci.org/jiangbianwanghai/bankloan.svg?branch=master)](https://travis-ci.org/jiangbianwanghai/bankloan) [![Latest Stable Version](https://poser.pugx.org/jiangbianwanghai/bankloan/v/stable)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![Total Downloads](https://poser.pugx.org/jiangbianwanghai/bankloan/downloads)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![Latest Unstable Version](https://poser.pugx.org/jiangbianwanghai/bankloan/v/unstable)](https://packagist.org/packages/jiangbianwanghai/bankloan) [![license](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat)](https://github.com/jiangbianwanghai/bankloan/master/LICENSE)

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
echo $bl->sum(1, 1);
    
```

##License
The MIT License (MIT). Please see License File for more information.