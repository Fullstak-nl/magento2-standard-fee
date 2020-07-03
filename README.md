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

## FAQ

### Where can I edit the label and price?
When you navigate to `Stores -> Configuration -> Sales`. You will see the first tab is the Standard Fee tab.
![Admin screenshot](https://fullstak.nl/github/standardfee-mainimage.png)

### I want to disable the fee
Simply remove or disable the module. No need to keep it active if you don't use it.

### Can i use it for certain products or categories?
Yes, but it would require some custom code. If you want this to be done you can always contact us!

## Found bugs?
Please create an issue in our [issue tracker](https://github.com/Fullstak-nl/magento2-standard-fee/issues).
To solve the issue as quick as possible please include how to reproduce the error and some additional information like Magento2 version and hosting details.

## Want your own module?
Don't hesitate to send us an email at [info@fullstak.nl](mailto:info@fullstak.nl)
