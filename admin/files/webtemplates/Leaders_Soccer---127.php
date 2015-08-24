<VAR $domainURL = "http://preps.denverpost.com">
<INCLUDE site=default tpl=SportSeasons>
<h2>Colorado High School {$sportName} Leaders</h2>

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

<IFEMPTY $form_res>
<VAR $resultNum=15>
<ELSE>
<VAR $resultNum=$form_res>
</IFEMPTY>
###
<IFEMPTY $form_order>
<VAR $resultORD="DESC">
<ELSE>
<VAR $resultORD=$form_order>
</IFEMPTY>
###
<IFEMPTY $form_sort>
<VAR $form_sort = "Points">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<VAR $beginLink = "/home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<VAR $sortClause = $form_sort." DESC">
<!-- {$whereClause} -->

<QUERY name=Leaders_hockeypoints SPORTNAME=$sqlSportName SORT=$sortClause count=$resultNum> <!-- <WHERECLAUSE=$whereClause> -->
<!-- query: {$Leaders_query} -->

<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
<br />
<a name="scoring"></a>
<h4>Scoring</h4>
<font class="smallText">Click column headers to sort. Show top <a href = "{$beginLink}&res=5">5</a> | <a href = "{$beginLink}&res=10">10</a> | <a href = "{$beginLink}&res=15">15</a> |  <a href = "{$beginLink}&res=25">25</a> |  <a href = "{$beginLink}&res=50">50</a>|  <a href = "{$beginLink}&res=100">100</a></font>
<br>###xxx###
###<font class="smallText">Sort <a href = "{$beginLink}&ORD=ASC">Ascending</a> | <a href = "{$beginLink}&ORD=DESC">Descending</a></font>###
</td></tr>


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
<td id="keyGoalieWin">W: Win</td>
<td id="keyGoalieLoss">L: Loss</td>
<td id="keyGoalieTie">T: Tie</td>
<td id="keyGoalieWinningPercentage">Win%: Winning Percentage</td>
</tr>
</tr>
</tr>
</table>
</div>

<table cellpadding="0" cellspacing="0" class="leadersTable deluxe wide600">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}TeamGames#scoring" onmouseover="highlightKey('keyTeamGames')" onmouseout = "unHighlightKey('keyTeamGames')">Gms</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}Goals#scoring" onmouseover="highlightKey('keyGoals')" onmouseout = "unHighlightKey('keyGoals')">Goals</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}Assists#scoring" onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">Assists</a></th>
            <th scope="col" abbr="" " td align="right"><a href="{$beginLink}Points#scoring" onmouseover="highlightKey('keyPoints')" onmouseout = "unHighlightKey('keyPoints')">Points</a></th>
        </tr>
