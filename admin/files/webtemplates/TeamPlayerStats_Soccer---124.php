<h3>Player Stats</h3>
<table cellpadding="0" cellspacing="0" class="leadersTable" width="100%">
<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyMinutes">Min: Minutes</td>
<td id="keySavePercentage">Save Pct: Save Percentage</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyGoalsAgainstAverage">GAA: Goals Against Average</td>
<td id="keyBlank"> </td>
</tr>
</table>
</div>
</td></tr>

</table>

### Goalkeeping ###
<VAR $whereClause = " AND GoalkeeperMinutes ".chr(62)." 0">
<IFEMPTY $form_sort>
<VAR $sortClause = "GoalkeeperMinutes DESC">
<ELSE>
<VAR $sortClause = $form_sort." DESC">
</IFEMPTY>
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>

<h4>Goalkeeping</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide300">
	<tbody>
		<tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Goals Allowed</th>
            <th scope="col" abbr="">Saves</th>
            <th scope="col" abbr="">W</th>
            <th scope="col" abbr="">L</th>
            <th scope="col" abbr="">T</th>
		</tr>

<IFGREATER count($TeamPlayerStats_rows) 0>  
<VAR $rowClass="leadersRow">  
<RESULTS list=TeamPlayerStats_rows prefix=Goalkeeping> 
<IFTRUE $Goalkeeping_GoalsAllowed !=0 || $Goalkeeping_Saves !=0>
<VAR $playerName = fixApostrophes($Goalkeeping_PlayerFirstName." ".$Goalkeeping_PlayerLastName)>
		<tr class="{$rowClass}">
			<td>
				<a href="{$externalURL}?site=default&tpl=Player&ID={$Goalkeeping_PlayerID}" class="leadersNameLink" target="_blank">
				{$playerName}</a></td>
<ROW NAME=LeaderCol STATFIELD="GoalsAllowed" STAT=$Goalkeeping_GoalsAllowed>
<ROW NAME=LeaderCol STATFIELD="Saves" STAT=$Goalkeeping_Saves>
<ROW NAME=LeaderCol STATFIELD="W" STAT=$Goalkeeping_GoalieWin>
<ROW NAME=LeaderCol STATFIELD="L" STAT=$Goalkeeping_GoalieLoss>
<ROW NAME=LeaderCol STATFIELD="T" STAT=$Goalkeeping_GoalieTie>
		</tr>
<IFEQUAL $rowClass "leadersRow"> 
<VAR $rowClass = "leadersRowAlternate"> 
<ELSE>
<VAR $rowClass = "leadersRow"> 
</IFEQUAL> 
</IFTRUE>
</RESULTS> 
</IFGREATER>
	</tbody>
</table>

<br /><br />

### Offense ###
<VAR $whereClause = " AND Points ".chr(62)." 0">
<IFEMPTY $form_sort>  
<VAR $sortClause = "Points DESC"> 
<ELSE>
<VAR $sortClause = $form_sort." DESC"> 
</IFEMPTY> 
<QUERY name=TeamPlayerStats SPORTNAME=$sqlSportName SORT=$sortClause WHERECLAUSE=$whereClause TEAMID=$form_TeamID>
<h4>Offensive</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide300">
	<tbody>
		<tr id="header-sub" class="teamStatsHeader">
            <th scope="col" abbr="">Name</th>
            <th scope="col" abbr="">Goals</th>
            <th scope="col" abbr="">Assists</th>
		</tr>
<IFGREATER count($TeamPlayerStats_rows) 0> 
<VAR $rowClass = "leadersRow"> 
<RESULTS list=TeamPlayerStats_rows prefix=Offensive> 
<VAR $playerName = fixApostrophes($Offensive_PlayerFirstName." ".$Offensive_PlayerLastName)>
		<tr class="{$rowClass}">
			<td>
				<a href="{$externalURL}?site=default&tpl=Player&ID={$Offensive_PlayerID}" class="leadersNameLink" target="_blank">
{$playerName}</a></td>

<ROW NAME=LeaderCol STATFIELD="Goals" STAT=$Offensive_Goals>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$Offensive_Assists>
		</tr>
<IFEQUAL $rowClass "leadersRow"> 
<VAR $rowClass = "leadersRowAlternate"> 
<ELSE>
<VAR $rowClass = "leadersRow"> 
</IFEQUAL> 
</RESULTS> 
</IFGREATER> 
	</tbody>
</table>