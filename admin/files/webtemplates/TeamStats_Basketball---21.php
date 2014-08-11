<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr><td colspan=100><font class="pageTitle">Team Stats</font> 
<!-- <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span> -->
<!-- <span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></td></tr> -->
<tr><td colspan=50>
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
</td></tr>
<tr class="teamStatsHeader">
<td onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')"><strong>Pts</strong></td>
<td onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')" align="right"><strong>FGMd</strong></td>
<!-- <td onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout = -->
<!-- "unHighlightKey('keyFieldGoalsAttempted')">FGAtt</td> -->
<!-- <td onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = -->
<!-- "unHighlightKey('keyFieldGoalPercentage')">FG%</td> -->
<td onmouseover="highlightKey('keyThreePointersMade')" onmouseout = "unHighlightKey('keyThreePointersMade')"align="right"><strong>3PMd</strong></td>
<!-- <td onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = -->
<!-- "unHighlightKey('keyThreePointersAttempted')">3PA</td> -->
<!-- <td onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = -->
<!-- "unHighlightKey('keyThreePointerPercentage')">3PPCT</td> -->
<td onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')"align="right"><strong>FTMd</strong></td>
<td onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')"align="right"><strong>FTAtt</strong></td>
<td onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')"align="right"><strong>FT%</strong></td>
<!-- <td onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = -->
<!-- "unHighlightKey('keyOffensiveRebounds')"align="right">OREB</td> -->
<!-- <td onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = -->
<!-- "unHighlightKey('keyDefensiveRebounds')">DREB</td>-->
<!-- <td onmouseover="highlightKey('keyAssists')" onmouseout = -->
<!-- "unHighlightKey('keyAssists')">AST</td> -->
<!-- <td onmouseover="highlightKey('keySteals')" onmouseout = -->
<!-- "unHighlightKey('keySteals')">STL</td> -->
<!-- <td onmouseout = "unHighlightKey('keyBlockedShots')">BLK</td> -->
<!-- <td onmouseover="highlightKey('keyTurnovers')" onmouseout = -->
<!-- "unHighlightKey('keyTurnovers')">TO</td> -->
<!-- <td onmouseover="highlightKey('keyPersonalFouls')" onmouseout = -->
 <!-- unHighlightKey('keyPersonalFouls')">PF</td> -->
</tr>
<tr class="resultsText">
<td align="left">{$TeamSeasonStats_Points}</td>
<td align="right">{$TeamSeasonStats_FieldGoalsMade}</td>
<!-- <td align="right">{$TeamSeasonStats_FieldGoalsAttempted}</td> -->
<VAR $fgpct = round($TeamSeasonStats_FieldGoalPercentage,1)>
<!-- <td align="right">{$fgpct}</td> -->
<td align="right">{$TeamSeasonStats_ThreePointersMade}</td>
<!-- <td align="right">{$TeamSeasonStats_ThreePointersAttempted}</td> -->
<VAR $tppct = round($TeamSeasonStats_ThreePointerPercentage,1)>
<!-- <td align="right">{$tppct}</td> -->
<td align="right">{$TeamSeasonStats_FreeThrowsMade}</td>
<td align="right">{$TeamSeasonStats_FreeThrowsAttempted}</td>
<VAR $ftpct = round($TeamSeasonStats_FreeThrowPercentage,1)>
<? $ftpct = sprintf("%.1f", $ftpct) ?>
<td align="right">{$ftpct}</td>
</td>
<!-- <!-- <td align="right">{$TeamSeasonStats_OffensiveRebounds}</td> -->
<!-- <td align="right">{$TeamSeasonStats_DefensiveRebounds}</td> -->
<!-- <td align="right">{$TeamSeasonStats_Assists}</td> -->
<!-- <td align="right">{$TeamSeasonStats_Steals}</td> -->
<!-- <td align="right">{$TeamSeasonStats_BlockedShots}</td> -->
<!-- <td align="right">{$TeamSeasonStats_Turnovers}</td> -->
<!-- <td align="right">{$TeamSeasonStats_PersonalFouls}</td> -->
</td>
</tr>
</table>