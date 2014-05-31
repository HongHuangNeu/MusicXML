#The source code for project 3,first assignment  of Web Data Management

#Organization

The directory PhpProject1 contains the source code. The directory Configuration-and-Data-file contains the musicXML data file and the configuration file for php.

#How to run the project

The source code require Windows platform(to run the commands). To play the music and view the score pdf file, you also need a midi player and Adobe pdf Reader. To run the project, you have to do the following steps:

1 Install php: download a php package from the internet and extract it to drive C:. Rename the folder to "php". 

2 Install pear: go to your php directory in windows command line. If you use the latest version of php, probably you don't have the installation script for pear. You can download it from this website: 

http://pear.php.net/go-pear.phar

Run this command:

php go-pear.phar

Keep pressing enter. After installation, there will be .bat files for pear in your php directory.

3 Install XML_RPC: go to pear directory in your php directory in command line, run this command:

pear install XML_RPC2-1.1.2

4 Go to the website of exist-db API for php, download the source code:

https://github.com/CuAnnan/php-eXist-db-Client

Put the php file in lib directory in the pear directory of your php directory.

5 Use the php.ini in the Configuration-and-Data-file directory to replace the php.ini in your php directory. It contains all the necessary configuration for you. Then restart php.

6 Install Lilypond, make sure it is installed in:

D:\LilyPond

Also make sure that during installation the Python bundle is also install(Do not uncheck the option for Python bundle)

7 In your exist db, create a folder called movie and upload the music.xml in Configuration-and-Data-file folder to the movie folder in exist-db. In the program the port number for exist-db is 8080, user name is admin and password is admin. You can change the configuration in search.php very easily.

8 Now you can run our applicaton. Enjoy!


========

The source code for project 3 of web data management
