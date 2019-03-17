<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class SiteConfig extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mksite:config';

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
        $json = array();
        $this->comment('Site config');

        $siteFilePath = base_path('config/site.php');
        if (!file_exists($siteFilePath)) {
            $siteFileCont = '<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Site Config
    |--------------------------------------------------------------------------
    |
    |
    */
    
      \'long_description\' => NULL,
      \'menu\' =>[ /* use `url()` helper with names */
            "home"=> "/",
            "blogs"=> "blogs",
            "projects"=> "projects",
      ],
      "social"=>[
            "facebook" => "",
            "twitter" => "",
            "instagram" => "",
      ],
      "email"=>[
            "main"=>"",     
      ]
];

';
            File::put($siteFilePath, $siteFileCont);

            Artisan::call('config:cache');
        }

        envUpdate(['APP_NAME'=>$this->ask('what is your site name',config('app.name'))]);

        $Sdisc =  $this->ask('what is your site description',config('app.description'));
        envUpdate(['APP_DESCRIPTION'=> $Sdisc]);


        $askResult = array();
        foreach (config('site') as $item => $value){
            if(!is_array($value)) {
                $askResult['site'][$item] = $this->ask("What is $item ?", $value);
            } else {
                $this->comment("Start $item:");
                foreach ($value as $itemOfArray => $valOfArray) {
                    $askResult['site'][$item][$itemOfArray] = $this->ask("what is your $itemOfArray ".configItemType($item)."? ", $valOfArray);
                }
            }
        }
        config::set($askResult);
        $fp = fopen(($siteFilePath), 'w');
        fwrite($fp, '<?php return ' . var_export(config('site'), true) . ';');
        fclose($fp);
        Artisan::call('config:cache');

    }
}
