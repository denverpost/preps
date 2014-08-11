<VAR $myCounter=0>

<h1>{$Away_TeamName} at {$Home_TeamName}</h1>
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
<h2 class="list">{$dateTimeDisplay}</h2>
<h3 class="timestamp grey">Last updated: {$updateTimeDisplay}</h3>

<table class="boxscoreStatTable" width="100%">
<tr><td>
<font class="pageTitle">Boxscore</font>
<!-- <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span> -->
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></td></tr>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyPoints">Pts: Points</td>
<td id="keyOffensiveRebounds">OREB: Offensive rebounds</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyFieldGoalsMade">FGM: Field goals made</td>
<td id="keyOffensiveRebounds">DREB: Defensive rebounds</td>
</tr>
<tr class="statKeyRow">
<td id="keyFieldGoalsAttempted">FGA: Field goals attempted</td>
<td id="keyAssists">AST: Assists</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyThreePointersMade">3PM: Three pointers made</td>
<td id="keySteals">STL: Steals</td>
</tr>
<tr class="statKeyRow">
<td id="keyThreePointersAttempted">3PA: Three pointers attempted</td>
<td id="keyBlockedShots">BLK: Blocked shots</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyFreeThrowsMade">FTM: Free throws made</td>
<td id="keyTurnovers">TO: Turnovers</td>
</tr>
<tr class="statKeyRow">
<td id="keyFreeThrowsAttempted">FTA: Free throws attempted</td>
<td id="keyPersonalFouls">PF: Personal fouls</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyFieldGoalPercentage">FGPCT: Field goal percentage</td>
<td id="keyThreePointerPercentage">3PPCT: Three pointer percentage</td>
</tr>
<tr class="statKeyRow">
<td id="keyFreeThrowPercentage">FTPCT: Free throw percentage</td>
<td id="keyPointsPerGame">PPG: Points per game</td>
</tr>
</table>
</div>
</td></tr></table>

<table class="boxscoreStatTable">
<tr>
<td> </td>
<td align="right"><strong>1</strong></td>
<td align="right"><strong>2</strong></td>
<td align="right"><strong>3</strong></td>
<td align="right"><strong>4<strong></td>
<td align="right"><strong>OT<strong></td>
<td align="right"><strong>Total<strong></td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
<VAR $Away_TeamName = fixApostrophes($Away_TeamName)>
<strong>{$Away_TeamName}</strong></a></td>
<td align="right">{$Away_FirstQuarterPoints}</td>
<td align="right">{$Away_SecondQuarterPoints}</td>
<td align="right">{$Away_ThirdQuarterPoints}</td>
<td align="right">{$Away_FourthQuarterPoints}</td>
<td align="right">{$Away_OvertimePoints}</td>
<td align="right">{$Away_TotalPoints}</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Home_TeamID}">
<VAR $Home_TeamName = fixApostrophes($Home_TeamName)>
<strong>{$Home_TeamName}<strong></a></td>
<td align="right">{$Home_FirstQuarterPoints}</td>
<td align="right">{$Home_SecondQuarterPoints}</td>
<td align="right">{$Home_ThirdQuarterPoints}</td>
<td align="right">{$Home_FourthQuarterPoints}</td>
<td align="right">{$Home_OvertimePoints}</td>
<td align="right">{$Home_TotalPoints}</td>
</tr>
</table>
<br />




