<table class="boxscoreStatTable" width="100%">
<tr><td>
<font class="pageTitle">Boxscore</font>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
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
<tr><td colspan="50">
<VAR $dateTimeDisplay = date("l F j, Y",strtotime($Game_GameDate))." ".date("g:ia",strtotime($Game_GameTime))>
{$dateTimeDisplay}<br />
</td></tr>
<tr>
<td> </td>
<td align="right">1</td>
<td align="right">2</td>
<td align="right">3</td>
<td align="right">4</td>
<td align="right">OT</td>
<td align="right">Total</td>
</tr>
<tr>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Away_TeamID}">
{$Away_TeamName}</a></td>
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
{$Home_TeamName}</a></td>
<td align="right">{$Home_FirstQuarterPoints}</td>
<td align="right">{$Home_SecondQuarterPoints}</td>
<td align="right">{$Home_ThirdQuarterPoints}</td>
<td align="right">{$Home_FourthQuarterPoints}</td>
<td align="right">{$Home_OvertimePoints}</td>
<td align="right">{$Home_TotalPoints}</td>
</tr>
</table>
<br />

<table class="boxScoreStatTable">
<tr><td colspan="50"><font class="pageTitle">Team Stats - {$Game_AwayTeamName}</font></td></tr>
<tr class="boxscoreRow trRow">
<td onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Pts</td>
<td onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')">FGM</td>
<td onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = "unHighlightKey('keyFieldGoalsAttempted')">FGA</td>
<td onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = "unHighlightKey('keyFieldGoalPercentage')">FGPCT</td>
<td onmouseover="highlightKey('keyThreePointersMade')" onmouseout = "unHighlightKey('keyThreePointersMade')">3PM</td>
<td onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = "unHighlightKey('keyThreePointersAttempted')">3PA</td>
<td onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = "unHighlightKey('keyThreePointerPercentage')">3PPCT</td>
<td onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')">FTM</td>
<td onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')">FTA</td>
<td onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')">FTPCT</td>
<td onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = "unHighlightKey('keyOffensiveRebounds')">OREB</td>
<td onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = "unHighlightKey('keyDefensiveRebounds')">DREB</td>
<td onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">AST</td>
<td onmouseover="highlightKey('keySteals')" onmouseout = "unHighlightKey('keySteals')">STL</td>
<td onmouseout = "unHighlightKey('keyBlockedShots')">BLK</td>
<td onmouseout = "unHighlightKey('keyTurnovers')">TO</td>
<td onmouseover="highlightKey('keyPersonalFouls')" onmouseout = "unHighlightKey('keyPersonalFouls')">PF</td>
</tr>
<tr class="boxscoreRow trRow">
<td align="right">{$Away_Points}</td>
<td align="right">{$Away_FieldGoalsMade}</td>
<td align="right">{$Away_FieldGoalsAttempted}</td>
<VAR $fgpct = round($Away_FieldGoalPercentage,2)>
<td align="right">{$fgpct}</td>
<td align="right">{$Away_ThreePointersMade}</td>
<td align="right">{$Away_ThreePointersAttempted}</td>
<VAR $tppct = round($Away_ThreePointerPercentage,2)>
<td align="right">{$tppct}</td>
<td align="right">{$Away_FreeThrowsMade}</td>
<td align="right">{$Away_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Away_FreeThrowPercentage,2)>
<td align="right">{$ftpct}</td>
<td align="right">{$Away_OffensiveRebounds}</td>
<td align="right">{$Away_DefensiveRebounds}</td>
<td align="right">{$Away_Assists}</td>
<td align="right">{$Away_Steals}</td>
<td align="right">{$Away_BlockedShots}</td>
<td align="right">{$Away_Turnovers}</td>
<td align="right">{$Away_PersonalFouls}</td>
</td>
</tr>
</table>


<table class="boxScoreStatTable">
<tr><td colspan="50" class="pageTitle">Team Stats - {$Game_HomeTeamName}</td></tr>
<tr class="boxscoreRow trRow">
<td onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Pts</td>
<td onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')">FGM</td>
<td onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = "unHighlightKey('keyFieldGoalsAttempted')">FGA</td>
<td onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = "unHighlightKey('keyFieldGoalPercentage')">FGPCT</td>
<td onmouseover="highlightKey('keyThreePointersMade')" onmouseout = "unHighlightKey('keyThreePointersMade')">3PM</td>
<td onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = "unHighlightKey('keyThreePointersAttempted')">3PA</td>
<td onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = "unHighlightKey('keyThreePointerPercentage')">3PPCT</td>
<td onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')">FTM</td>
<td onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')">FTA</td>
<td onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')">FTPCT</td>
<td onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = "unHighlightKey('keyOffensiveRebounds')">OREB</td>
<td onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = "unHighlightKey('keyDefensiveRebounds')">DREB</td>
<td onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">AST</td>
<td onmouseover="highlightKey('keySteals')" onmouseout = "unHighlightKey('keySteals')">STL</td>
<td onmouseout = "unHighlightKey('keyBlockedShots')">BLK</td>
<td onmouseout = "unHighlightKey('keyTurnovers')">TO</td>
<td onmouseover="highlightKey('keyPersonalFouls')" onmouseout = "unHighlightKey('keyPersonalFouls')">PF</td>
</tr>
<tr class="boxscoreRow trRow">
<td align="right">{$Home_Points}</td>
<td align="right">{$Home_FieldGoalsMade}</td>
<td align="right">{$Home_FieldGoalsAttempted}</td>
<VAR $fgpct = round($Home_FieldGoalPercentage,2)>
<td align="right">{$fgpct}</td>
<td align="right">{$Home_ThreePointersMade}</td>
<td align="right">{$Home_ThreePointersAttempted}</td>
<VAR $tppct = round($Home_ThreePointerPercentage,2)>
<td align="right">{$tppct}</td>
<td align="right">{$Home_FreeThrowsMade}</td>
<td align="right">{$Home_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Home_FreeThrowPercentage,2)>
<td align="right">{$ftpct}</td>
<td align="right">{$Home_OffensiveRebounds}</td>
<td align="right">{$Home_DefensiveRebounds}</td>
<td align="right">{$Home_Assists}</td>
<td align="right">{$Home_Steals}</td>
<td align="right">{$Home_BlockedShots}</td>
<td align="right">{$Home_Turnovers}</td>
<td align="right">{$Home_PersonalFouls}</td>
</td>
</tr>
</table>

