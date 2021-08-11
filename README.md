# Soun2json

A simple library for getting SOUN directory from GNIVC site and convert it to json.

## Warning
The datasource oof SOUN directory is in ARJ archive. 
This library use p7zip and PHP exec command for extracting DBF files from archive.
You need installed p7zip package on your environment.

### MasOS using HomeBrew:
```shell script
brew install p7zip
```

### Ubuntu:
```shell script
sudo apt install p7zip-full
```

### Fedora, CentOS:
```shell script
sudo yum install p7zip p7zip-plugins
```

## Installation

You can install it through [Composer](https://getcomposer.org):

```shell script
$ composer require codegen/soun2json
```

## Usage

```php

use Soun2json\Soun2json;

$json = new Soun2json();
echo $json->getData();
```


