<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
</IFNOTEMPTY>

<IFEQUAL $sportName "Baseball">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
<ELSE>
<VAR $winPct = "WinPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Football">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Girls Lacrosse">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Boys Lacrosse">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<VAR $winPct = "WinningPercentage">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Girls Basketball">
<VAR $standingSeason = "2014">
</IFEQUAL>
<IFEQUAL $sportName "Ice Hockey">
<VAR $standingSeason = "2014">
</IFEQUAL>

### If $standingSeason is empty, then we don't have a sport we can compute standings on. ###
<IFNOTEMPTY $standingSeason>

###<VAR $sortOrder = "seasonteam".$sqlSportName.".".$winPct." DESC, OverallWin DESC, OverallLoss ASC">###
<VAR $sortOrder = "ConfPct DESC, ConfWin DESC, ConfLoss ASC, OverAllWin DESC, OverallLoss ASC">


<VAR $selectClause = "TeamName,q_team.TeamID,seasonteam".$sqlSportName.".Win as OverallWin,seasonteam".$sqlSportName.".Loss as
OverallLoss,seasonteam".$sqlSportName.".Tie as OverallTie,seasonteam".$sqlSportName.".".$winPct." as OverallPct,
conf.Win as ConfWin,conf.Loss as ConfLoss,conf.Tie as ConfTie,conf.".$winPct." as ConfPct,home.Win as HomeWin,home.Loss as HomeLoss,home.".$winPct." as
HomePct, home.Tie as HomeTie,away.Win as AwayWin,away.Loss as AwayLoss,away.".$winPct." As AwayPct,away.Tie as AwayTie">


<VAR $joinClause = "LEFT JOIN seasonteam".$sqlSportName." AS conf ON conf.SeasonTeamTeamID = q_team.TeamID AND conf.SeasonTeamCategory = \"conf\" LEFT JOIN seasonteam".$sqlSportName." AS home ON home.SeasonTeamTeamID = q_team.TeamID AND home.SeasonTeamCategory = \"home\"
LEFT JOIN seasonteam".$sqlSportName." AS away ON away.SeasonTeamTeamID = q_team.TeamID AND away.SeasonTeamCategory = \"away\"">

<VAR $whereClause = " AND seasonteam".$sqlSportName.".SeasonTeamSeason = \"".$standingSeason."\" AND conf.SeasonTeamSeason = \"".$standingSeason."\" AND home.SeasonTeamSeason = \"".$standingSeason."\" AND away.SeasonTeamSeason = \"".$standingSeason."\"">




<VAR $showStandings=true>
<IFEMPTY $form_ConferenceID><VAR $showStandings=false></IFEMPTY>
<IFEMPTY $form_Sport><VAR $showStandings=false></IFEMPTY>
<IFTRUE $showStandings>
<QUERY name=Standings SPORTNAME=$sqlSportName CONFERENCE=$form_ConferenceID SELECTCLAUSE=$selectClause JOINCLAUSE=$joinClause SORT=$sortOrder WHERECLAUSE=$whereClause>
###query: {$Standings_query}###
<h3>Regular Season</h3>
<table class="standingsTable deluxe" cellpadding="0" cellspacing="0">
<tbody><tr id="header-sub">

<IFTRUE $sqlSportName == "girlssoccer" || $sqlSportName == "boyssoccer" || $sqlSportName == "softball" || $sqlSportName == "fieldhockey" || $sqlSportName == "icehockey">

<th scope="col" abbr="">Standings</th>
<th scope="col" abbr="" colspan="4" align="center">Overall</th>
<th scope="col" abbr="" colspan="4" align="center">Conference</th>
<th scope="col" abbr="" colspan="4" align="center">Home</th>
<th scope="col" abbr="" colspan="4" align="center">Away</th>
</tr>
<tr id="header-sub">
<th scope="col" abbr="">Team</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Ties" align="center">T</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Ties" align="center">T</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Ties" align="center">T</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Ties" align="center">T</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
</tr>
<ELSE>
<th scope="col" abbr="">Standings</th>
<th scope="col" abbr="" colspan="3" align="center">Overall</th>
<th scope="col" abbr="" colspan="3" align="center">Conference</th>
<th scope="col" abbr="" colspan="3" align="center">Home</th>
<th scope="col" abbr="" colspan="3" align="center">Away</th>
</tr>
<tr id="header-sub">
<th scope="col" abbr="">Team</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
<th scope="col" abbr="Wins" align="center">W</th>
<th scope="col" abbr="Losses" align="center">L</th>
<th scope="col" abbr="Win Percentage" align="center">PCT</th>
</tr>
</IFTRUE>
<IFGREATER count($Standings_rows) 0>
<VAR $rowClass = "standingsRow trRow">
<RESULTS list=Standings_rows prefix=Standings>
<tr class="{$rowClass}">
<td scope="row" align="left" abbr="{$Standings_TeamName}">
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Standings_TeamID}">
{$Standings_TeamName}
</a>
</td>

<IFTRUE $sqlSportName == "girlssoccer" || $sqlSportName == "boyssoccer" || $sqlSportName == "softball" || $sqlSportName == "fieldhockey" || $sqlSportName == "icehockey">

<td align="center">{$Standings_OverallWin}</td>
<td align="center">{$Standings_OverallLoss}</td>
<td align="center">{$Standings_OverallTie}</td>

<?php
if( 1.0 == $Standings_OverallPct) {
  $pct = "1.000";
} else {
  $pct = (sprintf( "%05.3f", $Standings_OverallPct));
}
?>
<td align="center">###<VAR $pct = str_replace("0.", ".", number_format(round($Standings_OverallPct,3),3,".",""))>###{$pct}</td>
<td align="center">{$Standings_ConfWin}</td>
<td align="center">{$Standings_ConfLoss}</td>
<td align="center">{$Standings_ConfTie}</td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_ConfPct,3),3,".",""))>{$pct}</td>
<td align="center"><IFNOTEMPTY $Standings_HomeWin>{$Standings_HomeWin}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_HomeLoss>{$Standings_HomeLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_HomeTie>{$Standings_HomeTie}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_HomePct,3),3,".",""))>{$pct}</td>
<td align="center"><IFNOTEMPTY $Standings_AwayWin>{$Standings_AwayWin}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_AwayLoss>{$Standings_AwayLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_AwayTie>{$Standings_AwayTie}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_AwayPct,3),3,".",""))>{$pct}</td>

<ELSE>
<td align="center">{$Standings_OverallWin}</td>
<td align="center">{$Standings_OverallLoss}</td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_OverallPct,3),3,".",""))>{$pct}</td>
<td align="center">{$Standings_ConfWin}</td>
<td align="center">{$Standings_ConfLoss}</td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_ConfPct,3),3,".",""))>{$pct}</td>
<td align="center"><IFNOTEMPTY $Standings_HomeWin>{$Standings_HomeWin}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_HomeLoss>{$Standings_HomeLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_HomePct,3),3,".",""))>{$pct}</td>
<td align="center"><IFNOTEMPTY $Standings_AwayWin>{$Standings_AwayWin}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><IFNOTEMPTY $Standings_AwayLoss>{$Standings_AwayLoss}<ELSE>0</IFNOTEMPTY></td>
<td align="center"><VAR $pct = str_replace("0.", ".", number_format(round($Standings_AwayPct,3),3,".",""))>{$pct}</td>
</IFTRUE>

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

</IFNOTEMPTY>
