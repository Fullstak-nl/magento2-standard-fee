# magento2-standard-fee
A simple module to setup a single standard fee in your shop

## Installation

### Install with composer (recommend)
Run the following command in your Magento2 root:
```
composer require fullstak/magento2-standard-fee
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

### Install through FTP
Download this repo and create the the following directory structure in your Magento2 root:
```
app/code/Fullstak/StandardFee/
```
Then upload this repo into the map and run the following commands in your Magento2 root:
```
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## Found bugs?
Please create an issue in our [issue tracker](https://github.com/Fullstak-nl/magento2-standard-fee/issues).
To solve the issue as quick as possible please include how to reproduce the error and some additional information like Magento2 version and hosting details.

## Want your own module?
Don't hesitate to send us an email at [info@fullstak.nl](mailto:info@fullstak.nl)
