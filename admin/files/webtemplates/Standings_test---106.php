<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
</IFNOTEMPTY>

<IFEQUAL $sportName "Baseball">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2009">
<ELSE>
<VAR $winPct = "WinPercentage">
<VAR $standingSeason = "2008">
</IFEQUAL>
<IFEQUAL $sportName "Football">
<VAR $standingSeason = "2008">
</IFEQUAL>
<IFEQUAL $sportName "Girls Lacrosse">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2009">
</IFEQUAL>
<IFEQUAL $sportName "Boys Lacrosse">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2009">
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2009">
</IFEQUAL>


###<VAR $sortOrder = "seasonteam".$sqlSportName.".".$winPct." DESC, OverallWin DESC, ###
###OverallLoss ASC">###

<VAR $sortOrder = "ConfPct DESC, ConfWin DESC, ConfLoss ASC, OverAllWin DESC, OverallLoss ASC">###


<VAR $selectClause = "TeamName,q_team.TeamID,seasonteam".$sqlSportName.".Win as OverallWin,seasonteam".$sqlSportName.".Loss as OverallLoss,seasonteam".$sqlSportName.".".$winPct." as OverallPct,
conf.Win as ConfWin,conf.Loss as ConfLoss,conf.".$winPct." as ConfPct,home.Win as HomeWin,home.Loss as HomeLoss,home.".$winPct." as HomePct,away.Win as AwayWin,away.Loss as AwayLoss,away.".$winPct." As AwayPct">

<VAR $joinClause = "LEFT JOIN seasonteam".$sqlSportName." AS conf ON conf.SeasonTeamTeamID = q_team.TeamID AND conf.SeasonTeamCategory = \"conf\"
LEFT JOIN seasonteam".$sqlSportName." AS home ON home.SeasonTeamTeamID = q_team.TeamID AND home.SeasonTeamCategory = \"home\"
LEFT JOIN seasonteam".$sqlSportName." AS away ON away.SeasonTeamTeamID = q_team.TeamID AND away.SeasonTeamCategory = \"away\"">

<VAR $whereClause = " AND seasonteam".$sqlSportName.".SeasonTeamSeason = \"".$standingSeason."\" AND conf.SeasonTeamSeason = \"".$standingSeason."\" AND home.SeasonTeamSeason = \"".$standingSeason."\" AND away.SeasonTeamSeason = \"".$standingSeason."\"">




<VAR $showStandings=true>
<IFEMPTY $form_ConferenceID><VAR $showStandings=false></IFEMPTY>
<IFEMPTY $form_Sport><VAR $showStandings=false></IFEMPTY>
<IFTRUE $showStandings>
<QUERY name=Standings SPORTNAME=$sqlSportName CONFERENCE=$form_ConferenceID SELECTCLAUSE=$selectClause JOINCLAUSE=$joinClause SORT=$sortOrder WHERECLAUSE=$whereClause>

<h3>Standings</h3>
<table class="standingsTable deluxe" cellpadding="0" cellspacing="0">
<tbody><tr id="header-main">
<th scope="col" abbr="" rowspan="2">Team</th>
<th scope="col" abbr="" colspan="3">Overall</th>
<th scope="col" abbr="" colspan="3">Conference</th>
<th scope="col" abbr="" colspan="3">Home</th>
<th scope="col" abbr="" colspan="3">Away</th>
</tr>
<tr id="header-sub">
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
<IFGREATER count($Standings_rows) 0>
<VAR $rowClass = "standingsRow trRow">
<RESULTS list=Standings_rows prefix=Standings>
<tr class="{$rowClass}">
<th scope="row" abbr="{$Standings_TeamName}">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Standings_TeamID}">
{$Standings_TeamName}
</a>
</th>
<td align="right">{$Standings_OverallWin}</td>
<td align="right">{$Standings_OverallLoss}</td>
<td align="right"><VAR $pct = number_format(round($Standings_OverallPct,3),3,".","")>{$pct}</td>
<td align="right">{$Standings_ConfWin}</td>
<td align="right">{$Standings_ConfLoss}</td>
<td align="right"><VAR $pct = number_format(round($Standings_ConfPct,3),3,".","")>{$pct}</td>
<td align="right"><IFNOTEMPTY $Standings_HomeWin>{$Standings_HomeWin}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><IFNOTEMPTY $Standings_HomeLoss>{$Standings_HomeLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><VAR $pct = number_format(round($Standings_HomePct,3),3,".","")>{$pct}</td>
<td align="right"><IFNOTEMPTY $Standings_AwayWin>{$Standings_AwayWin}<ELSE>0</IFNOTEMPTY></td>
<td align="right"><IFNOTEMPTY $Standings_AwayLoss>{$Standings_AwayLoss}<ELSE>0</IFNOTEMPTY></td>

<td align="right"><VAR $pct = number_format(round($Standings_AwayPct,3),3,".","")>{$pct}</td>
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
