EasyDump
=====

EasyDump is an easy, sexy and lightweight way to display your PHP variable when developing. It is a nice alternative to ```var_dump```. It was partly inspired by (but not based on) [Kint](http://www.webresourcesdepot.com/kint-a-debugging-helper-for-php-apps/), but is way more simple.

## Use

### Dump variables

You only need the ```easydump.php``` file. Just include it in your code:

```php
require_once( 'easydump.php');
```

Then call the EasyDump functions:

```php
$var = 'test';
EasyDump::debug($var);
EasyDump::debugExit($var);
```

Or you can use the shortcut alias:

```php
d($var);
de($var);
```

See ```index.php``` for examples.

### Change color theme

Juste change the values of the array called **$color** in ```easydump.php```.

## Licence

EasyDump is in the public domain. This means you can do whatever you want with it without any restriction. If you need a public license, consider it as distributed under the [WTFPL](http://www.wtfpl.net/txt/copying/).

The only exception to this rule is the default color theme: it is called Earthsong and was originally created by [daylerees](https://github.com/daylerees/colour-schemes/#earthsong) and distributed under the MIT License.

Still, if you want to do a link to this page, it would be really appreciated :)
