<h3>Player Stats <span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span></h3>

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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
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

<IFGREATER ($Passing_PassAttempts) 0>
###here###
 <VAR $lastName = fixApostrophes($Passing_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="home.html?site=default&tpl=Player&ID={$Passing_PlayerID}" class="leadersNameLink">### target="_blank">###
{$Passing_PlayerFirstName} {$lastName}</a></th>
<VAR $compPct = round($Passing_PassCompletionPercentage,1)>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Rushing</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
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

<IFGREATER ($Rushing_RushingAttempts) 0>



<VAR $lastName = fixApostrophes($Rushing_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="home.html?site=default&tpl=Player&ID={$Rushing_PlayerID}" class="leadersNameLink">
{$Rushing_PlayerFirstName} {$lastName}</a></th>
<VAR $yardsAtt = round($Rushing_RushingYardsPerAttempt,1)>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Receiving</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
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

<IFGREATER ($Receiving_Receptions) 0>



 <VAR $lastName = fixApostrophes($Receiving_PlayerLastName)>
<tr class="{$rowClass}">
<th scope="row" abbr="Player Name">
<a href="home.html?site=default&tpl=Player&ID={$Receiving_PlayerID}" class="leadersNameLink">
{$Receiving_PlayerFirstName} {$lastName}</a></th>
<VAR $yardsCatch = round($Receiving_YardsPerCatch)>
<ROW NAME=LeaderFootballCol STATFIELD="Receptions" STAT=$Receiving_Receptions>
<ROW NAME=LeaderFootballCol STATFIELD="ReceivingYards" STAT=$Receiving_ReceivingYards>

<VAR $yardsCatch = round($Receiving_YardsPerCatch,1)>

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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<a name="placekicking"></a>
<h4>Placekicking</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-main">
            <th scope="col" abbr="" rowspan="2">Name</th>
            <th scope="col" abbr="XP" colspan="2">Extra Points</th>
            <th scope="col" abbr="FG" colspan="3">Field Goals</th>
        </tr>
        <tr id="header-sub">
            <th scope="col" abbr="XP-A">Attempted</th>
            <th scope="col" abbr="XP-M">Made</th>
            <th scope="col" abbr="FG-A">Attempted</th>
            <th scope="col" abbr="FG-M">Made</th>
            <th scope="col" abbr="FG-L">Long</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Placekicking>

<IFTRUE $Placekicking_FieldGoalsAttempted != 0 || $Placekicking_PointAfterTouchdownAttempts != 0 >

<VAR $lastName = fixApostrophes($Placekicking_PlayerLastName)>
        <tr class="{$rowClass}">
            <th scope="row" abbr="Player Name">
                <a href="home.html?site=default&tpl=Player&ID={$Placekicking_PlayerID}" class="leadersNameLink">
                    {$Placekicking_PlayerFirstName} {$lastName}</a></th>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdownAttempts" STAT=$Placekicking_PointAfterTouchdownAttempts>
<ROW NAME=LeaderFootballCol STATFIELD="PointAfterTouchdown" STAT=$Placekicking_PointAfterTouchdown>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsAttempted" STAT=$Placekicking_FieldGoalsAttempted>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalsMade" STAT=$Placekicking_FieldGoalsMade>
<ROW NAME=LeaderFootballCol STATFIELD="FieldGoalLong" STAT=$Placekicking_FieldGoalLong>
        </tr>
<IFEQUAL $rowClass "leadersRow trRow">
<VAR $rowClass = "leadersRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "leadersRow trRow">
</IFEQUAL>

</IFTRUE>

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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<a name="punting"></a>
<h4>Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr=""># of Punts</th>
            <th scope="col" abbr="">Average Yards</th>
            <th scope="col" abbr="">Blocked Punts</th>
            <th scope="col" abbr="">Long</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Punting>

<IFGREATER $Punting_Punts 0>

<VAR $lastName = fixApostrophes($Punting_PlayerLastName)>
        <tr class="{$rowClass}">
            <th scope="row" abbr="Player Name">
                <a href="home.html?site=default&tpl=Player&ID={$Punting_PlayerID}" class="leadersNameLink">
                    {$Punting_PlayerFirstName} {$lastName}</a></th>
<ROW NAME=LeaderFootballCol STATFIELD="Punts" STAT=$Punting_Punts>
<ROW NAME=LeaderFootballCol STATFIELD="PuntingAverage" STAT=$Punting_PuntingAverage>
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
<IFEMPTY $form_sort>
<VAR $sortClause = "DefensiveInterceptions DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<a name="defense"></a>
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Interceptions</th>
            <th scope="col" abbr="">Interception Return Yards</th>
            <th scope="col" abbr="">Fumble Recoveries</th>
            <th scope="col" abbr="">Fumble Return Yards</th>
            <th scope="col" abbr="">Tackles</th>
            <th scope="col" abbr="">Sacks</th>
            <th scope="col" abbr="">Sack Yards</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Defense>

<IFTRUE $Defense_DefensiveInterceptions != 0 || $Defense_InterceptionYards != 0 || $Defense_FumbleRecoveries != 0 || $Defense_FumbleRecYards != 0 || $Defense_Tackles != 0 || $Defense_Sacks != 0 || $Defense_SackYards != 0 >

<VAR $lastName = fixApostrophes($Defense_PlayerLastName)>
        <tr class="{$rowClass}">
            <th scope="row" abbr="Player Name">
                <a href="home.html?site=default&tpl=Player&ID={$Defense_PlayerID}" class="leadersNameLink">
                    {$Defense_PlayerFirstName}&nbsp;{$lastName}</a></th>
<ROW NAME=LeaderFootballCol STATFIELD="DefensiveInterceptions" STAT=$Defense_DefensiveInterceptions>
<ROW NAME=LeaderFootballCol STATFIELD="InterceptionYards" STAT=$Defense_InterceptionYards>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecoveries" STAT=$Defense_FumbleRecoveries>
<ROW NAME=LeaderFootballCol STATFIELD="FumbleRecYards" STAT=$Defense_FumbleRecYards>
<ROW NAME=LeaderFootballCol STATFIELD="Tackles" STAT=$Defense_Tackles>
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