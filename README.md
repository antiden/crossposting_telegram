# Crossposting to Telegram

Drupal ˆ9 ˆ10 module for Crossposting content from site to Telegram Channel

## Description

This is Skeleton structure for easy to use starting your custom crossposting.

For security reason all token saved in Key module. Key module is required.

## Structure

1. Configuration Form in Services
2. In module folder you need install Telegram API SDK. Please go to the folder in module and run `composer update`
3. By defualt in Content Type, you can add custom logical field `field_crossposting_telegram`. This is field, need for Activating checkbox for reposting New node to your channel. In `.module` file, you can edit in line 19, field to your name.

## Authors

[coderteam](https://coderteam.ru)

[antiden](https://antiden.ru)