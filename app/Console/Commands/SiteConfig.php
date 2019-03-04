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
    
      \'short_desc\' => env(\'APP_DESCRIPTION\', \'Site Description\'),
      \'long_desc\' => NULL,
      \'menu\' =>[ /* use `url()` helper with names */
            "Home"=> "/",
            "Blog"=> "blogs",
            "Projects"=> "projects",
            "Pages"=> "true"
      ]
      "social"=>[
            "facebook" => NULL,
            "twitter" => NULL,
            "instagram" => NULL,
      ]

];

';
            File::put($siteFilePath, $siteFileCont);

            Artisan::call('config:cache');
        }

        envUpdate(['APP_NAME'=>$this->ask('what is your site name')]);

        $Sdisc =  $this->ask('what is your site SHORT description',config('site.short_desc'));
        envUpdate(['APP_DESCRIPTION'=> $Sdisc]);
        config::set(['site.long_desc' => $this->ask('what is your site LONG description',config('site.long_desc'))]);

        config::set(['site.social.facebook' => $this->ask("Facebook Link [you can leave it blank]",config('site.social.facebook'))]);
        config::set(['site.social.twitter' => $this->ask("Twitter Link [you can leave it blank]",config('site.social.twitter'))]);
        config::set(['site.social.instagram' => $this->ask("Instagram Link [you can leave it blank]",config('site.social.instagram'))]);

        $fp = fopen(($siteFilePath), 'w');
        fwrite($fp, '<?php return ' . var_export(config('site'), true) . ';');
        fclose($fp);
        Artisan::call('config:cache');

    }
}
