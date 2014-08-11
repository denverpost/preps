<IFEQUAL $form_ConferenceID "all"><VAR $ConferenceID = ""></IFEQUAL>  
<form name="leaderForm" action="index.php" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<IFEMPTY $form_sort>
<VAR $form_sort = "Goals">
</IFEMPTY>
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&SearchType=".$form_SearchType."&sort=">
<VAR $sortClause = $form_sort." DESC">
<!-- {$whereClause} -->
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause> <!-- <WHERECLAUSE=$whereClause> -->
<table cellpadding="0" cellspacing="0" class="leadersTable">
<tr><td colspan="50"><font class="pageTitle">Offensive</font>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
<br />
<font class="smallText">Click column headers to sort</font></td></tr>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyGoals">G: Goals</td>
<td id="keyAssists">A: Assists</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPoints">P: Points</td>
<td id="keyGoalsAllowed">GA: Goals Allowed</td></tr>

<tr class="statKeyRow">
<td id="keySaves">SV: Saves>
<td id="keySavePercentage">Save%: Save Percentage</td>
</tr>
<tr class="statKeyRow">
<td id="keyGoalieWinLoss">W-L: Win-Loss Record</td>
<td id="keyGoalieWinPercentage">Win%: Win Percentage</td>
</tr>
</tr>
</tr>
</table>
</div>
</td></tr>
<tr class="leadersColumnHeader">
<td>Name</td>
<td>Team</td>
<td align="right"><a href="{$beginLink}Goals" onmouseover="highlightKey('keyGoals')" onmouseout = "unHighlightKey('keyGoals')">G</a></td>
<td align="right"><a href="{$beginLink}Assists" onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">A</a></td>
<td align="right"><a href="{$beginLink}Assists" onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">P</a></td></tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow">
<RESULTS list=Leaders_rows prefix=Leader>
<tr class="{$rowClass}">
<td>
<a href="{$externalURL}?site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
{$Leader_PlayerLastName}</a></td>
<td>
<a href="{$externalURL}?site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_TeamCode}</a></td>

<ROW NAME=LeaderCol STATFIELD="Goals" STAT=$Leader_Goals>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$Leader_Assists>
<ROW NAME=LeaderCol STATFIELD="Points" STAT=$Leader_Points>
</td>
</tr>
<IFEQUAL $rowClass "leadersRow">
<VAR $rowClass = "leadersRowAlternate">
<ELSE>
<VAR $rowClass = "leadersRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>

<IFEQUAL $form_ConferenceID "all"><VAR $ConferenceID = ""></IFEQUAL>  
<form name="leaderForm" action="index.php" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<VAR $beginLink = "index.php?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&SearchType=".$form_SearchType."&sort=">
<VAR $sortClause = "Saves DESC">
<!-- {$whereClause} -->
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause> <!-- <WHERECLAUSE=$whereClause> -->
<table cellpadding="0" cellspacing="0" class="leadersTable">

<tr><td colspan="50"><font class="pageTitle">Defensive</font></td></tr>
<tr class="leadersColumnHeader">
<td>Name</td>
<td>Team</td>
<td align="right"><a href="{$beginLink}GoalsAllowed" onmouseover="highlightKey('keyGoalsAllowed')" onmouseout = "unHighlightKey('keyGoalsAllowed')">GA</a></td>

<td align="right"><a href="{$beginLink}Saves" onmouseover="highlightKey('keySaves')" onmouseout = "unHighlightKey('keySaves')">SV</a></td>

<td align="right"><a href="{$beginLink}SavePercentage" onmouseover="highlightKey('keySavePercentage')" onmouseout = "unHighlightKey('keySavePercentage')">Save%</a></td>

<td align="right"><a href="{$beginLink}GoalieWinLoss" onmouseover="highlightKey('keyGoalieWinLoss')" onmouseout = "unHighlightKey('keyGoalieWinLoss')">W-L</a></td>

<td align="right"><a href="{$beginLink}GoalieWinPercentage" onmouseover="highlightKey('keyGoalieWinPercentage')" onmouseout = "unHighlightKey('keyGoalieWinPercentage')">Win%</a></td>

</tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow">
<RESULTS list=Leaders_rows prefix=Leader>
<tr class="{$rowClass}" >
<td>
<a href="{$externalURL}?site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
{$Leader_PlayerLastName}</a></td>
<td>
<a href="{$externalURL}?site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
{$Leader_TeamCode}</a></td>


<ROW NAME=LeaderCol STATFIELD="GoalsAllowed" STAT=$Leader_GoalsAllowed>
<ROW NAME=LeaderCol STATFIELD="Saves" STAT=$Leader_Saves>
<ROW NAME=LeaderCol STATFIELD="SavePercentage" STAT=$Leader_SavePercentage>
<VAR $GoalieWinLoss = $Leader_GoalieWin."-".$Leader_GoalieLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieWinLoss" STAT=$GoalieWinLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieWinPercentage" STAT=$Leader_GoalieWinningPercentage>


</td>
</tr>
<IFEQUAL $rowClass "leadersRow">
<VAR $rowClass = "leadersRowAlternate">
<ELSE>
<VAR $rowClass = "leadersRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
</table>
