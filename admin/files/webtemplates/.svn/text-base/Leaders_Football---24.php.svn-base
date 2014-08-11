<h2>Colorado Prep Football Leaders</h2>

<VAR $tpl = "Leaders">
<IFNOTEMPTY $form_ConferenceID>
<VAR $selector = "&ConferenceID=".$form_ConferenceID>
<VAR $tpl = "Conference">
</IFNOTEMPTY>
<IFNOTEMPTY $form_ClassID>
<VAR $selector = "&ClassID=".$form_ClassID>
<VAR $tpl = "Class">
</IFNOTEMPTY>

<VAR $beginLink = "home.html?site=default&tpl=".$tpl."&Sport=".$form_Sport.$selector."&sort=">
<form name="leaderForm" action="home.html" method="get">
<input type="hidden" name="tpl" id="tpl" value="{$form_tpl}" />
<input type="hidden" name="site" id="site" value="{$form_site}" />
<input type="hidden" name="Sport" id="Sport" value="{$form_Sport}" />
<input type="hidden" name="ConferenceID" id="ConferenceID" value="{$form_ConferenceID}" />
<input type="hidden" name="ClassID" id="ClassID" value="{$form_ClassID}" />
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td>
<br>
<IFNOTEMPTY $form_leadersType>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>
</IFNOTEMPTY>
<font class="smallText">Click column headers to sort</font>
</td></tr>

<IFNOTEMPTY $form_leadersType>
<tr><td colspan="50">
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<IFEQUAL $form_leadersType "Passing">
<tr class="statKeyRow">
<td id="keyPassCompletions">Comp: Pass completions</td>
<td id="keyPassAttempts">Att: Pass attempts</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPassCompletionPercentage">Pct: Pass completion percentage</td>
<td id="keyPassingYards">Yds: Passing yards</td>
</tr>
<tr class="statKeyRow">
<td id="keyPassingTouchdowns">TD: Passing touchdowns</td>
<td id="keyPassingInterceptions">INT: Interceptions</td>
</tr>
</IFEQUAL>

<IFEQUAL $form_leadersType "Rushing">
<tr class="statKeyRow">
<td id="keyRushingAttempts">Att: Rushing attempts</td>
<td id="keyRushingYards">Yds: Rushing yards</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyRushingYardsPerAttempt">Yds/Att: Rushing yards per attempt</td>
<td id="keyRushingLong">Long: Rushing long</td>
</tr>
<tr class="statKeyRow">
<td id="keyRushingTouchdowns">TD: Rushing touchdowns</td>
</tr>
</IFEQUAL>

<IFEQUAL $form_leadersType "Receiving">
<tr class="statKeyRow">
<td id="keyReceptions">Rec: Receptions</td>
<td id="keyReceivingYards">Yds: Receiving yards</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyYardsPerCatch">Yds/Catch: Receiving yards per catch</td>
<td id="keyReceptionLong">Long: Reception long</td>
</tr>
<tr class="statKeyRow">
<td id="keyReceivingTouchdowns">TD: Receiving touchdowns</td>
</tr>
</IFEQUAL>

</table>
</div>
</td></tr>
</IFNOTEMPTY>
</table>




<a name="passing"></a>
<h4>Passing</h4>
<VAR $whereClause = " AND PassAttempts ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "PassingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr=""><a href="{$beginLink}PassCompletions#passing" onmouseover="highlightKey('keyPassCompletions')" onmouseout = "unHighlightKey('keyPassCompletions')">Comp</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}PassAttempts#passing" onmouseover="highlightKey('keyPassAttempts')" onmouseout = "unHighlightKey('keyPassAttempts')">Att</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}PassCompletionPercentage#passing" onmouseover="highlightKey('keyPassCompletionPercentage')" onmouseout = "unHighlightKey('keyPassCompletionPercentage')">Pct</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}PassingYards#passing" onmouseover="highlightKey('keyPassingYards')" onmouseout = "unHighlightKey('keyPassingYards')">Yds</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}PassingTouchdowns#passing" onmouseover="highlightKey('keyPassingTouchdowns')" onmouseout = "unHighlightKey('keyPassingTouchdowns')">TD</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}PassingInterceptions#passing" onmouseover="highlightKey('keyPassingInterceptions')" onmouseout = "unHighlightKey('keyPassingInterceptions')">INT</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Passing>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}" class="leadersNameLink">
                    {$Passing_PlayerFirstName} {$Passing_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Passing_TeamID}" class="leadersTeamLink">
                    {$Passing_TeamName}</a></td>
