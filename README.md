# 1stBitcoin / Web Coin Tool

[![License](https://img.shields.io/:license-mit-blue.svg)](https://github.com/1stBitcoin/WebCoinTool/blob/master/LICENSE)

Web Coin Tool

Quick overview over connected peers to coin network, Ip address country origin with caching & fast addnodes to configfile.


Latest Version
----
Release 0.1.0 (Release Notes)

### Table of Contents
| No | Title						                         |
|----|-------------------------------------------|
| 1  | [Why Web Coin Tool?](#why-web-coin-tool)  |
| 2  | [Technical Features](#technical-features) |
| 3  | [How to Install](#installation)				   |
| 4  | [Preview](#preview)				               |
| 5  | [Development](#development)				       |
| 6  | [License](#license)				          	   |


Why Web Coin Tool
----
  - Alternative way to check connected peers to your coin deamon.

[[back to top]](#table-of-contents)

Technical Features
----
  - **PHP** - Builds(compiles) the pages, 
	reads and converts json outputs from coin, 
	ip to country api requests 
	and caching the country results on local disc.

  - **EasyBitcoin-PHP** - Comunicates with coin deamon/qt server. 

  - **Coin** - Coin deamon. Bitcoin, Litecoin any coin deamon/qt server should be compatible. 

[[back to top]](#table-of-contents)

Installation
----
Web Coin Tool requires web-server with PHP at least 7.0 and CURL. 
Linux Ubuntu 16 LTS installation:
```sh
$ sudo apt-get update

$ sudo apt-get install apache2 -y

$ sudo apache2ctl configtest
```
Returns:
Syntax OK

if not. You will have to add "ServerName" in apache2.conf file.
```sh
$ sudo nano /etc/apache2/apache2.conf
```
add:
ServerName your_server_domain_or_IP_address

and change: 

<Directory /var/www/>
        Options Indexes FollowSymLinks
	AllowOverride None
        Require all granted
</Directory>

to:
<Directory /var/www/>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
</Directory>

That will allow .htaccess file to work for further enhanced security.
```sh
$ sudo apt-get install curl php libapache2-mod-php php-mcrypt php-curl -y

$ sudo service apache2 restart 

$ sudo apache2ctl configtest
```
Returns:
Syntax OK

Now you can copy files in /var/www/html/

Last privilege fix.
```sh
sudo chown nobody /var/www/html/ip/ -R
sudo chmod 0755 /var/www/html/ip/ -R

```


[[back to top]](#table-of-contents)

Preview
----
![GitHub Logo](https://raw.githubusercontent.com/1stBitcoin/WebCoinTool/blob/master/screenshot.png "Screenshot")

http://80.211.188.146/

[[back to top]](#table-of-contents)

Development
----
Future development is scheduled for his project.
Want to contribute? Great! Please do not hesitate to contribute to the development.

[[back to top]](#table-of-contents)

License
----
MIT

[[back to top]](#table-of-contents)
