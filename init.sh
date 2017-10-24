#!/bin/bash
BASE="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

start=$(date +%s%N)
start_ms=${start:0:16}

# 遍历整个项目并更改文件相关权限.
changeFileMod () {
    for element in `ls $1`
    do
        file=$1/$element
        if [ -d $file ]
        then
            echo $file 是目录
            chmod 775 $file
            changeFileMod $file
        else
            echo $file 是文件
            fileinfo=`basename $file`
            filename=${fileinfo%.*}
            extension=${fileinfo##*.}
            if [ $extension == "sh" ]
            then
                chmod 744 $file
            else
                chmod 644 $file
            fi
        fi
    done
}

changeFileMod $BASE

end=$(date +%s%N)
end_ms=${end:0:16}
echo "cost time is:"
echo "scale=6;($end_ms - $start_ms)/1000000" | bc