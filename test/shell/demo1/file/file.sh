#!/bin/bash

# 字符串处理、获取文件名和后缀名
file="thisfile.txt"
echo "filename: ${file%.*}"
echo "extension: ${file##*.}"
# 输出：
# filename: thisfile
# extension: txt

# 遍历整个项目并更改文件相关权限.
for file in /home/opensmarty/*
do
if [ -d "$file" ]
then
  echo "$file is directory"
elif [ -f "$file" ]
then
  echo "$file is file"
fi
done

getdir () {
    for element in `ls $1`
    do
        dir_or_file=$1"/"$element
        if [ -d $dir_or_file ]
        then
            getdir $dir_or_file
        else
            echo $dir_or_file
        fi
    done
}