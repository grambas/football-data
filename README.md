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


Add your api key to env. file

```
FootballData_API_KEY=
```
add to config/app.php 
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
##COMPETITION/LEAGUE
	
/**
 * List all available competitions.
 *
 * @param array $filter ['areas' => 'Integer /[0-9]+/']
 * @return Collection
 */
Football::getLeagues(array $filter = ['areas' => ''])

/**
 * List one particular competition.
 *
 * @param integer $leagueID 
 * @param array $filter ['areas' => 'Integer /[0-9]+/']
 * @return Collection
 */ 
Football::getLeague(int $leagueID, array $filter = ['areas' => ''])

/**
 * List all teams for a particular competition.
 *
 * @param integer $leagueID
 * @param array $filter ['stage' => 'String /[A-Z]+/']
 * @return Collection
 */
Football::getLeagueTeams(int $leagueID, array $filter = ['stage' => ''])

/**
 * Show Standings for a particular competition
 *
 * @param integer $leagueID
 * @return Collection
 */
Football::getLeagueStandings(int $leagueID)

/**
 * List all matches for a particular competition.
 *
 * @param integer $leagueID
 * @param array $filter ['dateFrom' => 'yyyy-MM-dd', 'dateTo' => 'yyyy-MM-dd', 'stage' => 'String /[A-Z]+/', 'status' => 'SCHEDULED | LIVE | IN_PLAY | PAUSED | FINISHED | POSTPONED | SUSPENDED | CANCELED', 'matchday' => 'Integer /[1-4]*[0-9]', 'group' => '']
 * @return Collection
 */
Football::getLeagueMatches(int $leagueID, array $filter = [ 'dateFrom' => '', 'dateTo' => '', 'stage' => '', 'status' => '', 'matchday' => '', 'group' => '' ])
	


##FIXTURES/MATCHES

/**
 * List matches across (a set of) competitions.	
 *
 * @param array $filter [ 'competitions' => 'Integer /[0-9]+/', 'dateFrom' => 'yyyy-MM-dd', 'dateTo' => 'yyyy-MM-dd', 'status' => 'SCHEDULED | LIVE | IN_PLAY | PAUSED | FINISHED | POSTPONED | SUSPENDED | CANCELED' ]
 * @return Collection
 */
Football::getMatches(array $filter = [ 'competitions' => '', 'dateFrom' => '', 'dateTo' => '', 'status' => '' ])

/**
 * Show one particular match.	
 *
 * @param integer $matchID
 * @return Collection
 */
Football::getMatche(int $matchID)



##TEAM

/**
 * Show one particular team.	
 *
 * @param integer $teamID
 * @return Collection
 */
Football::getTeam(int $teamID)

/**
 * Show all matches for a particular team.
 *
 * @param integer $teamID
 * @param array $filter ['dateFrom' => 'yyyy-MM-dd', 'dateTo' => 'yyyy-MM-dd', 'status' => 'SCHEDULED | LIVE | IN_PLAY | PAUSED | FINISHED | POSTPONED | SUSPENDED | CANCELED', 'venue' => 'home|away']
 * @return Collection
 */
Football::getMatchesForTeam(int $teamID, array $filter = [ 'dateFrom' => '', 'dateTo' => '', 'status' => '', 'venue' => '' ])



##AREAS
	
/**
 * List all available areas.
 *
 * @return Collection
 */
Football::getAreas()

/**
 * List one particular area.
 *
 * @param integer $areaID 
 * @return Collection
 */
Football::getArea(int $areaID)
```


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-packagist]: https://packagist.org/packages/grambas/football-data
[link-author]: https://github.com/grambas
