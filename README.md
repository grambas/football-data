# :FootballData




football-data.org API Container for Laravel 5.2 

## Install

Via Composer

``` bash
$ composer require grambas/football-data
```

## Usage

Default api version: "v1". If you want to use another, insert paramter to the end of function of api version. For Example 
Football::getLeagues('aplha'); or getLeagueFixtures($id, 'alpha')


``` 
'providers' => [
  Grambas\FootballData\FootballDataServiceProvider::class,
]

'aliases' => [
  'Football' => Grambas\FootballData\Facades\FootballDataFacade::class,
]
```

## Examples
```
Football::getLeagues();
Football::getLeagueFixtures($id)
Football::getFixtures($id, $matchday)
Football::getLeagueTable($id)
Football::getLeagueTeams($id)
Football::getTeam($id)
Football::getTeamPlayers($id)
Football::getTeamFixtures($id)
```






## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
