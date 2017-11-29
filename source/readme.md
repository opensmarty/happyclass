# HappyClass System
This system is a educational system for our company called HappyClass. We are committed to creating a convenient and efficient service system, please support our technical achievements.

## Install vender packages
```bash
composer require "prettus/l5-repository"
composer require "dingo/api:2.0.x-dev"
composer require "tymon/jwt-auth:1.0.*"

```

## Handle databases

### 查询数据库版本
```sql
SELECT version();
SELECT @@version
```
utf8mb4的最低mysql版本支持版本为5.5.3+，若不是，请升级到较新版本。

### 修改MySQL配置文件
修改mysql配置文件my.cnf（windows为my.ini）
my.cnf一般在/etc/mysql/conf.d/my.cnf位置
[mysql]
default-character-set = utf8mb4

mysqld.cnf一般在/etc/mysql/mysql.conf.d/mysqld.cnf位置。找到后请在以下三部分里添加如下内容：
[client]
default-character-set = utf8mb4

[mysqld]
character-set-client-handshake = FALSE
character-set-server = utf8mb4
collation-server = utf8mb4_unicode_ci
init_connect='SET NAMES utf8mb4'
### 重启mysql服务
```bash
sudo service mysql restart
```

### 重新设置mysql字符集为utf8mb4
```sql
SHOW VARIABLES WHERE Variable_name LIKE 'character_set_%' OR Variable_name LIKE 'collation%';

```

### 创建数据库
```sql
/*创建数据库*/
CREATE DATABASE db_name DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
```

### 查看数据库及表的字符集
```sql
/*使用数据库*/
USE db_name;
SHOW CREATE DATABASE db_name; /*查看数据库编码*/
SHOW CREATE TABLE tbl_name; /*查看数据表编码*/
SHOW FULL COLUMNS FROM tbl_name; /*查看字段编码*/
```

### 修改数据库及表字符集
```sql
ALTER DATABASE db_name DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci; 
ALTER TABLE tbl_name CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci; 
```