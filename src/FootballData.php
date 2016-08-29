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
<<<<<<< HEAD

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
=======
	
	public function getLeagues( $v="v1")
	 	{
		$leagues = $this->client->get("{$v}/soccerseasons")->json();
		
		return $leagues;
	}
	
	public function getLeagueFixtures($id, $v="v1")
	{		
		$fixtures = $this->client->get("{$v}/soccerseasons/{$id}/fixtures")->json();
		
		return $fixtures;
	}
	
	public function getFixtures($id, $matchday, $v="v1")
	{
		$fixtures = $this->client->get("{$v}/soccerseasons/{$id}/fixtures/?matchday={$matchday}")->json();
		
		return $fixtures;
	}
	
	public function getLeagueTable($id, $v="v1")
	{
		$league = $this->client->get("{$v}/soccerseasons/{$id}/leagueTable")->json();
		
		return $league;		
	}
	
	public function getLeagueTeams($id, $v="v1")
	{
		$teams = $this->client->get("{$v}/soccerseasons/{$id}/teams")->json();
		
		return $teams;		
	}
	
	public function getTeam($id, $v="v1")
	{
		$team = $this->client->get("{$v}/teams/". $id)->json();
>>>>>>> origin/master

	public function getFixturesOfSet($leagueCode="", $timeFrame="")
	{	
		$fixtures = $this->client->get( "fixtures/?leagueCode={$leagueCode}&timeFrame={$timeFrame}")->getBody();
		return json_decode($fixtures);
	}
<<<<<<< HEAD
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
=======
	
	public function getTeamPlayers($id, $v="v1")
	{
		$players = $this->client->get("{$v}/teams/". $id ."/players")->json();
		
		return $players;
	}
	
	public function getTeamFixtures($id, $v="v1")
	{
		$team_fixtures = $this->client->get("{$v}/teams/". $id ."/fixtures")->json();
		
		return $team_fixtures;
	}


	public function getFixture($id, $v="v1")
	{
		//$fixture = $this->client->get( "{$v}/fixtures/". $id. "/head2head=".$matches)->json();
		
		$fixture = $this->client->get( "{$v}/fixtures/". $id)->json();

		return $fixture;
>>>>>>> origin/master
	}
}
