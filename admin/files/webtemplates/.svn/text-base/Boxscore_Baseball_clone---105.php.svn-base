###<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeConfWins = $TeamSeasonStats_Win>
<VAR $homeConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "TeamSeasonStats">
<VAR $statType = "conf">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayConfWins = $TeamSeasonStats_Win>
<VAR $awayConfLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Home_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $homeOverallWins = $TeamSeasonStats_Win>
<VAR $homeOverallLosses = $TeamSeasonStats_Loss>

<VAR $TeamSeasonStats_query = "">
<VAR $statType = "overall">
<QUERY name=TeamSeasonStats ID=$Away_TeamID SPORTNAME=$sqlSportName CATEGORY=$statType>
<VAR $awayOverallWins = $TeamSeasonStats_Win>
<VAR $awayOverallLosses = $TeamSeasonStats_Loss>###

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3">
<IFGREATER $Home_TotalPoints $Away_TotalPoints>
<strong>{$Home_TeamName} {$Home_TotalPoints}, {$Away_TeamName} {$Away_TotalPoints}</strong>
<ELSE>
<strong>{$Away_TeamName} {$Away_TotalPoints}, {$Home_TeamName} {$Home_TotalPoints}</strong>
</IFGREATER>
 - <IFEQUAL $Game_GameScoreIsFinal 1>
Final
<ELSE>
In progress
</IFEQUAL>
<br /><br />
</td></tr>
<tr><td>{$Away_TeamName}</td>
<td><strong>Overall:</strong> {$awayOverallWins}-{$awayOverallLosses} </td>
<td><strong>Conference:</strong> {$awayConfWins}-{$awayConfLosses}</td></tr>
<tr><td>{$Home_TeamName}</td>
<td><strong>Overall:</strong> {$homeOverallWins}-{$homeOverallLosses} </td>
<td><strong>Conference:</strong> {$homeConfWins}-{$homeConfLosses}</td></tr>
</table>

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="50">
<font class="pageTitle">Boxscore</font><br />
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
{$dateTimeDisplay}<br /><br />
</td></tr>
<tr>
<td> </td>

<td align="right"><strong>1</strong></td>
<td align="right"><strong>2</strong></td>
<td align="right"><strong>3</strong></td>
<td align="right"><strong>4</strong></td>
<td align="right"><strong>5</strong></td>
<td align="right"><strong>Final</strong></td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<strong>{$Away_TeamName}</strong></a></td>
<td align="right">{$Away_Game1Points}</td>
<td align="right">{$Away_Game2Points}</td>
<td align="right">{$Away_Game3Points}</td>
<td align="right">{$Away_Game4Points}</td>
<td align="right">{$Away_Game5Points}</td>
<td align="right">{$Away_FinalScore}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<strong>{$Home_TeamName}</strong></a></td>
<td align="right">{$Home_Game1Points}</td>
<td align="right">{$Home_Game2Points}</td>
<td align="right">{$Home_Game3Points}</td>
<td align="right">{$Home_Game4Points}</td>
<td align="right">{$Home_Game5Points}</td>
<td align="right">{$Home_FinalScore}</td>
</table>

<br /><br />

###

<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr><td colspan="3" class="pageTitle">Team Stats</td></tr>
<tr>
<td> </td>
<td align="right"><strong>{$Away_TeamName}</strong></td>
<td align="right"><strong>{$Home_TeamName}</strong></td>
</tr>
<tr class="boxscoreRow trRow"><td>Total yards</td>
<td align="right">{$Away_TotalYards}</td><td align="right">{$Home_TotalYards}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>First downs</td>
<td align="right">{$Away_FirstDowns}</td><td align="right">{$Home_FirstDowns}</td></tr>
<tr class="boxscoreRow trRow"><td>Rushes/Yds</td>
<td align="right">{$Away_RushingAttempts}/{$Away_RushingYards}</td><td align="right">{$Home_RushingAttempts}/{$Home_RushingYards}</td></tr>
<VAR $yardsAtt = round($Away_RushingYardsPerAttempt,2)>
<tr class="boxscoreRowAlternate trAlt"><td>Average rush</td>
<td align="right">{$yardsAtt}</td>
<VAR $yardsAtt = round($Home_RushingYardsPerAttempt,2)>
<td align="right">{$yardsAtt}</td></tr>
<tr class="boxscoreRow trRow"><td>Comp/Atts</td>
<td align="right">{$Away_PassCompletions}/{$Away_PassAttempts}</td><td align="right">{$Home_PassCompletions}/{$Home_PassAttempts}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Pass yards</td>
<td align="right">{$Away_PassingYards}</td><td align="right">{$Home_PassingYards}</td></tr>
<tr class="boxscoreRow trRow">
<td>Comp pct</td>
<VAR $compPct = round($Away_PassCompletionPercentage,2)>
<td align="right">{$compPct}</td>
<VAR $compPct = round($Home_PassCompletionPercentage,2)>
<td align="right">{$compPct}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Punts</td>
<td align="right">{$Away_Punts}</td><td align="right">{$Home_Punts}</td></tr>
<tr class="boxscoreRow trRow"><td>Punting Yards</td>
<td align="right">{$Away_PuntingYards}</td><td align="right">{$Home_PuntingYards}</td></tr>
<tr class="boxscoreRowAlternate trAlt"><td>Punting Average</td>
<VAR $puntAvg = round($Away_PuntingAverage,2)>
<td align="right">{$puntAvg}</td>
<VAR $puntAvg = round($Home_PuntingAverage,2)>
<td align="right">{$puntAvg}</td></tr>
<tr class="boxscoreRow trRow"><td>Fumbles/Lost</td>
<td align="right">{$Away_Fumbles}/{$Away_FumblesLost}</td><td align="right">{$Home_Fumbles}/{$Home_FumblesLost}</td></tr>
</table>

