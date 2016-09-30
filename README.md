#laravel 小工具
  CreateModel.php
    自动创建Model文件,先连接数据库 将文件放入laravel app/Console/Commands然后
      app/Console/Commands/Kernel.php中
   
        protected $commands = [
            Commands\CreateModel::class

            //
        ];
         



  
