<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createmodel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = './app/Model';
        //是否存在model文件夹
        if(!file_exists($path)){
            mkdir($path);
        }
            $dbname = env('DB_DATABASE');

            $table = \DB::select("Select distinct table_name from INFORMATION_SCHEMA.COLUMNS   Where   table_schema = ? ",[$dbname]);

            foreach ($table as $index => $item) {
                  $modelname = substr($item->table_name,4);

                  if(file_exists($path.'/'.$modelname.'Model.php')){
                      continue;
                  }else{
                      $file = fopen($path.'/'.$modelname.'Model.php','w');
                      $text = '<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
class '.$modelname.'Model extends Model{

    protected $table="'.$item->table_name.'";





};';
                        fwrite($file,$text);
                      fclose($file);
                      echo  $modelname.'--->create ok'."\n";
                  }


            }






    }
}