<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $Game_AwayTeamName = fixApostrophes($Game_AwayTeamName)>
<VAR $Game_HomeTeamName = fixApostrophes($Game_HomeTeamName)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td class="pageTitle">Player stats - {$teamNames[$teamKey]}</td></tr></table>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td width="110"><strong>Name</strong></td>
<!-- <td>Min</td> -->
<td onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')"><strong><strong>Points</strong></td>
<td onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')"><strong>FG Md</strong></td>
<!-- <td onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = "unHighlightKey('keyFieldGoalsAttempted')">FGA</td> -->
<!-- <td onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = "unHighlightKey('keyFieldGoalPercentage')">FGPCT</td> -->
<td onmouseover="highlightKey('keyThreePointersMade')" onmouseout = "unHighlightKey('keyThreePointersMade')"><strong>3Pt Md</strong></td>
<!-- <td onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = "unHighlightKey('keyThreePointersAttempted')">3PA</td> -->
<!-- <td onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = "unHighlightKey('keyThreePointerPercentage')">3PPCT</td> -->
<td onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')"><strong>FT Md</strong></td>
<td onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')"><strong>FT Att</strong></td>
<td onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')"><strong>FT%</strong></td>
<!-- <td onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = "unHighlightKey('keyOffensiveRebounds')">OREB</td> -->
<!-- <td onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = "unHighlightKey('keyDefensiveRebounds')">DREB</td> -->
<!-- <td onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">AST</td> -->
<!-- <td onmouseover="highlightKey('keySteals')" onmouseout = "unHighlightKey('keySteals')">STL</td> -->
<!-- <td onmouseout = "unHighlightKey('keyBlockedShots')">BLK</td> -->
<!-- <td onmouseout = "unHighlightKey('keyTurnovers')">TO</td> -->
<!-- <td onmouseover="highlightKey('keyPersonalFouls')" onmouseout = "unHighlightKey('keyPersonalFouls')">PF</td> -->
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Player>
###<IFGREATER $Player_Minutes 0>###
<tr class="{$rowClass}">
<td width="110">
<a href="{$externalURL}site=default&tpl=Player&ID={$Player_PlayerID}">
<VAR $Player_PlayerFirstName = fixApostrophes($Player_PlayerFirstName)>
<VAR $Player_PlayerLastName = fixApostrophes($Player_PlayerLastName)>
{$Player_PlayerFirstName} {$Player_PlayerLastName}
</A>
</td>
<!-- <td align="right">{$Player_Minutes}</td> -->
<td align="right">{$Player_Points}</td>
<td align="right">{$Player_FieldGoalsMade}</td>
<!-- <td align="right">{$Player_FieldGoalsAttempted}</td> -->
<VAR $fgpct = round($Player_FieldGoalPercentage,1)>
<!-- <td align="right">{$fgpct}</td> -->
<td align="right">{$Player_ThreePointersMade}</td>
<!-- <td align="right">{$Player_ThreePointersAttempted}</td> -->
<VAR $tppct = round($Player_ThreePointerPercentage,1)>
<!-- <td align="right">{$tppct}</td> -->
<td align="right">{$Player_FreeThrowsMade}</td>
<td align="right">{$Player_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Player_FreeThrowPercentage,1)>
<? $ftpct = sprintf("%.1f", $ftpct) ?>
<td align="right">{$ftpct}</td>
<!-- <td align="right">{$Player_OffensiveRebounds}</td> -->
<!-- <td align="right">{$Player_DefensiveRebounds}</td> -->
<!-- <td align="right">{$Player_Assists}</td> -->
<!-- <td align="right">{$Player_Steals}</td> -->
<!-- <td align="right">{$Player_BlockedShots}</td> -->
<!-- <td align="right">{$Player_Turnovers}</td> -->
<!-- <td align="right">{$Player_PersonalFouls}</td> -->
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
###</IFGREATER>###
</RESULTS>
###</table>###
</IFGREATER>
###</table>###
</td>
<td align="left"colspan=7><hr></td>
</tr>
<td align="left"><strong>Totals</strong></td>
<IFGREATER $myCounter 0>
<td align="right">{$Home_TotalPoints}</td>
<td align="right">{$Home_FieldGoalsMade}</td>
<td align="right">{$Home_ThreePointersMade}</td>
<td align="right">{$Home_FreeThrowsMade}</td>
<td align="right">{$Home_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Home_FreeThrowPercentage,1)>
<? $ftpct = sprintf("%.1f", $ftpct) ?>
<td align="right">{$ftpct}</td>
<ELSE>
<td align="right">{$Away_TotalPoints}</td>
<td align="right">{$Away_FieldGoalsMade}</td>
<td align="right">{$Away_ThreePointersMade}</td>
<td align="right">{$Away_FreeThrowsMade}</td>
<td align="right">{$Away_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Away_FreeThrowPercentage,1)>
<VAR $tppct = round($Player_ThreePointerPercentage,1)>
<!-- <td align="right">{$tppct}</td> -->
<? $ftpct = sprintf("%.1f", $ftpct) ?>
<td align="right">{$ftpct}</td>

</IFGREATER>
<VAR $myCounter = $myCounter+1>
</tr>
</table>
<?PHP } ?>