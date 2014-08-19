<VAR $domainURL = "http://preps.denverpost.com">
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Football Season Stats</h2>
<IFGREATER $PlayerSeasonStats_PassAttempts 0>
<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="center" abbr="Comp">Comp</th>
            <th scope="col" align="center" abbr="Att">Att</th>
            <th scope="col" align="center" abbr="Pct">Pct</th>
            <th scope="col" align="center" abbr="Yds">Yds</th>
            <th scope="col" align="center" abbr="TD">TD</th>
            <th scope="col" align="center" abbr="INT">INT</th>
        </tr>
        <tr class="schedRow trRow">
            <VAR $compPct = round($PlayerSeasonStats_PassCompletionPercentage,1)>
            <td align="center">{$PlayerSeasonStats_PassCompletions}</td>
            <td align="center">{$PlayerSeasonStats_PassAttempts}</td>
            <td align="center">{$compPct}</td>
<?php
$passingYardsFormatted =  $PlayerSeasonStats_PassingYards;
$passingYardsFormatted = number_format($passingYardsFormatted);
$passingYardsFormatted = sprintf("%s", $passingYardsFormatted);
?>
            <td align="center">{$passingYardsFormatted}</td>
            <td align="center">{$PlayerSeasonStats_PassingTouchdowns}</td>
            <td align="center">{$PlayerSeasonStats_PassingInterceptions}</td>
        </tr>
    </tbody>
</table>
</IFGREATER>

<IFTRUE $PlayerSeasonStats_RushingAttempts != 0 || $PlayerSeasonStats_Receptions != 0 >
<h4>Rushing/Receiving</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="center" abbr="Att">Rush</th>
            <th scope="col" align="center" abbr="Yds">Yards</th>
            <th scope="col" align="center" abbr="Yds/Att">AVG</th>
            <th scope="col" align="center" abbr="Long">Long</th>
            <th scope="col" align="center" abbr="TD">TD</th>
            <th scope="col" align="center" abbr="">Rec</th>
            <th scope="col" align="center" abbr="">Yds</th>
            <th scope="col" align="center" abbr="">Avg</th>
            <th scope="col" align="center" abbr="">Long</th>
            <th scope="col" align="center" abbr="">TD</th>
        </tr>
        <tr class="schedRow trRow">
<VAR $yardsAtt = round($PlayerSeasonStats_RushingYardsPerAttempt,1)>
            <td align="center">{$PlayerSeasonStats_RushingAttempts}</td>

<?php
$rushingYardsFormatted =  $PlayerSeasonStats_RushingYards;
$rushingYardsFormatted = number_format($rushingYardsFormatted);
$rushingYardsFormatted = sprintf("%s", $rushingYardsFormatted);
?>
 
          ###  <td>{$PlayerSeasonStats_RushingYards}</td>###
            <td align="center">{$rushingYardsFormatted}</td>
            <td align="center">{$yardsAtt}</td>
            <td align="center">{$PlayerSeasonStats_RushingLong}</td>
            <td align="center">{$PlayerSeasonStats_RushingTouchdowns}</td>
            <VAR $yardsCatch = round($PlayerSeasonStats_YardsPerCatch,1)>
            <td align="center">{$PlayerSeasonStats_Receptions}</td>
<?php
$receivingYardsFormatted =  $PlayerSeasonStats_ReceivingYards;
$receivingYardsFormatted = number_format($receivingYardsFormatted);
$receivingYardsFormatted = sprintf("%s", $receivingYardsFormatted);
?>
            <td align="center">{$receivingYardsFormatted}</td>
            <td align="center">{$yardsCatch}</td>
            <td align="center">{$PlayerSeasonStats_ReceptionLong}</td>
            <td align="center">{$PlayerSeasonStats_ReceivingTouchdowns}</td>
        </tr>
    </tbody>
</table>
</IFTRUE>

