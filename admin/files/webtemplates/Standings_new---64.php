<VAR $domainURL = "http://preps.denverpost.com">
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
<VAR $whereClause = " AND seasonteam".$sqlSportName.".SeasonTeamSeason = \"2007\" AND conf.SeasonTeamSeason = \"2007\" AND home.SeasonTeamSeason = \"2007\" AND away.SeasonTeamSeason = \"2007\"">
<VAR $showStandings=true>
<IFEMPTY $form_ConferenceID><VAR $showStandings=false></IFEMPTY>
<IFEMPTY $form_Sport><VAR $showStandings=false></IFEMPTY>
<IFTRUE $showStandings>
<QUERY name=Standings SPORTNAME=$sqlSportName CONFERENCE=$form_ConferenceID SELECTCLAUSE=$selectClause JOINCLAUSE=$joinClause SORT=$sortOrder WHERECLAUSE=$whereClause>

<table class="standingsTable" cellpadding="0" cellspacing="0"><tr><td colspan="50" class="pageTitle">Standings</td></tr>
<tr>
<td> </td>
<TD ALIGN=CENTER COLSPAN=3>Overall</td>
<TD ALIGN=CENTER COLSPAN=3>Conference</td>
<TD ALIGN=CENTER COLSPAN=3>Home</td>
<TD ALIGN=CENTER COLSPAN=3>Away</td>
</tr>
<tr>
<td> </td>
<td align="right">W</td>
<td align="right">L</td>
<td align="right">PCT</td>
<td align="right">W</td>
<td align="right">L</td>
<td align="right">PCT</td>
<td align="right">W</td>
<td align="right">L</td>
<td align="right">PCT</td>
<td align="right">W</td>
<td align="right">L</td>
<td align="right">PCT</td>
</tr>
<IFGREATER count($Standings_rows) 0>
<VAR $rowClass = "standingsRow trRow">
<RESULTS list=Standings_rows prefix=Standings>
<tr class="{$rowClass}">
<td>
<VAR $Standings_TeamName = fixApostrophes($Standings_TeamName)>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Standings_TeamID}">
{$Standings_TeamName}
</a>
</td>
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
</table>
</IFTRUE>