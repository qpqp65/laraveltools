#laravel 小工具
  CreateModel.php
    自动创建Model文件,先连接数据库 将文件放入laravel app/Console/Commands然后
      app/Console/Commands/Kernel.php中
   
        protected $commands = [
            Commands\CreateModel::class

            //
        ];
         
     在项目目录下 输入php artisan createmodel  完成 将在app目录底下生成Model文件夹 和数据库所有的表MODEL文件
     composer 中加载
         composer require lwy/createmodel dev-master



  
