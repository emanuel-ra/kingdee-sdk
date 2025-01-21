# KingDee Client

This application helps the user to consume the webservice of KingDee.

## Installation

1. Clone the repository:

   ```sh
   git clone https://github.com/yourusername/kingdee-client.git
   cd kingdee-client
   ```

2. Install dependencies using Composer:

   ```sh
   composer install
   ```

## Usage

To use the `HelloWorld` class, you can do the following:

```php
require 'vendor/autoload.php';

use KingDee\Client\HelloWorld;

$helloWorld = new HelloWorld();
echo $helloWorld->sayHello();
```
