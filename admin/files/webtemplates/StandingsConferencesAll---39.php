<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
</IFNOTEMPTY>
<VAR $sortOrder = "seasonteam".$sqlSportName.".WinPercentage DESC">
<VAR $selectClause = "TeamName,q_team.TeamID,seasonteam".$sqlSportName.".Win as OverallWin,seasonteam".$sqlSportName.".Loss as OverallLoss,seasonteam".$sqlSportName.".WinPercentage as OverallPct,
conf.Win as ConfWin,conf.Loss as ConfLoss,conf.WinPercentage as ConfPct,home.Win as HomeWin,home.Loss as HomeLoss,home.WinPercentage as HomePct,away.Win as AwayWin,away.Loss as AwayLoss,away.WinPercentage As AwayPct">

<VAR $joinClause = "LEFT JOIN seasonteam".$sqlSportName." AS conf ON conf.SeasonTeamTeamID = q_team.TeamID AND conf.SeasonTeamCategory = \"conf\"
LEFT JOIN seasonteam".$sqlSportName." AS home ON home.SeasonTeamTeamID = q_team.TeamID AND home.SeasonTeamCategory = \"home\"
LEFT JOIN seasonteam".$sqlSportName." AS away ON away.SeasonTeamTeamID = q_team.TeamID AND away.SeasonTeamCategory = \"away\"">
<VAR $whereClause = " AND seasonteam".$sqlSportName.".SeasonTeamSeason = 2013 AND conf.SeasonTeamSeason = 2013 AND home.SeasonTeamSeason = 2013 AND away.SeasonTeamSeason = 2013">
<VAR $showStandings=true>
<IFEMPTY $form_Sport><VAR $showStandings=false></IFEMPTY>
<IFTRUE $showStandings>
<QUERY name=StandingsConferencesAll SPORTNAME=$sqlSportName SELECTCLAUSE=$selectClause JOINCLAUSE=$joinClause SORT=$sortOrder WHERECLAUSE=$whereClause>



<h3>Standings</h3>
<table class="standingsTable deluxe" cellpadding="0" cellspacing="0">
<tbody><tr id="header-main">
<!-- <td> </td> -->
<th scope="col" abbr="" rowspan="2">Team</th>
<th scope="col" abbr="" colspan="3">Overall</th>
<th scope="col" abbr="" colspan="3">Conference</th>
<th scope="col" abbr="" colspan="3">Home</th>
<th scope="col" abbr="" colspan="3">Away</th>
</tr>
<tr id="header-sub">
<!-- <td> </td> -->
<th scope="col" abbr="Wins">W</th>
<th scope="col" abbr="Losses">L</th>
<th scope="col" abbr="Win Percentage">PCT</th>
<th scope="col" abbr="Wins">W</th>
<th scope="col" abbr="Losses">L</th>
<th scope="col" abbr="Win Percentage">PCT</th>
<th scope="col" abbr="Wins">W</th>
<th scope="col" abbr="Losses">L</th>
<th scope="col" abbr="Win Percentage">PCT</th>
<th scope="col" abbr="Wins">W</th>
<th scope="col" abbr="Losses">L</th>
<th scope="col" abbr="Win Percentage">PCT</th>
</tr>
<IFGREATER count($StandingsConferencesAll_rows) 0>
<VAR $rowClass = "standingsRow trRow">
<RESULTS list=StandingsConferencesAll_rows prefix=StandingsConferencesAll>
<tr class="{$rowClass}">
<th scope="row" abbr="{$StandingsConferencesAll_TeamName}">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$StandingsConferencesAll_TeamID}">
{$StandingsConferencesAll_TeamName}
</a>
</th>
<td align="right">{$StandingsConferencesAll_OverallWin}</td>
<td align="right">{$StandingsConferencesAll_OverallLoss}</td>
<td align="right"><VAR $pct = number_format(round($StandingsConferencesAll_OverallPct,3),3,".","")>{$pct}</td>
<td align="right">{$StandingsConferencesAll_ConfWin}</td>
<td align="right">{$StandingsConferencesAll_ConfLoss}</td>
<td align="right"><VAR $pct = number_format(round($StandingsConferencesAll_ConfPct,3),3,".","")>{$pct}</td>
<td align="right"><IFNOTEMPTY $StandingsConferencesAll_HomeWin>{$StandingsConferencesAll_HomeWin}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><IFNOTEMPTY $StandingsConferencesAll_HomeLoss>{$StandingsConferencesAll_HomeLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><VAR $pct = number_format(round($StandingsConferencesAll_HomePct,3),3,".","")>{$pct}</td>
<td align="right"><IFNOTEMPTY $StandingsConferencesAll_AwayWin>{$StandingsConferencesAll_AwayWin}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><IFNOTEMPTY $StandingsConferencesAll_AwayLoss>{$StandingsConferencesAll_AwayLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><VAR $pct = number_format(round($StandingsConferencesAll_AwayPct,3),3,".","")>{$pct}</td>
</tr>
<IFEQUAL $rowClass "standingsRow trRow">
<VAR $rowClass = "standingsRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "standingsRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</tbody>
</table>
</IFTRUE>
