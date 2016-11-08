# :FootballData




football-data.org API Container for Laravel 5.1, 5.2


## Requirements
-  "guzzlehttp/guzzle": "~6.0"


## Install

Via Composer

``` bash
$ composer require grambas/football-data dev-master
```

## Usage

More about filters, structure and API:
[football-data.org Documentation](http://api.football-data.org/documentation)


``` 
'providers' => [
  Grambas\FootballData\FootballDataServiceProvider::class,
]

'aliases' => [
  'Football' => Grambas\FootballData\Facades\FootballDataFacade::class,
]
```

## Examples
```php

//COMPETITION

Football::LeagueTable($id) 			 	//Show League Table / current standing
Football::LeagueTable($id,$matchday) 	//Show League Table / current standing with filters

Football::getLeagues(); 				//List all available competitions.
Football::getLeagues($year);			//List all available competitions with filter

Football::getLeagueTeams($id)  			//List all teams for a certain competition.



//FIXTURES

Football::getCompetitionFixtures($id)   //List all fixtures for a certain competition.
Football::getCompetitionFixtures($id,$matchday,$timeFrame)  //List all fixtures for a certain competition with filters.

Football::getFixture($id) 				//Show one fixture.
Football::getFixture($id, $head2head)   //Show one fixture. Variable head2head ist number of games to analyse

Football::getFixturesOfSet() 			//List fixtures across a set of competitions
Football::getFixturesOfSet($leagueCode, $timeFrame) //List fixtures across a set of competitions with filters

Football::getTeamFixtures($id) 			// 	Show all fixtures for a certain team.
Football::getTeamFixtures($id, $season, $timeFrame, $venue) // 	Show all fixtures for a certain team with filters. Example:Football::getTeamFixtures(66, "2015","n99","home") 

//TEAM
Football::getTeam($id) 					//Show one team.

//PLAYERS
Football::getTeamPlayers($id) 			//Show all players for a certain team.
```





## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