<VAR $compPct = round($Passing_PassCompletionPercentage,2)>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletions" STAT=$Passing_PassCompletions>
<ROW NAME=LeaderFootballCol STATFIELD="PassAttempts" STAT=$Passing_PassAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletionPercentage" STAT=$compPct>
<ROW NAME=LeaderFootballCol STATFIELD="PassingYards" STAT=$Passing_PassingYards>
<ROW NAME=LeaderFootballCol STATFIELD="PassingTouchdowns" STAT=$Passing_PassingTouchdowns>
<ROW NAME=LeaderFootballCol STATFIELD="PassingInterceptions" STAT=$Passing_PassingInterceptions>
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
<br /><br />


<a name="rushing"></a>
<h4>Rushing</h4>
<VAR $whereClause = " AND RushingAttempts ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "RushingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr=""><a href="{$beginLink}RushingAttempts#rushing" onmouseover="highlightKey('keyRushingAttempts')" onmouseout = "unHighlightKey('keyRushingAttempts')">Att</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}RushingYards#rushing" onmouseover="highlightKey('keyRushingYards')" onmouseout = "unHighlightKey('keyRushingYards')">Yds</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}RushingYardsPerAttempt#rushing" onmouseover="highlightKey('keyRushingYardsPerAttempt')" onmouseout = "unHighlightKey('keyRushingYardsPerAttempt')">Yds/Att</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}RushingLong#rushing" onmouseover="highlightKey('keyRushingLong')" onmouseout = "unHighlightKey('keyRushingLong')">Long</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}RushingTouchdowns#rushing" onmouseover="highlightKey('keyRushingTouchdowns')" onmouseout = "unHighlightKey('keyRushingTouchdowns')">TD</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Rushing>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}" class="leadersNameLink">
                    {$Rushing_PlayerFirstName} {$Rushing_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Rushing_TeamID}" class="leadersTeamLink">
                    {$Rushing_TeamName}</a></td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,2)>
<ROW NAME=LeaderFootballCol STATFIELD="RushingAttempts" STAT=$Rushing_RushingAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="RushingYards" STAT=$Rushing_RushingYards>
<ROW NAME=LeaderFootballCol STATFIELD="RushingYardsPerAttempt" STAT=$yardsAtt>
<ROW NAME=LeaderFootballCol STATFIELD="RushingLong" STAT=$Rushing_RushingLong>
<ROW NAME=LeaderFootballCol STATFIELD="RushingTouchdowns" STAT=$Rushing_RushingTouchdowns>
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
<br /><br />



<a name="receiving"></a>
<h4>Receiving</h4>
<VAR $whereClause = " AND Receptions ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "ReceivingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=Leaders SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause>
<table class="leadersTable deluxe" cellpadding="0" cellspacing="0">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Team</th>
            <th scope="col" abbr=""><a href="{$beginLink}Receptions#receiving" onmouseover="highlightKey('keyReceptions')" onmouseout = "unHighlightKey('keyReceptions')">Rec</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}ReceivingYards#receiving" onmouseover="highlightKey('keyReceivingYards')" onmouseout = "unHighlightKey('keyReceivingYards')">Yds</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}YardsPerCatch#receiving" onmouseover="highlightKey('keyYardsPerCatch')" onmouseout = "unHighlightKey('keyYardsPerCatch')">Yds/Catch</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}ReceptionLong#receiving" onmouseover="highlightKey('keyReceptionLong')" onmouseout = "unHighlightKey('keyReceptionLong')">Long</a></th>
            <th scope="col" abbr=""><a href="{$beginLink}ReceivingTouchdowns#receiving" onmouseover="highlightKey('keyReceivingTouchdowns')" onmouseout = "unHighlightKey('keyReceivingTouchdowns')">TD</a></th>
        </tr>
<IFGREATER count($Leaders_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=Leaders_rows prefix=Receiving>
        <tr class="{$rowClass}">
            <td>
                <a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}" class="leadersNameLink">
                    {$Receiving_PlayerFirstName} {$Receiving_PlayerLastName}</a></td>
            <td>
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Receiving_TeamID}" class="leadersTeamLink">
                    {$Receiving_TeamName}</a></td>
<VAR $yardsCatch = round($Receiving_YardsPerCatch)>
<ROW NAME=LeaderFootballCol STATFIELD="Receptions" STAT=$Receiving_Receptions>
<ROW NAME=LeaderFootballCol STATFIELD="ReceivingYards" STAT=$Receiving_ReceivingYards>
<ROW NAME=LeaderFootballCol STATFIELD="YardsPerCatch" STAT=$yardsCatch>
<ROW NAME=LeaderFootballCol STATFIELD="ReceptionLong" STAT=$Receiving_ReceptionLong>
<ROW NAME=LeaderFootballCol STATFIELD="ReceivingTouchdowns" STAT=$Receiving_ReceivingTouchdowns>
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

</FORM>