<VAR $domainURL = "http://preps.denverpost.com">
<VAR $whereClause = " AND Minutes ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $form_sort = "PointsPerGame">
</IFEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = $form_sort." DESC">
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<table cellpadding="0" cellspacing="0" class="teamStatTable">
<tr><td colspan="50"><font class="pageTitle">Player Stats</font>
</td></tr>
<tr class="teamStatsHeader">
<td>Name</td>
<td align="right">PPG</td>
<td align="right">Pts</td>
<td align="right">FGM</td>
<td align="right">FGA</td>
<td align="right">FGPCT</td>
<td align="right">3PM</td>
<td align="right">3PA</td>
<td align="right">3PPCT</td>
<td align="right">FTM</td>
<td align="right">FTA</td>
<td align="right">FTPCT</td>
<td align="right">OREB</td>
<td align="right">DREB</td>
<td align="right">AST</td>
<td align="right">STL</td>
<td align="right">BLK</td>
<td align="right">TO</td>
<td align="right">PF</td>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Player>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}site=default&tpl=Player&ID={$Player_PlayerID}" class="leadersNameLink">
{$Player_PlayerFirstName} {$Player_PlayerLastName}</a></td>
<VAR $ppg = round($Player_PointsPerGame,1)>
<ROW NAME=LeaderBBallCol STATFIELD="PointsPerGame" STAT=$ppg>
<ROW NAME=LeaderBBallCol STATFIELD="Points" STAT=$Player_Points>
<ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsMade" STAT=$Player_FieldGoalsMade>
<ROW NAME=LeaderBBallCol STATFIELD="FieldGoalsAttempted" STAT=$Player_FieldGoalsAttempted>
<VAR $fgpct = round($Player_FieldGoalPercentage,2)>
<ROW NAME=LeaderBBallCol STATFIELD="FieldGoalPercentage" STAT=$fgpct>
<ROW NAME=LeaderBBallCol STATFIELD="ThreePointersMade" STAT=$Player_ThreePointersMade>
<ROW NAME=LeaderBBallCol STATFIELD="ThreePointersAttempted" STAT=$Player_ThreePointersAttempted>
<VAR $tppct = round($Player_ThreePointerPercentage,2)>
<ROW NAME=LeaderBBallCol STATFIELD="ThreePointerPercentage" STAT=$tppct>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsMade" STAT=$Player_FreeThrowsMade>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowsAttempted" STAT=$Player_FreeThrowsAttempted>
<VAR $ftpct = round($Player_FreeThrowPercentage,2)>
<ROW NAME=LeaderBBallCol STATFIELD="FreeThrowPercentage" STAT=$ftpct>
<ROW NAME=LeaderBBallCol STATFIELD="OffensiveRebounds" STAT=$Player_OffensiveRebounds>
<ROW NAME=LeaderBBallCol STATFIELD="DefensiveRebounds" STAT=$Player_DefensiveRebounds>
<ROW NAME=LeaderBBallCol STATFIELD="Assists" STAT=$Player_Assists>
<ROW NAME=LeaderBBallCol STATFIELD="Steals" STAT=$Player_Steals>
<ROW NAME=LeaderBBallCol STATFIELD="BlockedShots" STAT=$Player_BlockedShots>
<ROW NAME=LeaderBBallCol STATFIELD="Turnovers" STAT=$Player_Turnovers>
<ROW NAME=LeaderBBallCol STATFIELD="PersonalFouls" STAT=$Player_PersonalFouls>
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
