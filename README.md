# laravel-vue

##php应用商店
https://packagist.org/

##阿里云镜像
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

##查看镜像配置
composer config -l -g

##下载laravel镜像
composer create-project --prefer-dist laravel/laravel blog "5.4.*"

##下载laravel的代码提示工具
composer require barryvdh/laravel-ide-helper "2.4.0"
（不加版本号为最新版本）
####接下来在config/app.php的providers数组添加
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
####最后执行命令
php artisan ide-helper:generate

>laravel版本是5.4.30

>php版本7.3.4

>mysql版本5.7.26