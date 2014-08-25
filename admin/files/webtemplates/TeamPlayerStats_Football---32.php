<VAR $domainURL = "http://preps.denverpost.com">
###YEARCHECK###
<VAR $sportYear = "2014">
<h3>Player Stats <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></h3>

<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td COLSPAN=75>
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
<tr class="statKeyRowAlt">
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
###query: {$TeamPlayerStats_query}###


<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr="" align="center">Comp</th>
<th scope="col" abbr="" align="center">Att</th>
<th scope="col" abbr="" align="center">Pct</th>
<th scope="col" abbr="" align="center">Yds</th>
<th scope="col" abbr="" align="center">TD</th>
<th scope="col" abbr=""align="center">INT</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Passing>

<IFGREATER ($Passing_PassAttempts) 0>
###here###

 <VAR $lastName = fixApostrophes($Passing_PlayerLastName)>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name" align="left">
<a href="home.html?site=default&tpl=Player&ID={$Passing_PlayerID}" class="leadersNameLink">### target="_blank">###
{$Passing_PlayerFirstName} {$lastName}</a></td>
<VAR $compPct = round($Passing_PassCompletionPercentage,1)>
<? $compPct = sprintf("%.1f", $compPct) ?>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletions" STAT=$Passing_PassCompletions>
<ROW NAME=LeaderFootballCol STATFIELD="PassAttempts" STAT=$Passing_PassAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="PassCompletionPercentage" STAT=$compPct>

<?php
$passingYardsFormatted =  $Passing_PassingYards;
$passingYardsFormatted = number_format($passingYardsFormatted);
$passingYardsFormatted = sprintf("%s", $passingYardsFormatted);
?>

<ROW NAME=LeaderFootballCol STATFIELD="PassingYards" STAT=$passingYardsFormatted>
###<ROW NAME=LeaderFootballCol STATFIELD="PassingYards" STAT=$Passing_PassingYards>###
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

<ELSE>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
<h4>Rushing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr="" align="center">Att</th>
<th scope="col" abbr="" align="center">Yards</th>
<th scope="col" abbr="" align="center">Yds/Att</th>
<th scope="col" abbr="" align="center">Long</th>
<th scope="col" abbr="" align="center">TD</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Rushing>

<IFGREATER ($Rushing_RushingAttempts) 0>

<VAR $lastName = fixApostrophes($Rushing_PlayerLastName)>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name" align="left">
<a href="home.html?site=default&tpl=Player&ID={$Rushing_PlayerID}" class="leadersNameLink">
{$Rushing_PlayerFirstName} {$lastName}</a></td>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,1)>
<? $yardsAtt = sprintf("%.1f", $yardsAtt) ?>
<ROW NAME=LeaderFootballCol STATFIELD="RushingAttempts" STAT=$Rushing_RushingAttempts>

<?php
$rushingYardsFormatted =  $Rushing_RushingYards;
$rushingYardsFormatted = number_format($rushingYardsFormatted);
$rushingYardsFormatted = sprintf("%s", $rushingYardsFormatted);
?>

<ROW NAME=LeaderFootballCol STATFIELD="RushingYards" STAT=$rushingYardsFormatted>

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

<ELSE>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
<h4>Receiving</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr="" align="center">Rec</th>
<th scope="col" abbr="" align="center">Yds</th>
<th scope="col" abbr="" align="center">Yds/Catch</th>
<th scope="col" abbr="" align="center">Long</th>
<th scope="col" abbr="" align="center">TD</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Receiving>

<IFGREATER ($Receiving_Receptions) 0>
 <VAR $lastName = fixApostrophes($Receiving_PlayerLastName)>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name" align="left">
<a href="home.html?site=default&tpl=Player&ID={$Receiving_PlayerID}" class="leadersNameLink">
{$Receiving_PlayerFirstName} {$lastName}</a></td>
###<VAR $yardsCatch = round($Receiving_YardsPerCatch)>###
<ROW NAME=LeaderFootballCol STATFIELD="Receptions" STAT=$Receiving_Receptions>
<?php
$receivingYardsFormatted =  $Receiving_ReceivingYards;
$receivingYardsFormatted = number_format($receivingYardsFormatted);
$receivingYardsFormatted = sprintf("%s", $receivingYardsFormatted);
?>

<ROW NAME=LeaderFootballCol STATFIELD="ReceivingYards" STAT=$receivingYardsFormatted>

<VAR $yardsCatch = round($Receiving_YardsPerCatch,1)>
<? $yardsCatch = sprintf("%.1f", $yardsCatch) ?>

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
<ELSE>
</IFGREATER>
</tbody>
</table>
<br /><br />

<VAR $whereClause = " AND ( FieldGoalsAttempted ".chr(62)." 0 OR PointAfterTouchdownAttempts ".chr(62)." 0 )">
<IFEMPTY $form_sort>
<VAR $sortClause = "FieldGoalsMade DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
<a name="placekicking"></a>
<h4>Placekicking</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="" align="left">Name</th>
            <th scope="col" abbr="XP-M" align="center">XP Made</th>
            <th scope="col" abbr="XP-A" align="center">XP Att</th>
            <th scope="col" abbr="FG-M" align="center">FG Made</th>
            <th scope="col" abbr="FG-A" align="center">FG Att</th>
            <th scope="col" abbr="FG-L" align="center">Long</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Placekicking>

