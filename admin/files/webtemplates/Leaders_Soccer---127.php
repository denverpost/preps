<h2>Colorado Prep {$sportName} Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

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
<!-- query: {$Leaders_query} -->

<a name="offense"></a>
<h4>Offensive</h4>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
<br />
<font class="smallText">Click column headers to sort</font>
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

<table cellpadding="0" cellspacing="0" class="leadersTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th align="right"><a href="{$beginLink}Goals#offensive" onmouseover="highlightKey('keyGoals')" onmouseout = "unHighlightKey('keyGoals')">Goals</a></th>
            <th align="right"><a href="{$beginLink}Assists#offensive" onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">Assists</a></th>
            <th align="right"><a href="{$beginLink}Points#offensive" onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Points</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Leader>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}?site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
                    {$Leader_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}?site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
                    {$Leader_TeamName}</a></td>
<ROW NAME=LeaderCol STATFIELD="Goals" STAT=$Leader_Goals>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$Leader_Assists>
<ROW NAME=LeaderCol STATFIELD="Points" STAT=$Leader_Points>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>

<IFEQUAL $form_ConferenceID "all"><VAR $ConferenceID = ""></IFEQUAL>  
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<VAR $beginLink = "home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">
<VAR $sortClause = "Saves DESC">
<!-- {$whereClause} -->
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause> <!-- <WHERECLAUSE=$whereClause> -->
<a name="defensive"></a>
<h4>Defensive</h4>
<table cellpadding="0" cellspacing="0" class="leadersTable deluxe wide400">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr=""><a href="{$beginLink}GoalsAllowed#defensive" onmouseover="highlightKey('keyGoalsAllowed')" onmouseout = "unHighlightKey('keyGoalsAllowed')">GA</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}Saves" onmouseover="highlightKey('keySaves')" onmouseout = "unHighlightKey('keySaves')">SV</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}SavePercentage#defensive" onmouseover="highlightKey('keySavePercentage')" onmouseout = "unHighlightKey('keySavePercentage')">Save%</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}GoalieWinLoss#defensive" onmouseover="highlightKey('keyGoalieWinLoss')" onmouseout = "unHighlightKey('keyGoalieWinLoss')">W-L</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}GoalieWinPercentage#defensive" onmouseover="highlightKey('keyGoalieWinPercentage')" onmouseout = "unHighlightKey('keyGoalieWinPercentage')">Win%</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Leader>
        <tr class="{$rowClass}" >
            <td>
                <a href="{$externalURL}?site=default&tpl=Player&ID={$Leader_PlayerID}" CLASS="leadersNameLink">
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
                    {$Leader_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}?site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
                    {$Leader_TeamName}</a></td>

<ROW NAME=LeaderCol STATFIELD="GoalsAllowed" STAT=$Leader_GoalsAllowed>
<ROW NAME=LeaderCol STATFIELD="Saves" STAT=$Leader_Saves>
<ROW NAME=LeaderCol STATFIELD="SavePercentage" STAT=$Leader_SavePercentage>
<VAR $GoalieWinLoss = $Leader_GoalieWin."-".$Leader_GoalieLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieWinLoss" STAT=$GoalieWinLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieWinPercentage" STAT=$Leader_GoalieWinningPercentage>


</td>
</tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>