<IFGREATER count($Leaders_hockeypoints_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_hockeypoints_rows prefix=Leader>
        <tr class="{$rowClass}">
            <td>
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
<?PHP
$player_name = $Leader_PlayerFirstName . ' ' . $Leader_PlayerLastName;
$player_slug = slugify($player_name);
?>
                <a href="{$domainURL}/players/{$player_slug}/{$Leader_PlayerID}/" CLASS="leadersNameLink">
                    {$player_name}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
                    {$Leader_TeamName}</a></td>
<ROW NAME=LeaderCol STATFIELD="TeamGames" STAT=$Leader_TeamGames>
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
<form name="leaderForm" action="/home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<VAR $beginLink = "/home.html?site=default&tpl=Leaders&Sport=".$form_Sport."&ConferenceID=".$form_ConferenceID."&sort=">

<IFEQUAL $form_sort "GoalsAllowed">
  <VAR $sortClauseGoalies = "GoalsAllowed ASC">
<ELSE>
<IFEQUAL $form_sort "GoalsAgainstAverage">
  <VAR $sortClauseGoalies = "GoalsAgainstAverage ASC">
<ELSE>
  <VAR $sortClauseGoalies = $form_sort." DESC">
</IFEQUAL>
</IFEQUAL>

<IFEMPTY $form_sortGoalies>
  <VAR $form_sortGoalies = "GoalsAllowed">
</IFEMPTY>




<QUERY name=Leaders_goalies SPORTNAME=$sqlSportName SORT=$sortClauseGoalies count=$resultNum> <!-- <WHERECLAUSE=$whereClause> -->
<a name="goalkeeping"></a>
<h4>Goalkeeping</h4>
<font class="smallText">Click column headers to sort. Show top <a href = "{$beginLink}&res=5">5</a> | <a href = "{$beginLink}&res=10">10</a> | <a href = "{$beginLink}&res=15">15</a> |  <a href = "{$beginLink}&res=25">25</a> |  <a href = "{$beginLink}&res=50">50</a>|  <a href = "{$beginLink}&res=100">100</a></font>
</td></tr>
<table cellpadding="0" cellspacing="0" class="leadersTable deluxe wide600">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr="" " td align="right"><a href="{$beginLink}TeamGames#goalkeeping" onmouseover="highlightKey('keyTeamGames')" onmouseout = "unHighlightKey('keyTeamGames')">Gms</a></th>
            <th scope="col" abbr="" " td align="right"><a href="{$beginLink}GoalkeeperMinutes#goalkeeping" onmouseover="highlightKey('keyGoalkeeperMinutes')" onmouseout = "unHighlightKey('keyGoalkeeperMinutes')">Min</a></th>

            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}GoalsAllowed#goalkeeping" onmouseover="highlightKey('keyGoalsAllowed')" onmouseout = "unHighlightKey('keyGoalsAllowed')">GA</a></th>

            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}Saves#goalkeeping" onmouseover="highlightKey('keySaves')" onmouseout = "unHighlightKey('keySaves')">SV</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}SavePercentage#goalkeeping" onmouseover="highlightKey('keySavePercentage')" onmouseout = "unHighlightKey('keySavePercentage')">Save%</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}GoalieWin#goalkeeping" onmouseover="highlightKey('keyGoalieWin')" onmouseout = "unHighlightKey('keyGoalieWin')">W</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}GoalieLoss#goalkeeping" onmouseover="highlightKey('keyGoalieLoss')" onmouseout = "unHighlightKey('keyGoalieLoss')">L</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}GoalieTie#goalkeeping" onmouseover="highlightKey('keyGoalieTie')" onmouseout = "unHighlightKey('keyGoalieTie')">T</a></th>
            <th scope="col" abbr="" "td align="right"><a href="{$beginLink}GoalieWinningPercentage#goalkeeping" onmouseover="highlightKey('keyGoalieWinningPercentage')" onmouseout = "unHighlightKey('keyGoalieWinningPercentage')">Win%</a></th>
        </tr>
<IFGREATER count($Leaders_goalies_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_goalies_rows prefix=Leader>
        <tr class="{$rowClass}" >
            <td>
<VAR $Leader_PlayerFirstName = fixApostrophes($Leader_PlayerFirstName)>
<VAR $Leader_PlayerLastName = fixApostrophes($Leader_PlayerLastName)>
<?PHP
$player_name = $Leader_PlayerFirstName . ' ' . $Leader_PlayerLastName;
$player_slug = slugify($player_name);
?>
                <a href="{$domainURL}/players/{$player_slug}/{$Leader_PlayerID}/" CLASS="leadersNameLink">
                    {$player_name}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Leader_TeamID}" CLASS="leadersTeamLink">
                    {$Leader_TeamName}</a></td>

<ROW NAME=LeaderCol STATFIELD="Games" STAT=$Leader_TeamGames>
<ROW NAME=LeaderCol STATFIELD="Games" STAT=$Leader_GoalkeeperMinutes>

<ROW NAME=LeaderCol STATFIELD="GoalsAllowed" STAT=$Leader_GoalsAllowed>
<ROW NAME=LeaderCol STATFIELD="Saves" STAT=$Leader_Saves>
<? $svPct =  sprintf("%.3f", $Leader_SavePercentage) ?>
<ROW NAME=LeaderCol STATFIELD="SavePercentage" STAT=$svPct>
<VAR $GoalieWinLoss = $Leader_GoalieWin."-".$Leader_GoalieLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieWin" STAT=$Leader_GoalieWin>
<ROW NAME=LeaderCol STATFIELD="GoalieLoss" STAT=$Leader_GoalieLoss>
<ROW NAME=LeaderCol STATFIELD="GoalieTie" STAT=$Leader_GoalieTie>
<? $gWP =  sprintf("%.3f", $Leader_GoalieWinningPercentage) ?>
<ROW NAME=LeaderCol STATFIELD="GoalieWinningPercentage" STAT=$gWP>


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
