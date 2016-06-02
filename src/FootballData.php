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
	
	public function getLeagues($v = 'v1')
	 	{
		$leagues = $this->client->get('{$v}/soccerseasons')->json();
		
		return $leagues;
	}
	
	public function getLeagueFixtures($id, $v = 'v1')
	{		
		$fixtures = $this->client->get("{$v}/soccerseasons/{$id}/fixtures")->json();
		
		return $fixtures;
	}
	
	public function getFixtures($id, $matchday,$v = 'v1')
	{
		$fixtures = $this->client->get("{$v}/soccerseasons/{$id}/fixtures/?matchday={$matchday}")->json();
		
		return $fixtures;
	}
	
	public function getLeagueTable($id,$v = 'v1')
	{
		$league = $this->client->get("{$v}/soccerseasons/{$id}/leagueTable")->json();
		
		return $league;		
	}
	
	public function getLeagueTeams($id,$v = 'v1')
	{
		$teams = $this->client->get("{$v}/soccerseasons/{$id}/teams")->json();
		
		return $teams;		
	}
	
	public function getTeam($id,$v = 'v1')
	{
		$team = $this->client->get('{$v}/teams/'. $id)->json();

		return $team;		
	}
	
	public function getTeamPlayers($id,$v = 'v1')
	{
		$players = $this->client->get('{$v}/teams/'. $id .'/players')->json();
		
		return $players;
	}
	
	public function getTeamFixtures($id,$v = 'v1')
	{
		$team_fixtures = $this->client->get('{$v}/teams/'. $id .'/fixtures')->json();
		
		return $team_fixtures;
	}


	public function test($id,$v = 'v1')
	{
		$t = $this->client->get('{$v}/soccerseasons/'. $id)->json();
		
		return $t;
	}
}