<IFTRUE $PlayerSeasonStats_DefensiveInterceptions != 0 || $PlayerSeasonStats_InterceptionYards != 0 || $PlayerSeasonStats_FumbleRecoveries != 0 || PlayerSeasonStats_FumbleRecYards != 0 || $PlayerSeasonStats_TotalTackles != 0 || $PlayerSeasonStats_Tackles != 0 || $PlayerSeasonStats_Sacks != 0 || $PlayerSeasonStats_SackYards != 0 || $PlayerSeasonStats_Assists != 0 >
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub">
        	<th scope="col" align="center" abbr="TotTckls">Tack</th>
            <th scope="col" align="center" abbr="T">Solo</th>
            <th scope="col" align="center" abbr="Ast">Asst</th>
            <th scope="col" align="center" abbr="S">Sacks</th>
            <th scope="col" align="center" abbr="SY">Yards</th>
            <th scope="col" align="center" abbr="FUM">FR</th>
            <th scope="col" align="center" abbr="RUBR">Yards</th>
            <th scope="col" align="center" abbr="INT">Int</th>
            <th scope="col" align="center" abbr="INTR">Yards</th>
        </tr>
        <tr class="schedRow trRow">
            <td align="center">{$PlayerSeasonStats_TotalTackles}</td>
            <td align="center">{$PlayerSeasonStats_Tackles}</td>
            <td align="center">{$PlayerSeasonStats_Assists}</td>
            <td align="center">{$PlayerSeasonStats_Sacks}</td>
            <td align="center">{$PlayerSeasonStats_SackYards}</td>
            <td align="center">{$PlayerSeasonStats_FumbleRecoveries}</td>
            <td align="center">{$PlayerSeasonStats_FumbleRecYards}</td>
            <td align="center">{$PlayerSeasonStats_DefensiveInterceptions}</td>
            <td align="center">{$PlayerSeasonStats_InterceptionYards}</td>
        </tr>
    </tbody>
</table>
</IFTRUE>

<IFTRUE $PlayerSeasonStats_FieldGoalsAttempted != 0 || $PlayerSeasonStats_PointAfterTouchdownAttempts != 0 || $PlayerSeasonStats_Punts != 0 >
<h4>Kicking/Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="center" abbr="">XPM</th>
            <th scope="col" align="center" abbr="">XPA</th>
            <th scope="col" align="center" abbr="">FGA</th>
            <th scope="col" align="center" abbr="">FGM</th>
            <th scope="col" align="center" abbr="">Long</th>
            <th scope="col" align="center" abbr="">Punts</th>
            <th scope="col" align="center" abbr="">Avg</th>
            <th scope="col" align="center" abbr="">Blk</th>
            <th scope="col" align="center" abbr="">Long</th>
        </tr>
        <tr class="schedRow trRow">
            <td align="center">{$PlayerSeasonStats_PointAfterTouchdown}</td>
            <td align="center">{$PlayerSeasonStats_PointAfterTouchdownAttempts}</td>
            <td align="center">{$PlayerSeasonStats_FieldGoalsMade}</td>
            <td align="center">{$PlayerSeasonStats_FieldGoalsAttempted}</td>
            <td align="center">{$PlayerSeasonStats_FieldGoalLong}</td>
<VAR $puntAvg = round($PlayerSeasonStats_PuntingAverage,1)>
<? $puntAvg = sprintf("%.1f", $puntAvg) ?>
            <td align="center">{$PlayerSeasonStats_Punts}</td>
            <td align="center">{$puntAvg}</td>
            <td align="center">{$PlayerSeasonStats_PuntsBlocked}</td>
            <td align="center">{$PlayerSeasonStats_PuntingLong}</td>
        </tr>
    </tbody>
</table>
</IFTRUE>





### ------------------------------------------------------------------------ ###
### Game-By-Game ###
### ------------------------------------------------------------------------ ###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Football Game-by-Game Stats</h2>

<IFGREATER $PlayerSeasonStats_PassAttempts 0>
<h4>Passing</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" align="center" abbr="Comp">Comp</th>
            <th scope="col" align="center" abbr="Att">Att</th>
            <th scope="col" align="center" abbr="Pct">Pct</th>
            <th scope="col" align="center" abbr="Yds">Yds</th>
            <th scope="col" align="center" abbr="TD">TD</th>
            <th scope="col" align="center" abbr="INT">INT</th>
        </tr>
