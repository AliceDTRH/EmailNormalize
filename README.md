# EmailNormalize
A library that does its best to normalize emails from various populair email companies.

This is useful in preventing multiple signups from the same email for games for example.

Currently only supports Google Mail.

Install like this:
```console
composer require alicedtrh/emailnormalizer
```
Use like this:
```php
<?php

use \AliceDTRH\EmailNormalizer\EmailNormalizer;

$normalizer = new EmailNormalizer();
$email = "exampLE.Email+example1234@gmail.com";

echo($normalizer->normalizeEmail($email)); //Output: exampleemail@gmail.com

?>
```
## License
```Text
AliceDTRH/EmailNormalize is licensed under the GNU Affero General Public License v3.0

Some parts of this code use information from https://github.com/iDoRecall/email-normalize
which is licensed under the MIT License.
```
