# google-iap-php

Google支付验证

## install
```bash
composer require sn01615/google-iap-php
```

## use
```php

use sn01615\iap\google\Verify;

include "../vendor/autoload.php";

$cc = new Verify();

# 通过setPublicKey设置public key，然后输入data和sign，返回验证结果
$vv = $cc->setPublicKey('key')->verify('data', 'signature');

# Returns 1 if the signature is correct, 0 if it is incorrect, and -1 on error.
# 如果$vv 等于1代表成功 0 代表失败 -1 表示错误
var_dump($vv);

```