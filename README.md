# IntISP Web Hosting Interface

The IntISP Web hosting interface is a plugin to the IntISP solution. We have made the project open source once again. IntISP can be rewritten to interface into many different control panels like CPanel, IntISP, Webmin, or whatever you would like. 

## Whats Included?

- IntISP Software Itself
- phpmyadmin Database Management Software
- Monsta FTP Client
- Awesome Error Reporting Utility
- Full SMTP Client to automatically send mail to users
- Random AES256 Password Hashing
- OAUTH Connectivity to Twitter, Google, Facebook, and Github

## Installation

1. Copy Files to the Web Server
2. Install Composer (curl -sS https://getcomposer.org/installer | php)
3. composer.phar install
4. Follow the Installation Procedure Online

## Hacking

- [Communication Class with Hosting Server](https://github.com/INTisp/INTisp/blob/master/includes/classes/communication.class.php)
- [License Class in case of issues](https://github.com/INTisp/INTisp/blob/master/includes/classes/license.class.php)
- [Add Custom Oauth Protocols](https://github.com/INTisp/INTisp/tree/master/includes/oauth)
