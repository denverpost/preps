<VAR $domainURL = "http://preps.denverpost.com">
<h3>Player Stats <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></h3>

<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyGames">Gms: Games</td>
<td id="keyPoints">Pts: Points</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPointsPerGame">PPG: Points Per Game</td>
<td id="keyFieldGoalsMade">Yds: Field Goals Made</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyThreePointersMade">3PM: Three Pointers Made</td>
<td id="keyFreeThrowsMade">FTM: Free Throws Made</td>
</tr>
<tr class="statKeyRow">
<td id="keyTotalRebounds">Reb: Total Rebounds</td>
<td id="keyReboundsPerGame">RPG: Rebounds Per Game</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPersonalFouls">PF: Personal Fouls</td>
<td id="keyTechnicals">TF: Technicals</td>
</tr>
<tr class="statKeyRow">
<td id="keyTurnovers">TO: Turnovers</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyAssists">Ast: Assists</td>
<td id="keyBlockedShots">BS: Blocked Shots</td>
</tr>
<tr class="statKeyRow">
<td id="keySteals">St: Steals</td>
</tr>

</table>
</div>
</td></tr>
</table>


<VAR $whereClause = " AND Games ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "Points DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFEQUAL $form_debug 1>
{$TeamPlayerStats_query}
</IFEQUAL>
<h4>Scoring</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr="" align="center">Gms</th>
<th scope="col" abbr="" align="center">Pts</th>
<th scope="col" abbr="" align="center">PPG</th>
<th scope="col" abbr="" align="center">FGM</th>
<th scope="col" abbr="" align="center">3PM</th>
<th scope="col" abbr="" align="center">FTM</th>
<th scope="col" abbr="" align="center">FTA</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Scoring>
<IFGREATER ($Scoring_Games) 0>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<VAR $lastName = fixApostrophes($Scoring_PlayerLastName)>
<?PHP
$player_name = $Scoring_PlayerFirstName . ' ' . $lastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Scoring_PlayerID}/" class="leadersNameLink">{$player_name}</a></td>
<? $pPG = sprintf("%.1f", $Scoring_PointsPerGame) ?>
<ROW NAME=LeaderFootballCol STATFIELD="Games" STAT=$Scoring_Games>
<ROW NAME=LeaderFootballCol STATFIELD="Points" STAT=$Scoring_Points>
<ROW NAME=LeaderFootballCol STATFIELD="PointsPerGame" STAT=$pPG>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsMade" STAT=$Scoring_FieldGoalsMade>
<ROW NAME=LeaderFootballCol STATFIELD="ThreePointersMade" STAT=$Scoring_ThreePointersMade>
<ROW NAME=LeaderFootballCol STATFIELD="FreeThrowsMade" STAT=$Scoring_FreeThrowsMade>
<ROW NAME=LeaderFootballCol STATFIELD="FreeThrowsAttempted" STAT=$Scoring_FreeThrowsAttempted>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>

<ELSE>
</IFGREATER>

</tbody>
</table>
<br /><br />

<VAR $whereClause = " AND Games ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "TotalRebounds DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>OTHER</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr="" align="center">Reb</th>
<th scope="col" abbr="" align="center">RPG</th>
<th scope="col" abbr="" align="center">PF</th>
<th scope="col" abbr="" align="center">TF</th>
<th scope="col" abbr="" align="center">TO</th>
<th scope="col" abbr="" align="center">Ast</th>
<th scope="col" abbr="" align="center">BS</th>
<th scope="col" abbr="" align="center">St</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Other>

<IFGREATER ($Other_Games) 0>

<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<VAR $lastName = fixApostrophes($Other_PlayerLastName)>
<?PHP
$player_name = $Other_PlayerFirstName . ' ' . $lastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Other_PlayerID}/" class="leadersNameLink">{$player_name}</a></td>
<VAR $rPG = ($Other_TotalRebounds/$Other_Games)>
<? $rbPG = sprintf("%.1f", $rPG) ?>
<ROW NAME=LeaderFootballCol STATFIELD="Rebounds" STAT=$Other_TotalRebounds>
<ROW NAME=LeaderFootballCol STATFIELD="ReboundsPerGame" STAT=$rbPG>
<ROW NAME=LeaderFootballCol STATFIELD="PersonalFouls" STAT=$Other_PersonalFouls>
<ROW NAME=LeaderFootballCol STATFIELD="Technicals" STAT=$Other_Technicals>
<ROW NAME=LeaderFootballCol STATFIELD="Turnovers" STAT=$Other_Turnovers>
<ROW NAME=LeaderFootballCol STATFIELD="Assists" STAT=$Other_Assists>
<ROW NAME=LeaderFootballCol STATFIELD="BlockedShots" STAT=$Other_BlockedShots>
<ROW NAME=LeaderFootballCol STATFIELD="Steals" STAT=$Other_Steals>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
<ELSE>
</IFGREATER>
</tbody>
</table>
</tbody>
</table>
