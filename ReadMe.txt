Configuration Instructions:
    1.Set up lamp server With phpMyAdmin
        Insure the configuration is the same or comparable to the following:
                Database Server:
                        Server: Localhost via UNIX socket
						Server type: MariaDB
						Server connection: SSL is not being used  Documentation 
						Server version: 10.1.26-MariaDB-0+deb9u1 - Debian 9.1
						Protocol version: 10
						User: admin@localhost
						Server charset: UTF-8 Unicode (utf8)
                Web server:
                        Apache/2.4.25 (Debian)
						Database client version: libmysql - mysqlnd 5.0.12-dev - 20150407 - $Id:38fea24f2847fa7519001be390c98ae0acafe387 $
						PHP extension: mysqli Documentation  curl Documentation mbstring Documentation 
						PHP version: 7.2.11-2+0~20181015120801.9+stretch~1.gbp8
                PhpMyAdmin:
                        Version information: 4.8.3 (up to date)	
	2. Then Drop HTML folder content in your apache html folder.
	3. Use the "localhost.sql" file to import needed database and tables.
	4. Copy Admin Content in to your admin home folder(If do not have Admin(named admin) Folder in home directory then please create a admin user)
	5. Then navigate to external IP for Server.

Resources:
        https://makandracards.com/makandra/52545-how-to-add-a-user-with-all-privileges-to-mariadb
		https://www.cyberciti.biz/tips/php-security-best-practices-tutorial.html
		https://www.cyberciti.biz/faq/how-to-install-linux-apache-mysql-php-lamp-stack-on-debian-9-stretch/