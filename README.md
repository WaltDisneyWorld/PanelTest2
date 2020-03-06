# Adaclare Web Host Manager

**Not for production use yet**

[![ko-fi](https://www.ko-fi.com/img/githubbutton_sm.svg)](https://ko-fi.com/H2H81HAQY)

[Latest Docker Image](https://hub.docker.com/r/adaclare/intisp)

IntISP is a web hosting control panel that can run in a docker container. It consists of two major parts, the control panel and the backend daemon server. The control panel is written in PHP using composer and the daemon is written in Javascript. Together they communicate together seamlessly.

## Current Features

- Clean & Responsive Control Panel
- Completely Rewritten Code
- Docker Enviroment
- Error Reporting Utility
- Full SMTP Client to automatically send mail to users
- [Defuse PHP Encryption](https://github.com/defuse/php-encryption)
- OAUTH Connectivity to Twitter, Google, Facebook, and Github **sort of, not ready yet**

## Things that need to be fixed

- File Manager
- Composer installs phpmyadmin instead
- Remove **depreciated** Port methods
- Fix mysql id's to auto increment
- Add a docker bypass for configuration files
- Setup Persistant Storage

## Planned Additions

- Email
- SSL
- Better Subdomains
- A new interface
- CI & Testing
- Java Daemon
