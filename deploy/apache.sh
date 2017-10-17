#!/bin/bash
#========================================================================
#   FileName: apache.sh
#     Author: Jack
#      Email: fhmily@gmail.com
#   HomePage: http://www.fhmily.com
# LastChange: 2013-06-08 11:43:02
#========================================================================

# import common functions
source common.sh

# require dpkg packages list
for package in $(cat $BASE/packages.txt)
do
    requirePackage $package
done

# deploy apache configure files
deployFiles $BASE/configure/apache2/conf.d/* /etc/apache2/conf.d/

# deploy apache site configure files
deployFiles $BASE/configure/apache2/sites-enable/* /etc/apache2/sites-enabled/

# deploy php configure files
deployFiles $BASE/configure/php5/conf.d/* /etc/php5/conf.d/

# enable apache mods
for mod in $(cat ./configure/apache2/enable.txt)
do
    enableMod $mod
done

# change owners to www-data
# change file permissions to 644
#chown -R www-data:www-data $BASE/../
#chmod -R 644 $BASE/../

# restart apache2 service to continue
service apache2 restart
