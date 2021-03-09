# Flash Mc Queen

Session based PHP Flash Messages.

Store messages in sessions and display them when you need.

## Features

* Customize icons, colors, or use predefined functions
* Namespaced
* Persistent messages

## Installation

Via composer

````shell
composer install 
````

Via file (Download PHP file (and style if you want), from this repository).

````php
require '/path/to/FlashMcQueen.php';
````

## Basic Usage

````php
require '/path/to/FlashMcQueen.php';

use AzenoX\FlashMcQueen;



if(!session_id())
    session_start();

$flash = new FlashMcQueen();

$flash->success("A Success Message", true, [], true);
$flash->error("An Error Message");
$flash->warning("A Warning Message");
$flash->info("An Informational Message");

$flash->custom("Am a Fish", '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M21 11c0-.552-.448-1-1-1s-1 .448-1 1c0 .551.448 1 1 1s1-.449 1-1m3 .486c-1.184 2.03-3.29 4.081-5.66 5.323-1.336-1.272-2.096-2.957-2.103-4.777-.008-1.92.822-3.704 2.297-5.024 2.262.986 4.258 2.606 5.466 4.478m-6.63 5.774c-.613.255-1.236.447-1.861.573-1.121 1.348-2.796 2.167-5.287 2.167-.387 0-.794-.02-1.222-.061.647-.882.939-1.775 1.02-2.653-2.717-1.004-4.676-2.874-6.02-4.287-1.038 1.175-2.432 2-4 2 1.07-1.891 1.111-4.711 0-6.998 1.353.021 3.001.89 4 1.999 1.381-1.2 3.282-2.661 6.008-3.441-.1-.828-.399-1.668-1.008-2.499.429-.04.837-.06 1.225-.06 2.467 0 4.135.801 5.256 2.128.68.107 1.357.272 2.019.495-1.453 1.469-2.271 3.37-2.263 5.413.008 1.969.773 3.799 2.133 5.224"/></svg>', '#00BCD4', true);


$flash->display();
````

## List of all methods

### Success

`````php
$flash->success(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false);
`````

* $msg: The displayed message
* $persistent: true if the message will be remains on the screen until the user remove it (Default: false)
* $delays: It's an associative array with 3 optional keys:
  * **fadeIn** (Default: 1): Number of seconds of the fade in animation
  * **stay** (Default: 5): Number of seconds while the message will stay on the screen
  * **fadeOut** (Default: 1): Number of seconds of the fade out animation
* $floatingIcon: true if the icon should be animated

### Error

`````php
$flash->error(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false);
`````

* $msg: The displayed message
* $persistent: true if the message will be remains on the screen until the user remove it (Default: false)
* $delays: It's an associative array with 3 optional keys:
  * **fadeIn** (Default: 1): Number of seconds of the fade in animation
  * **stay** (Default: 5): Number of seconds while the message will stay on the screen
  * **fadeOut** (Default: 1): Number of seconds of the fade out animation
* $floatingIcon: true if the icon should be animated

### Warning

`````php
$flash->warning(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false);
`````

* $msg: The displayed message
* $persistent: true if the message will be remains on the screen until the user remove it (Default: false)
* $delays: It's an associative array with 3 optional keys:
  * **fadeIn** (Default: 1): Number of seconds of the fade in animation
  * **stay** (Default: 5): Number of seconds while the message will stay on the screen
  * **fadeOut** (Default: 1): Number of seconds of the fade out animation
* $floatingIcon: true if the icon should be animated

### Info

`````php
$flash->info(string $msg, bool $persistent = false, array $delays = [], bool $floatingIcon = false);
`````

* $msg: The displayed message
* $persistent: true if the message will be remains on the screen until the user remove it (Default: false)
* $delays: It's an associative array with 3 optional keys:
  * **fadeIn** (Default: 1): Number of seconds of the fade in animation
  * **stay** (Default: 5): Number of seconds while the message will stay on the screen
  * **fadeOut** (Default: 1): Number of seconds of the fade out animation
* $floatingIcon: true if the icon should be animated

### Custom

`````php
$flash->custom(string $msg, string $icon, string $color, bool $persistent = false, array $delays = [], bool $floatingIcon = false);
`````

* $msg: The displayed message
* $icon: It can be any character or any SVG
* $color: A hex color (with '#' at the beginning)
* $persistent: true if the message will be remains on the screen until the user remove it (Default: false)
* $delays: It's an associative array with 3 optional keys:
  * **fadeIn** (Default: 1): Number of seconds of the fade in animation
  * **stay** (Default: 5): Number of seconds while the message will stay on the screen
  * **fadeOut** (Default: 1): Number of seconds of the fade out animation
* $floatingIcon: true if the icon should be animated


## License

You are allowed to copy, modify and redistribute this code.