<IFGREATER count($PlayerGameStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
		<tr class="{$rowClass}">
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <td align="left"><a href="{$domainURL}/boxscores/{$PlayerGameStats_GamePlyrGameID}/">{$dateDisplay}</a></td>
<IFNOTEQUAL trim($Player_SchoolName) trim($PlayerGameStats_AwayTeamName)>
<VAR $PlayerGameStats_AwayTeamName = trim($PlayerGameStats_AwayTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">{$PlayerGameStats_AwayTeamName}
<ELSE>
<VAR $PlayerGameStats_HomeTeamName = trim($PlayerGameStats_HomeTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">{$PlayerGameStats_HomeTeamName}
</IFNOTEQUAL>            
    </a></td>
            <VAR $compPct = round($PlayerGameStats_PassCompletionPercentage,1)>
            <td align="center">{$PlayerGameStats_PassCompletions}</td>
            <td align="center">{$PlayerGameStats_PassAttempts}</td>
            <td align="center">{$compPct}</td>
            <td align="center">{$PlayerGameStats_PassingYards}</td>
            <td align="center">{$PlayerGameStats_PassingTouchdowns}</td>
            <td align="center">{$PlayerGameStats_PassingInterceptions}</td>
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
<ELSE>
</IFGREATER>

<IFTRUE $PlayerSeasonStats_RushingAttempts != 0 || $PlayerSeasonStats_Receptions != 0 >
<h4>Rushing/Receiving</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" align="center" abbr="Att">Rush</th>
            <th scope="col" align="center" abbr="Yds">Yards</th>
            <th scope="col" align="center" abbr="Yds/Att">AVG</th>
            <th scope="col" align="center" abbr="Long">Long</th>
            <th scope="col" align="center" abbr="TD">TD</th>
            <th scope="col" align="center" abbr="">Rec</th>
            <th scope="col" align="center" abbr="">Yds</th>
            <th scope="col" align="center" abbr="">Avg</th>
            <th scope="col" align="center" abbr="">Long</th>
            <th scope="col" align="center" abbr="">TD</th>
        </tr>
<IFGREATER count($PlayerGameStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
		<tr class="{$rowClass}">
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <td align="left"><a href="{$domainURL}/boxscores/{$PlayerGameStats_GamePlyrGameID}/">{$dateDisplay}</a></td>
<IFNOTEQUAL trim($Player_SchoolName) trim($PlayerGameStats_AwayTeamName)>
<VAR $PlayerGameStats_AwayTeamName = trim($PlayerGameStats_AwayTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">{$PlayerGameStats_AwayTeamName}
<ELSE>
<VAR $PlayerGameStats_HomeTeamName = trim($PlayerGameStats_HomeTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">{$PlayerGameStats_HomeTeamName}
</IFNOTEQUAL>    
    </a></td>
<VAR $yardsAtt = round($PlayerGameStats_RushingYardsPerAttempt,1)>
            <td align="center">{$PlayerGameStats_RushingAttempts}</td>
            <td align="center">{$PlayerGameStats_RushingYards}</td>
            <td align="center">{$yardsAtt}</td>
            <td align="center">{$PlayerGameStats_RushingLong}</td>
            <td align="center">{$PlayerGameStats_RushingTouchdowns}</td>
<VAR $yardsCatch = round($PlayerGameStats_YardsPerCatch,1)>
            <td align="center">{$PlayerGameStats_Receptions}</td>
            <td align="center">{$PlayerGameStats_ReceivingYards}</td>
            <td align="center">{$yardsCatch}</td>
            <td align="center">{$PlayerGameStats_ReceptionLong}</td>
            <td align="center">{$PlayerGameStats_ReceivingTouchdowns}</td>
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
<ELSE>
</IFGREATER>

<IFTRUE $PlayerSeasonStats_DefensiveInterceptions != 0 || $PlayerSeasonStats_InterceptionYards != 0 || $PlayerSeasonStats_FumbleRecoveries != 0 || PlayerSeasonStats_FumbleRecYards != 0 || $PlayerSeasonStats_Tackles != 0 || $PlayerSeasonStats_Sacks != 0 || $PlayerSeasonStats_SackYards != 0 >
<h4>Defense</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" align="center" abbr="TotTckls">Tack</th>
            <th scope="col" align="center" abbr="T">Solo</th>
            <th scope="col" align="center" abbr="Ast">Asst</th>
            <th scope="col" align="center" abbr="S">Sacks</th>
            <th scope="col" align="center" abbr="SY">Yards</th>
            <th scope="col" align="center" abbr="FUM">FR</th>
            <th scope="col" align="center" abbr="RUBR">Yards</th>
            <th scope="col" align="center" abbr="INT">Int</th>
            <th scope="col" align="center" abbr="INTR">Yards</th>
        </tr>
<IFGREATER count($PlayerGameStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
		<tr class="{$rowClass}">
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <td align="left"><a href="{$domainURL}/boxscores/{$PlayerGameStats_GamePlyrGameID}/">{$dateDisplay}</a></td>
<IFNOTEQUAL trim($Player_SchoolName) trim($PlayerGameStats_AwayTeamName)>
<VAR $PlayerGameStats_AwayTeamName = trim($PlayerGameStats_AwayTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">{$PlayerGameStats_AwayTeamName}
<ELSE>
<VAR $PlayerGameStats_HomeTeamName = trim($PlayerGameStats_HomeTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">{$PlayerGameStats_HomeTeamName}
</IFNOTEQUAL>    
    </a></td>
            <td align="center">{$PlayerGameStats_TotalTackles}</td>
            <td align="center">{$PlayerGameStats_Tackles}</td>
            <td align="center">{$PlayerGameStats_Assists}</td>
            <td align="center">{$PlayerGameStats_Sacks}</td>
            <td align="center">{$PlayerGameStats_SackYards}</td>
            <td align="center">{$PlayerGameStats_FumbleRecoveries}</td>
            <td align="center">{$PlayerGameStats_FumbleRecYards}</td>
            <td align="center">{$PlayerGameStats_DefensiveInterceptions}</td>
            <td align="center">{$PlayerGameStats_InterceptionYards}</td>
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
<ELSE>
</IFGREATER>

<IFTRUE $PlayerGameStats_FieldGoalsAttempted != 0 || $PlayerGameStats_PointAfterTouchdownAttempts != 0 || $PlayerGameStats_Punts != 0 >
<h4>Kicking/Punting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" align="center" abbr="">XPM</th>
            <th scope="col" align="center" abbr="">XPA</th>
            <th scope="col" align="center" abbr="">FGA</th>
            <th scope="col" align="center" abbr="">FGM</th>
            <th scope="col" align="center" abbr="">Long</th>
            <th scope="col" align="center" abbr="">Punts</th>
            <th scope="col" align="center" abbr="">Avg</th>
            <th scope="col" align="center" abbr="">Blk</th>
            <th scope="col" align="center" abbr="">Long</th>
        </tr>
        <IFGREATER count($PlayerGameStats_rows) 0>
<VAR $rowClass="leadersRow trRow">
<RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
		<tr class="{$rowClass}">
<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <td align="left"><a href="{$domainURL}/boxscores/{$PlayerGameStats_GamePlyrGameID}/">{$dateDisplay}</a></td>
<IFNOTEQUAL trim($Player_SchoolName) trim($PlayerGameStats_AwayTeamName)>
<VAR $PlayerGameStats_AwayTeamName = trim($PlayerGameStats_AwayTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">{$PlayerGameStats_AwayTeamName}
<ELSE>
<VAR $PlayerGameStats_HomeTeamName = trim($PlayerGameStats_HomeTeamName)>
<td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">{$PlayerGameStats_HomeTeamName}
</IFNOTEQUAL>  
    </a></td>
            <td align="center">{$PlayerGameStats_PointAfterTouchdown}</td>
            <td align="center">{$PlayerGameStats_PointAfterTouchdownAttempts}</td>
            <td align="center">{$PlayerGameStats_FieldGoalsMade}</td>
            <td align="center">{$PlayerGameStats_FieldGoalsAttempted}</td>
            <td align="center">{$PlayerGameStats_FieldGoalLong}</td>
<VAR $puntGAvg = round($PlayerGameStats_PuntingAverage,1)>
<? $puntGAvg = sprintf("%.1f", $puntGAvg) ?>
            <td align="center">{$PlayerGameStats_Punts}</td>
            <td align="center">{$puntGAvg}</td>
            <td align="center">{$PlayerGameStats_PuntsBlocked}</td>
            <td align="center">{$PlayerGameStats_PuntingLong}</td>
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
<ELSE>
</IFGREATER>
