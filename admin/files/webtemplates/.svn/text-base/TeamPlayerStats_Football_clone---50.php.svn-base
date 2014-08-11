<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
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

</table>
</div>
</td></tr>

</table>
<VAR $whereClause = " AND PassAttempts ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "PassingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="">Comp</th>
<th scope="col" abbr="">Att</th>
<th scope="col" abbr="">Pct</th>
<th scope="col" abbr="">Yds</th>
<th scope="col" abbr="">TD</th>
<th scope="col" abbr="">INT</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Passing>
 <VAR $lastName = fixApostrophes($Passing_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="{$externalURL}site=default&tpl=Player&ID={$Passing_PlayerID}" class="leadersNameLink">
{$Passing_PlayerFirstName} {$lastName}</a></th>
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

<VAR $whereClause = " AND RushingAttempts ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "RushingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Rushing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="">Att</th>
<th scope="col" abbr="">Yards</th>
<th scope="col" abbr="">Yds/Att</th>
<th scope="col" abbr="">Long</th>
<th scope="col" abbr="">TD</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Rushing>
<VAR $lastName = fixApostrophes($Rushing_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="{$externalURL}site=default&tpl=Player&ID={$Rushing_PlayerID}" class="leadersNameLink">
{$Rushing_PlayerFirstName} {$lastName}</a></th>
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

<VAR $whereClause = " AND Receptions ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "ReceivingYards DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Receiving</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="">Rec</th>
<th scope="col" abbr="">Yds</th>
<th scope="col" abbr="">Yds/Catch</th>
<th scope="col" abbr="">Long</th>
<th scope="col" abbr="">TD</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Receiving>
 <VAR $lastName = fixApostrophes($Receiving_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="{$externalURL}site=default&tpl=Player&ID={$Receiving_PlayerID}" class="leadersNameLink">
{$Receiving_PlayerFirstName} {$lastName}</a></th>
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

