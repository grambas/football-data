<?php  namespace Grambas\FootballData;

use GuzzleHttp\Client;

class FootballData
{
	protected $client;
	
	public function __construct(Client $client )
	{	
		$this->client = $client;
	}

	public function run($uri, $type = 'GET')
	{
		return json_decode( $this->client->request($type, $uri)->getBody() );
	}



	##COMPETITION/LEAGUE
	
	/**
	 * List all available competitions.
	 *
	 * @param array $filter
	 * @return Collection
	 */
	public function getLeagues(array $filter = ['areas' => ''])
	{
		$leagues = $this->run("v2/competitions"."?".http_build_query($filter) );
		return collect($leagues->competitions);
	}

	/**
	 * List one particular competition.
	 *
	 * @param integer $leagueID 
	 * @param array $filter
	 * @return Collection
	 */
	public function getLeague(int $leagueID, array $filter = ['areas' => ''])
	{
		$league = $this->run("v2/competitions/{$leagueID}"."?".http_build_query($filter));
		return collect($league);
	}

	/**
	 * List all teams for a particular competition.
	 *
	 * @param integer $leagueID
	 * @param array $filter
	 * @return Collection
	 */
	public function  getLeagueTeams(int $leagueID, array $filter = ['stage' => ''])
	{
		$leagueTeams = $this->run("v2/competitions/{$leagueID}/teams"."?".http_build_query($filter));
		return collect($leagueTeams->teams);
	}

	/**
	 * Show Standings for a particular competition
	 *
	 * @param integer $leagueID
	 * @return Collection
	 */
	public function getLeagueStandings(int $leagueID)
	{
		$leagueStandings = $this->run("v2/competitions/{$leagueID}/standings");
		return collect($leagueStandings->standings);
	}

	/**
	 * List all matches for a particular competition.
	 *
	 * @param integer $leagueID
	 * @param array $filter
	 * @return Collection
	 */
	public function getLeagueMatches(int $leagueID, array $filter = [ 'dateFrom' => '', 'dateTo' => '', 'stage' => '', 'status' => '', 'matchday' => '', 'group' => '' ])
	{
		$leagueMatches = $this->run("v2/competitions/{$leagueID}/matches"."?".http_build_query($filter));
		return collect($leagueMatches->matches);
	}
	


	##FIXTURES/MATCHES

	/**
	 * List matches across (a set of) competitions.	
	 *
	 * @param array $filter
	 * @return Collection
	 */
	public function getMatches(array $filter = [ 'competitions' => '', 'dateFrom' => '', 'dateTo' => '', 'status' => '' ])
	{
		$matches = $this->run("v2/matches"."?".http_build_query($filter));
		return collect($matches->matches);
	}

	/**
	 * Show one particular match.	
	 *
	 * @param integer $matchID
	 * @return Collection
	 */
	public function getMatche(int $matchID)
	{
		$matche = $this->run("v2/matches/{$matchID}");
		return collect($matche);
	}



	##TEAM

	/**
	 * Show one particular team.	
	 *
	 * @param integer $teamID
	 * @return Collection
	 */
	public function getTeam(int $teamID)
	{
		$team = $this->run("v2/teams/{$teamID}");
		return collect($team);
	}

	/**
	 * Show all matches for a particular team.
	 *
	 * @param integer $teamID
	 * @param array $filter
	 * @return Collection
	 */
	public function getMatchesForTeam(int $teamID, array $filter = [ 'dateFrom' => '', 'dateTo' => '', 'status' => '', 'venue' => '' ])
	{
		$matches = $this->run("v2/teams/{$teamID}/matches"."?".http_build_query($filter));
		return collect($matches->matches);
	}


	##AREAS
	
	/**
	 * List all available areas.
	 *
	 * @return Collection
	 */
	public function getAreas()
	{
		$areas = $this->run("v2/areas");
		return collect($areas->areas);
	}

	/**
	 * List one particular area.
	 *
	 * @param integer $areaID 
	 * @return Collection
	 */
	public function getArea(int $areaID)
	{
		$area = $this->run("v2/areas/{$areaID}");
		return collect($area);
	}

}