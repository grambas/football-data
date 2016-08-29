<?php
namespace Grambas\FootballData;

use Illuminate\Support\ServiceProvider;
use App;
use GuzzleHttp\Client;

class FootballDataServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('football', function()
        {
            $client = new Client([
                'base_uri'  =>  'http://api.football-data.org/v1/',
                    'headers'   =>  [
                                        'X-Auth-Token' => getenv('FootballData_API_KEY'),
                                        'X-Response-Control' => 'full',
                                    ]
            ]);
            return new FootballData($client);
        });
    }
}
