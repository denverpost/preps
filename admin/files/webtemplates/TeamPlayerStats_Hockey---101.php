<VAR $domainURL = "http://preps.denverpost.com">
<h3>Player Stats</h3>
<VAR $whereClause = " AND Points ".chr(62)." 0">

<IFEMPTY $form_sort>
<VAR $sortClause = "Points DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Scoring</h4>
###<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe" width="50%">###
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide300">

<tbody><tr id="header-sub">
<th scope="col" abbr="" align="left">Name</th>
<th scope="col" abbr=""align="center">G</th>
<th scope="col" abbr="" align="center">A</th>
<th scope="col" abbr="" align="center">Pts</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Scoring>

<IFGREATER ($Scoring_Goals) 0>
###here###
 <VAR $lastName = fixApostrophes($Scoring_PlayerLastName)>
 <VAR $firstName = fixApostrophes($Scoring_PlayerFirstName)>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<a href="/home.html?site=default&tpl=Player&ID={$Scoring_PlayerID}" class="leadersNameLink">### target="_blank">###
{$firstName} {$lastName}</a></td>
<ROW NAME=LeaderFootballCol STATFIELD="Goals" STAT=$Scoring_Goals>
<ROW NAME=LeaderFootballCol STATFIELD="Assists" STAT=$Scoring_Assists>
<ROW NAME=LeaderFootballCol STATFIELD="Points" STAT=$Scoring_Points>
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
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Goalies</h4>
###<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">###
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide300">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Name</th>
<th scope="col" abbr="" align="center">Shots</th>
<th scope="col" abbr="" align="center">Svs</th>
<th scope="col" abbr="" align="center">Sv%</th>
</tr>
<IFGREATER count($TeamPlayerStats_rows) 0>
<VAR $rowClass = "leadersRow trRow">
<RESULTS list=TeamPlayerStats_rows prefix=Goalie>

<IFGREATER ($Goalie_Saves) 0>
<VAR $lastName = fixApostrophes($Goalie_PlayerLastName)>
<VAR $firstName = fixApostrophes($Goalie_PlayerFirstName)>
<tr class="{$rowClass}">
<td scope="row" abbr="Player Name">
<a href="/home.html?site=default&tpl=Player&ID={$Goalie_PlayerID}" class="leadersNameLink">
{$firstName} {$lastName}</a></td>
<VAR $shotsOnGoal = $Goalie_GoalsAllowed + $Goalie_Saves>
<VAR $savePct = round($Goalie_SavePercentage,3)>
###<? $savePct = ($Goalie_SavePercentage,3)>###
<? $svPct = sprintf("%.3f", $Goalie_SavePercentage) ?>
<ROW NAME=LeaderFootballCol STATFIELD="ShotsOnGoal" STAT=$shotsOnGoal>
<ROW NAME=LeaderFootballCol STATFIELD="Saves" STAT=$Goalie_Saves>
<ROW NAME=LeaderFootballCol STATFIELD="SavePercentage" STAT=$svPct>
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
