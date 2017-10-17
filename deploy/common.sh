#!/bin/bash
#========================================================================
#   FileName: common.sh
#     Author: nicolas
#      Email: opensmarty@163.com
#   HomePage: http://opensmarty.github.io
# LastChange: 2017-10-13 21:05:13
#========================================================================


COLOR_GREEN="\033[0;32m"
COLOR_RED="\033[0;31m"
COLOR_YELLOW="\033[1;33m"
COLOR_REMOVE="\e[00m"
BASE="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"


# check if command exists
haveCMD () {
    if ( command -v $1 &>/dev/null )
    then
        echo have command $1
        return 0
    else
        echo don not have command $1
        return 1
    fi
}

# install package using apt-get
aptInstall () {
    CMD="apt-get install -y -qq $1"
    if ( $CMD )
    then
        echo "Install $1 succeed"
        return 0
    else
        echo "Install $1 failed"
        return 1
    fi
}

# Package test
havePackage () {
    if (dpkg -s $1)
    then
        return 0
    else
        return 1
    fi
}

# enhanced echo
ECHO () {
    echo -e $1$2$COLOR_REMOVE
}

# detect and install
requirePackage () {
    ECHO "Detecting Package [$1] : \c"

    # install apache2 if have not
    if ! havePackage $1 &>/dev/null
    then
        ECHO $COLOR_YELLOW "[miss]"
        ECHO "$1 not installed, going to install ... ... \c"
        if ! aptInstall $1 &>/dev/null
        then
            ECHO $COLOR_RED "[fail]"
            echo "Error: $1 install failed, please fix it manually"
            exit 1
        fi
    fi

    ECHO $COLOR_GREEN "[ok]"
    return 0
}

# apache mod enable
enableMod () {
    ECHO "Enable apache mod [$1]: \c"
    #if ( ln -s /etc/apache2/mods-available/$1.* /etc/apache2/mods-enabled/ -f )
    if ( a2enmod $1 &>/dev/null )
    then
        ECHO $COLOR_GREEN "[ok]" 
    else
        ECHO $COLOR_GREEN "[fail]" 
        echo "Please Fix manually on enable mod [$1]"
    fi
}

# deploy files
deployFiles () {
    cp -u $1 $2 &>/dev/null
}

# need root permission
if [[ $EUID -ne 0 ]]; then
    echo "Apache deploy script need to be runned under root" 1>&2
    exit 1
fi

if ! haveCMD lsb_release &>/dev/null
then
    echo 'Error: lsb_release not detected, seems not a proper platform for this script'
    exit 1
fi
# Enviroment needed to be Ubuntu 16.04
OS=$(lsb_release -si)
VERSION=$(lsb_release -sr)

if [ "$OS" != "Ubuntu" ]; then
    echo "Error: This deploy script only apply to Ubuntu"
    exit 1
fi

if [[ "$VERSION" != "16.04" ]]; then
    read -p "Warning: Recommond Ubuntu Version is 12.04, continue? [y/n]" re
    if [ $re == 'n' ]; then
        echo "Error: script stopped"
        exit 1
    fi
fi
