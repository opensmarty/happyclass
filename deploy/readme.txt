[部署配置要求]
1 程序安装
    请将需要安装的模块名,每行一个放在packages中
2 环境配置
    将需要的apache模块配置文件，放在./configure/apache2/conf.d/中（注意文件后缀为.conf）
    将需要的apache站点配置文件，放在./configure/apache2/sites-enable/中（注意文件后缀为.conf）
    将需要的php配置文件，放在./configure/php5/conf.d/中（注意文件后缀为.ini）
    讲需要启用的模块名称放在./configure/apache2/enable.txt中（eg:rewrite, speling, include）
3 权限设定
    部署脚本会自动将所需部署站点的用户改为www-data，权限默认为644，非特殊情况无需更改权限
