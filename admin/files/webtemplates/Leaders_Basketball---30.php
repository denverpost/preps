<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClause = " AND FreeThrowsAttempted AND FieldGoalsMade ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $form_sort = "PointsPerGame">
</IFEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = $form_sort." DESC">
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<table cellpadding="0" cellspacing="0" class="leadersTable">
<tr><td colspan="50"><font class="pageTitle">Leaders</font>
<!-- <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton"> -->
<!-- Show key</a></span> -->
<!-- <span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" -->
<!-- class="keyButton">Hide key</a></span> -->
<br />
<font class="smallText">Click column headers to sort</font></td></tr>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyPoints">Pts: Points</td>
<td id="keyOffensiveRebounds">OREB: Offensive rebounds</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyFieldGoalsMade">FGM: Field goals made</td>
<td id="keyDefensiveRebounds">DREB: Defensive rebounds</td>
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
<tr class="leadersColumnHeader">
<td>Name</td>
<td>Team</td>
<td align="right"><a href="{$beginLink}PointsPerGame" onmouseover="highlightKey('keyPointsPerGame')" onmouseout = "unHighlightKey('keyPointsPerGame')">PPG</a></td>
<td align="right"><a href="{$beginLink}Points" onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Pts</a></td>
<td align="right"><a href="{$beginLink}FieldGoalsMade" onmouseover="highlightKey('keyFieldGoalsMade')" onmouseout = "unHighlightKey('keyFieldGoalsMade')">FGM</a></td>
<!-- <td align="right"><a href="{$beginLink}FieldGoalsAttempted" -->
<!-- onmouseover="highlightKey('keyFieldGoalsAttempted')" onmouseout =  -->
<!-- "unHighlightKey('keyFieldGoalsAttempted')">FGA</a></td> -->
<!-- <td align="right"><a href="{$beginLink}FieldGoalPercentage" -->
<!-- onmouseover="highlightKey('keyFieldGoalPercentage')" onmouseout = -->
<!-- "unHighlightKey('keyFieldGoalPercentage')">FGPCT</a></td> -->
<td align="right"><a  href="{$beginLink}ThreePointersMade"onmouseover="highlightKey('keyThreePointersMade')"  onmouseout = "unHighlightKey('keyThreePointersMade')">3PM</a></td>
<!-- <td align="right"><a href="{$beginLink}ThreePointersAttempted" -->
<!-- onmouseover="highlightKey('keyThreePointersAttempted')" onmouseout = -->
<!-- "unHighlightKey('keyThreePointersAttempted')">3PA</a></td> -->
<!-- <td align="right"><a href="{$beginLink}ThreePointerPercentage" -->
<!-- onmouseover="highlightKey('keyThreePointerPercentage')" onmouseout = -->
<!-- "unHighlightKey('keyThreePointerPercentage')">3PPCT</a></td> -->
<td align="right"><a href="{$beginLink}FreeThrowsMade" onmouseover="highlightKey('keyFreeThrowsMade')" onmouseout = "unHighlightKey('keyFreeThrowsMade')">FTM</a></td>
<td align="right"><a href="{$beginLink}FreeThrowsAttempted" onmouseover="highlightKey('keyFreeThrowsAttempted')" onmouseout = "unHighlightKey('keyFreeThrowsAttempted')">FTA</a></td>
<td align="right"><a href="{$beginLink}FreeThrowPercentage" onmouseover="highlightKey('keyFreeThrowPercentage')" onmouseout = "unHighlightKey('keyFreeThrowPercentage')">FTPCT</a></td>
<!-- <td align="right"><a href="{$beginLink}OffensiveRebounds" -->
<!-- onmouseover="highlightKey('keyOffensiveRebounds')" onmouseout = -->
<!-- "unHighlightKey('keyOffensiveRebounds')">OREB</a></td>  -->
<!-- <td align="right"><a href="{$beginLink}DefensiveRebounds" -->
<!-- onmouseover="highlightKey('keyDefensiveRebounds')" onmouseout = -->
<!-- "unHighlightKey('keyDefensiveRebounds')">DREB</a></td> -->
<!-- <td align="right"><a href="{$beginLink}Assists" onmouseover= -->
<!-- "highlightKey('keyAssists')" onmouseout = -->
<!-- "unHighlightKey('keyAssists')">AST</a></td> -->
<!-- <td align="right"><a href="{$beginLink}Steals" -->
<!-- onmouseover="highlightKey('keySteals')" onmouseout = -->
<!-- "unHighlightKey('keySteals')">STL</a></td> -->
<!-- <td align="right"><a href="{$beginLink}BlockedShots" -->
<!-- nmouseover="highlightKey('keyBlockedShots')" onmouseout = -->
<!-- "unHighlightKey('keyBlockedShots')">BLK</a></td> -->
<!-- <td align="right"><a href="{$beginLink}Turnovers" -->
<!-- onmouseover="highlightKey('keyTurnovers')" onmouseout = -->
<!-- "unHighlightKey('keyTurnovers')">TO</a></td> -->
<!-- <td align="right"><a href="{$beginLink}PersonalFouls" -->
<!-- onmouseover="highlightKey('keyPersonalFouls')" onmouseout = -->
<!-- "unHighlightKey('keyPersonalFouls')">PF</a></td> -->
</tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Leader>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
{$Leader_PlayerFirstName} {$Leader_PlayerLastName}</a></td>
<td>
<a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_TeamName}</a></td>
<VAR $ppg = round($Leader_PointsPerGame,1)>
<ROW NAME=LeaderBBallCol STATFIELD="PointsPerGame" STAT=$ppg>
<ROW NAME=LeaderBBallCol STATFIELD="Points" STAT=$Leader_Points>
<ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsMade" STAT=$Leader_FieldGoalsMade> <!-- <ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsAttempted" -->
<!-- STAT=$Leader_FieldGoalsAttempted> -->
<VAR $fgpct = round($Leader_FieldGoalPercentage,1)>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="FieldGoalPercentage" STAT=$fgpct> -->
<ROW NAME=LeaderBBallCol STATFIELD="ThreePointersMade" 
STAT=$Leader_ThreePointersMade>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="ThreePointersAttempted" -->
<!-- STAT=$Leader_ThreePointersAttempted> -->
<!-- <VAR $tppct = round($Leader_ThreePointerPercentage,1)> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="ThreePointerPercentage" STAT=$tppct> -->
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsMade" STAT=$Leader_FreeThrowsMade>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsAttempted" STAT=$Leader_FreeThrowsAttempted>
<VAR $ftpct = round($Leader_FreeThrowPercentage,1)>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowPercentage" STAT=$ftpct>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="OffensiveRebounds" STAT=$Leader_OffensiveRebounds>
<ROW NAME=LeaderBBallCol STATFIELD="DefensiveRebounds" STAT=$Leader_DefensiveRebounds>
<ROW NAME=LeaderBBallCol STATFIELD="Assists" STAT=$Leader_Assists>
<ROW NAME=LeaderBBallCol STATFIELD="Steals" STAT=$Leader_Steals>
<ROW NAME=LeaderBBallCol STATFIELD="BlockedShots" STAT=$Leader_BlockedShots>
<ROW NAME=LeaderBBallCol STATFIELD="Turnovers" STAT=$Leader_Turnovers>
<ROW NAME=LeaderBBallCol STATFIELD="PersonalFouls" STAT=$Leader_PersonalFouls> -->
</td>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
