<VAR $whereClause = " AND FieldGoalsMade ".chr(62)."  0" " OR FreeThrowsAttempted ".chr(62)."  0" " OR ThreePointersMade ".chr(62)."  0">
<IFEMPTY $form_sort>
<VAR $form_sort = "PointsPerGame">
</IFEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = $form_sort." DESC">
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
###<!-- query: {$TeamPlayerStats_query} --!>###
<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr><td colspan="50"><font class="pageTitle">Player Stats</font>
</td></tr>
<tr class="teamStatsHeader">
<td><strong>Name</strong></td>
<td align="right"><strong>PPG</strong></td>
<td align="right"><strong>Pts</strong></td>
<td align="right"><strong>FGMd</strong></td>
<!-- <td align="right">FGA</td> -->
<!-- <td align="right">FGPCT</td> -->
<td align="right"><strong>3PMd</strong></td>
<!-- <td align="right">3PA</td> -->
<!-- <td align="right">3PPCT</td> -->
<td align="right"><strong>FTMd</strong></td>
<td align="right"><strong>FTAtt</strong></td>
<td align="right"><strong>FT%</strong></td>
<!-- <td align="right">OREB</td> -->
<!-- <td align="right">DREB</td> -->
<!-- <td align="right">AST</td> -->
<!-- <td align="right">STL</td> -->
<!-- <td align="right">BLK</td> -->
<!-- <td align="right">TO</td> -->
<!-- <td align="right">PF</td> -->
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Player>

<VAR $Scoring_Flag = ($Player_PointsPerGame + $Player_FreeThrowsAttempted)>
<IFGREATER ($Scoring_Flag) 0 >


###<IFGREATER ($Player_PointsPerGame) 0 >###
###<IFGREATER ($Player_FreeThrowsAttempted) 0>###

<tr class="{$rowClass}">
<td>
<a href="home.html?site=default&tpl=Player&ID={$Player_PlayerID}" class="leadersNameLink"> ###target="_blank">###
<VAR $Player_PlayerFirstName = fixApostrophes($Player_PlayerFirstName)>
<VAR $Player_PlayerLastName = fixApostrophes($Player_PlayerLastName)>
{$Player_PlayerFirstName} {$Player_PlayerLastName}</a></td>
<VAR $ppg = round($Player_PointsPerGame,1)>
<? $ppg = sprintf("%.1f", $ppg) ?>
<ROW NAME=LeaderBBallCol STATFIELD="PointsPerGame" STAT=$ppg>
<ROW NAME=LeaderBBallCol STATFIELD="Points" STAT=$Player_Points>
<ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsMade" STAT=$Player_FieldGoalsMade>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsAttempted" -->
<!-- STAT=$Player_FieldGoalsAttempted> -->
<VAR $fgpct = round($Player_FieldGoalPercentage,1)>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="FieldGoalPercentage" STAT=$fgpct> -->
<ROW NAME=LeaderBBallCol STATFIELD="ThreePointersMade" STAT=$Player_ThreePointersMade>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="ThreePointersAttempted" -->
<!-- STAT=$Player_ThreePointersAttempted> --> 
<!-- <VAR $tppct = round($Player_ThreePointerPercentage,1)> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="ThreePointerPercentage" STAT=$tppct> -->
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsMade" STAT=$Player_FreeThrowsMade>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsAttempted" STAT=$Player_FreeThrowsAttempted>
<VAR $ftpct = round($Player_FreeThrowPercentage,1)>
<? $ftpct = sprintf("%.1f", $ftpct) ?>
<td align="right">{$ftpct}</td>
<!-- <ROW NAME=LeaderBBallCol STATFIELD="OffensiveRebounds" -->
<!-- STAT=$Player_OffensiveRebounds> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="DefensiveRebounds" -->
<!-- STAT=$Player_DefensiveRebounds> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="Assists" STAT=$Player_Assists> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="Steals" STAT=$Player_Steals> -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="BlockedShots" STAT=$Player_BlockedShots>
 -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="Turnovers" STAT=$Player_Turnovers>  -->
<!-- <ROW NAME=LeaderBBallCol STATFIELD="PersonalFouls" STAT=$Player_PersonalFouls> -->
</td>
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

</table>