###
<br /><br />
<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING=0>
<tr><TD CLASS="pageTitle">{$teamNames[$teamKey]}
</td></tr></table>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable" WIDTH=425 CELLPADDING=0 CELLSPACING = 0>
<tr>
<td align="right"><strong>Name</strong></td>
<td align="right"><strong>GP</strong></td>
<td align="right"><strong>K</strong></td>
<td align="right"><strong>E</strong></td>
<td align="right"><strong>TotAtt</strong></td>
<td align="right"><strong>H%</strong></td>
<td align="right"><strong>Asst</strong></td>
<td align="right"><strong>SA</strong></td>
<td align="right"><strong>SvcErr</strong></td>
<td align="right"><strong>RecErr</strong></td>
<td align="right"><strong>Digs</strong></td>
<td align="right"><strong>BlkSolos</strong></td>
<td align="right"><strong>BlkAsst</strong></td>
<td align="right"><strong>BlkErr</strong></td>
<td align="right"><strong>BHE</strong></td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=PlayerStats>
<IFGREATER $PlayerStats_TotalAttempts 0>
<VAR $hitPercentage = ($PlayerStats_TotalKills-$PlayerStats_TotalErrors)/$PlayerStats_TotalAttempts>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>


<tr class="{$rowClass}">
<td width="120">
<a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}"><VAR $playerName = fixApostrophes($PlayerStats_PlayerLastName.", ".$PlayerStats_PlayerFirstName)>{$playerName}</a>
</td>
<td align="right">{$PlayerStats_TeamGames}</td>
<td align="right">{$PlayerStats_TotalKills}</td>
<td align="right">{$PlayerStats_TotalErrors}</td>
<td align="right">{$PlayerStats_TotalAttempts}</td>
<td align="right">{$hitPercentage}</td>
<td align="right">{$PlayerStats_Assists}</td>
<td align="right">{$PlayerStats_ServiceAces}</td>
<td align="right">{$PlayerStats_ServiceErrors}</td>
<td align="right">{$PlayerStats_ReceivingErrors}</td>
<td align="right">{$PlayerStats_Digs}</td>
<td align="right">{$PlayerStats_BlockSolos}</td>
<td align="right">{$PlayerStats_BlockAssists}</td>
<td align="right">{$PlayerStats_BlockErrors}</td>
<td align="right">{$PlayerStats_BallHandlingErrors}</td>
</tr>

<tr class="{$rowClass}">
<td width="120">

</td>
<td align="right">Totals</td>
<IFEQUAL $teamID $Away_TeamID>
<IFGREATER $Away_TotalAttempts 0>
<VAR $hitPercentage = ($Away_TotalKills-$Away_TotalErrors)/$Away_TotalAttempts>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
<td align="right">{$TeamStats_TeamGames}</td>
<td align="right">{$Away_TotalKills}</td>
<td align="right">{$Away_TotalErrors}</td>
<td align="right">{$Away_TotalAttempts}</td>
<td align="right">{$hitPercentage}</td>
<td align="right">{$Away_Assists}</td>
<td align="right">{$Away_ServiceAces}</td>
<td align="right">{$Away_ServiceErrors}</td>
<td align="right">{$Away_ReceivingErrors}</td>
<td align="right">{$Away_Digs}</td>
<td align="right">{$Away_BlockSolos}</td>
<td align="right">{$Away_BlockAssists}</td>
<td align="right">{$Away_BlockErrors}</td>
<td align="right">{$Away_BallHandlingErrors}</td>

<ELSE>
<IFGREATER $Home_TotalAttempts 0>
<VAR $hitPercentage = ($Home_TotalKills-$Home_TotalErrors)/$Home_TotalAttempts>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
<td align="right">{$TeamStats_TeamGames}</td>
<td align="right">{$Home_TotalKills}</td>
<td align="right">{$Home_TotalErrors}</td>
<td align="right">{$Home_TotalAttempts}</td>
<td align="right">{$hitPercentage}</td>
<td align="right">{$Home_Assists}</td>
<td align="right">{$Home_ServiceAces}</td>
<td align="right">{$Home_ServiceErrors}</td>
<td align="right">{$Home_ReceivingErrors}</td>
<td align="right">{$Home_Digs}</td>
<td align="right">{$Home_BlockSolos}</td>
<td align="right">{$Home_BlockAssists}</td>
<td align="right">{$Home_BlockErrors}</td>
<td align="right">{$Home_BallHandlingErrors}</td>
</IFEQUAL>
</tr>





<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</RESULTS>
</table>



<?PHP } ?>
</IFGREATER>