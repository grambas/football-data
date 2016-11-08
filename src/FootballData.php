<?php
namespace Grambas\FootballData;
use GuzzleHttp\Client;
class FootballData
{
	protected $client;
	
	public function __construct(Client $client )
	{	
		$this->client = $client;
	}
	//COMPETITION/LEAGUE
	public function LeagueTable($id, $matchday="")
	 	{
		$leagueTable = $this->client->get("competitions/{$id}/leagueTable/?matchday={$matchday}")->getBody();
		return json_decode($leagueTable);
	}
	public function getLeagues($year="")
	 	{
		$leagues = $this->client->get("competitions/?season={$year}")->getBody();
		return json_decode($leagues);
	}
	public function  getLeagueTeams($id)
	 	{
		$leagueTeams = $this->client->get("competitions/{$id}/teams")->getBody();
		return json_decode($leagueTeams);
	}
	public function getLeagueFixtures($id, $matchday="", $timeFrame="")
	 	{
		$leagueFixtures = $this->client->get("competitions/{$id}/fixtures/?matchday={$matchday}&timeFrame={$timeFrame}")->getBody();
		return json_decode($leagueFixtures);
	}
	//FIXTURES
	public function getFixture($id, $head="")
	{	
		$fixture = $this->client->get( "fixtures/{$id}/?head2head={$head}")->getBody();
		return json_decode($fixture);
	}
	public function getFixturesOfSet($leagueCode="", $timeFrame="")
	{	
		$fixtures = $this->client->get( "fixtures/?leagueCode={$leagueCode}&timeFrame={$timeFrame}")->getBody();
		return json_decode($fixtures);
	}
	public function getTeamFixtures($id, $season="", $timeFrame="", $venue="")
	{
		$teamFixtures = $this->client->get("teams/{$id}/fixtures/?season={$season}&timeFrame={$timeFrame}&venue={$venue}")->getBody();
		return json_decode($teamFixtures);
	}
	// TEAM
	public function getTeam($id)
	{
		$team = $this->client->get("teams/{$id}")->getBody();
		return json_decode($team);		
	}
	//PLAYERS
	public function getTeamPlayers($id)
	{
		$players = $this->client->get("teams/{$id}/players")->getBody();
		return json_decode($players);
	}
}