<IFTRUE $Placekicking_FieldGoalsAttempted != 0 || $Placekicking_PointAfterTouchdownAttempts != 0 >

<VAR $lastName = fixApostrophes($Placekicking_PlayerLastName)>
        <tr class="{$rowClass}">
            <td scope="row" abbr="Player Name" align="left">
                <a href="home.html?site=default&tpl=Player&ID={$Placekicking_PlayerID}" class="leadersNameLink">
                    {$Placekicking_PlayerFirstName} {$lastName}</a></td>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdown" STAT=$Placekicking_PointAfterTouchdown>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdownAttempts" STAT=$Placekicking_PointAfterTouchdownAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsMade" STAT=$Placekicking_FieldGoalsMade>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsAttempted" STAT=$Placekicking_FieldGoalsAttempted>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalLong" STAT=$Placekicking_FieldGoalLong>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>

</IFTRUE>
###</RESULTS>###

</RESULTS>
<ELSE>
</IFGREATER>
</tbody>
</table>
<br /><br />


<VAR $whereClause = " AND Punts ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "PuntingAverage DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
<a name="punting"></a>
<h4>Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="" align="left">Name</th>
            <th scope="col" abbr="" align="center"># of Punts</th>
            <th scope="col" abbr="" align="center">Average</th>
            <th scope="col" abbr="" align="center">Blocked</th>
            <th scope="col" abbr="" align="center">Long</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Punting>

<IFGREATER $Punting_Punts 0>

<VAR $lastName = fixApostrophes($Punting_PlayerLastName)>
        <tr class="{$rowClass}">
            <td scope="row" abbr="Player Name" align="left">
                <a href="home.html?site=default&tpl=Player&ID={$Punting_PlayerID}" class="leadersNameLink">
                    {$Punting_PlayerFirstName} {$lastName}</a></td>
<ROW NAME=LeaderFootballCol STATFIELD="Punts" STAT=$Punting_Punts>
<VAR $puntAvg = round($Punting_PuntingAverage,1)>
<? $puntAvg = sprintf("%.1f", $puntAvg) ?>

<ROW NAME=LeaderFootballCol STATFIELD="PuntingAverage" STAT=$puntAvg>
<ROW NAME=LeaderFootballCol STATFIELD="PuntsBlocked" STAT=$Punting_PuntsBlocked>
<ROW NAME=LeaderFootballCol STATFIELD="PuntingLong" STAT=$Punting_PuntingLong>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>

</IFGREATER>
</RESULTS>
</IFGREATER>
</tbody>
</table>
<br /><br />



<VAR $whereClause = " AND ( Tackles ".chr(62)." 0 OR DefensiveInterceptions ".chr(62)." 0 )">
<VAR $lastName = fixApostrophes($Defense_PlayerLastName)>
<IFEMPTY $form_sort>
<VAR $sortClause = "Tackles DESC">
###<VAR $sortClause = "Name ASC">###
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<IFNOTEMPTY $form_debug>
query: {$TeamPlayerStats_query}
</IFNOTEMPTY>
<a name="defense"></a>
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="" align="left">Name</th>
            <th scope="col" abbr="" align="center">Int</th>
            <th scope="col" abbr="" align="center">Int Yds</th>
            <th scope="col" abbr="" align="center">Fum Rec</th>
            <th scope="col" abbr="" align="center">Fum Yds</th>
            <th scope="col" abbr="" align="center">Tkls</th>
            <th scope="col" abbr="" align="center">Asst tkl</th>
            <th scope="col" abbr="" align="center">Tot Tkls</th>
            <th scope="col" abbr="" align="center">Sacks</th>
            <th scope="col" abbr="" align="center">Sack Yds</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Defense>

<IFTRUE $Defense_DefensiveInterceptions != 0 || $Defense_InterceptionYards != 0 || $Defense_FumbleRecoveries != 0 || $Defense_FumbleRecYards != 0 || $Defense_Tackles != 0 || $Defense_Sacks != 0 || $Defense_SackYards != 0 >

<VAR $lastName = fixApostrophes($Defense_PlayerLastName)>
        <tr class="{$rowClass}">
            <td scope="row" abbr="Player Name" align="left">
                <a href="home.html?site=default&tpl=Player&ID={$Defense_PlayerID}" class="leadersNameLink">
                    {$Defense_PlayerFirstName}  {$lastName}</a></td>
<ROW NAME=LeaderFootballCol STATFIELD="DefensiveInterceptions" STAT=$Defense_DefensiveInterceptions>
<ROW NAME=LeaderFootballCol STATFIELD="InterceptionYards" STAT=$Defense_InterceptionYards>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecoveries" STAT=$Defense_FumbleRecoveries>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecYards" STAT=$Defense_FumbleRecYards>
<ROW NAME=LeaderFootballCol STATFIELD="Tackles" STAT=$Defense_Tackles>
<ROW NAME=LeaderFootballCol STATFIELD="Assists" STAT=$Defense_Assists>
<ROW NAME=LeaderFootballCol STATFIELD="TotalTackles" STAT=$Defense_TotalTackles>
<ROW NAME=LeaderFootballCol STATFIELD="Sacks" STAT=$Defense_Sacks>
<ROW NAME=LeaderFootballCol STATFIELD="SackYards" STAT=$Defense_SackYards>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>
</IFTRUE>
</RESULTS>
</IFGREATER>
</tbody>
</table>
<br /><br />