<VAR $teamIDs = array($awayTeamID,$homeTeamID)>
<VAR $teamNames = array($Game_AwayTeamName,$Game_HomeTeamName)>

<?PHP foreach($teamIDs as $teamKey => $teamID) { ?>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td class="pageTitle">Player stats - {$teamNames[$teamKey]}</td></tr></table>
<QUERY name=GamePlayerStats GAMEID=$form_ID TEAMID=$teamID SPORTNAME=$sqlSportName>
<IFGREATER count(GamePlayerStats_rows) 0>
<table class="boxscoreStatTable" cellpadding="0" cellspacing="0">
<tr>
<td width="110">Name</td>
<td>Min</td>
<td onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Pts</td>
<td onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')">FGM</td>
<td onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = "unHighlightKey('keyFieldGoalsAttempted')">FGA</td>
<td onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = "unHighlightKey('keyFieldGoalPercentage')">FGPCT</td>
<td onmouseover="highlightKey('keyThreePointersMade')" onmouseout = "unHighlightKey('keyThreePointersMade')">3PM</td>
<td onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = "unHighlightKey('keyThreePointersAttempted')">3PA</td>
<td onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = "unHighlightKey('keyThreePointerPercentage')">3PPCT</td>
<td onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')">FTM</td>
<td onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')">FTA</td>
<td onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')">FTPCT</td>
<td onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = "unHighlightKey('keyOffensiveRebounds')">OREB</td>
<td onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = "unHighlightKey('keyDefensiveRebounds')">DREB</td>
<td onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">AST</td>
<td onmouseover="highlightKey('keySteals')" onmouseout = "unHighlightKey('keySteals')">STL</td>
<td onmouseout = "unHighlightKey('keyBlockedShots')">BLK</td>
<td onmouseout = "unHighlightKey('keyTurnovers')">TO</td>
<td onmouseover="highlightKey('keyPersonalFouls')" onmouseout = "unHighlightKey('keyPersonalFouls')">PF</td>
</tr>
<VAR $rowClass = "boxscoreRow trRow">
<RESULTS list=GamePlayerStats_rows prefix=Player>
<IFGREATER $Player_Minutes 0>
<tr class="{$rowClass}">
<td width="110">
<a href="{$externalURL}site=default&tpl=Player&ID={$Player_PlayerID}">
{$Player_PlayerFirstName} {$Player_PlayerLastName}
</A>
</td>
<td align="right">{$Player_Minutes}</td>
<td align="right">{$Player_Points}</td>
<td align="right">{$Player_FieldGoalsMade}</td>
<td align="right">{$Player_FieldGoalsAttempted}</td>
<VAR $fgpct = round($Player_FieldGoalPercentage,2)>
<td align="right">{$fgpct}</td>
<td align="right">{$Player_ThreePointersMade}</td>
<td align="right">{$Player_ThreePointersAttempted}</td>
<VAR $tppct = round($Player_ThreePointerPercentage,2)>
<td align="right">{$tppct}</td>
<td align="right">{$Player_FreeThrowsMade}</td>
<td align="right">{$Player_FreeThrowsAttempted}</td>
<VAR $ftpct = round($Player_FreeThrowPercentage,2)>
<td align="right">{$ftpct}</td>
<td align="right">{$Player_OffensiveRebounds}</td>
<td align="right">{$Player_DefensiveRebounds}</td>
<td align="right">{$Player_Assists}</td>
<td align="right">{$Player_Steals}</td>
<td align="right">{$Player_BlockedShots}</td>
<td align="right">{$Player_Turnovers}</td>
<td align="right">{$Player_PersonalFouls}</td>
</td>
</tr>
<IFEQUAL $rowClass "boxscoreRow trRow">
<VAR $rowClass = "boxscoreRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "boxscoreRow trRow">
</IFEQUAL>
</IFGREATER>
</RESULTS>
</table>
</IFGREATER>
<?PHP } ?>