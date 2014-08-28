<VAR $domainURL = "http://preps.denverpost.com">
<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyGoals">G: Goals</td>
<td id="keyAssists">A: Assists</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyPoints">Pts: Points</td>
</tr>

</table>
</div>
</td></tr>
</table>
<VAR $whereClause = " AND Points ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "Points DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<h4>Scoring</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Name</th>
            <th scope="col" align="center" abbr="">Goals</th>
            <th scope="col" align="center" abbr="">Assists</th>
            <th scope="col" align="center" abbr="">Points</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Scoring>

<IFGREATER ($Scoring_Points) 0>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<VAR $lastName = fixApostrophes($Scoring_PlayerLastName)>
<VAR $firstName = fixApostrophes($Scoring_PlayerFirstName)>
<?PHP
$player_name = $firstName . ' ' . $lastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Scoring_PlayerID}/" class="leadersNameLink">{$player_name}</a></td>
<ROW NAME=LeaderCol STATFIELD="Goals" STAT=$Scoring_Goals>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$Scoring_Assists>
<ROW NAME=LeaderCol STATFIELD="Points" STAT=$Scoring_Points>
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

<VAR $whereClause = " AND Saves ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "SavePercentage DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID SPORTYEAR=$sportYear>
<h4>Goalie Saves</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide500">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="left" abbr="">Name</th>
            <th scope="col" align="center" abbr="">SOG</th>
            <th scope="col" align="center"abbr="">Saves</th>
            <th scope="col" align="center"abbr="">GA</th>
            <th scope="col" align="center"abbr="">GAA</th>
            <th scope="col" align="center"abbr="">SV%</th>
        </tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Goalie>

<IFGREATER ($Goalie_Saves) 0>



<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<VAR $lastName = fixApostrophes($Goalie_PlayerLastName)>
<VAR $firstName = fixApostrophes($Goalie_PlayerFirstName)>
<?PHP
$player_name = $firstName . ' ' . $lastName;
$player_slug = slugify($player_name);
?>
<a href="{$domainURL}/players/{$player_slug}/{$Goalie_PlayerID}/" class="leadersNameLink">{$player_name}</a></td>
<ROW NAME=LeaderCol STATFIELD="ShotsOnGoal" STAT=$Goalie_ShotsOnGoal>
<ROW NAME=LeaderCol STATFIELD="Saves" STAT=$Goalie_Saves>
<ROW NAME=LeaderCol STATFIELD="Goals Allowed" STAT=$Goalie_GoalsAllowed>

<VAR $GoalieGAA = sprintf("%.3f", $Goalie_GoalsAgainstAverage)>
<ROW NAME=LeaderCol STATFIELD="Goals Allowed" STAT=$GoalieGAA>

<?php
if( 1.0 == $Goalie_SavePercentage) {
  $savePct = "1.000";
} else {
  $savePct = substr( sprintf( "%05.3f", $Goalie_SavePercentage), 1 );
}
?>
<ROW NAME=LeaderCol STATFIELD="SavePercentage" STAT=$savePct>
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
