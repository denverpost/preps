<VAR $domainURL = "http://preps.denverpost.com">
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Prep Basketball Season Stats</h2>
<h4>Per game</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="center" abbr="Pts">Points</th>
            <th scope="col" align="center" abbr="Reb">Rebounds</th>
            <th scope="col" align="center"  abbr="TO">Turnovers</th>
            <th scope="col" align="center"  abbr="Ast">Assists</th>
            <th scope="col" align="center"  abbr="BS">Blocks</th>
            <th scope="col" align="center"  abbr="St">Steals</th>
           </tr>
</td>        <tr class="schedRow trRow">
<!-- <td align="center">{$PlayerSeasonStats_Minutes}</td> -->
<? $pPG = sprintf("%.1f", $PlayerSeasonStats_PointsPerGame) ?>
<td align="center">{$pPG}</td>
<? $rPG = sprintf("%.1f", $PlayerSeasonStats_ReboundsPerGame) ?>
<td align="center">{$rPG}</td>
<? $tPG = sprintf("%.1f", $PlayerSeasonStats_TurnoversPerGame) ?>
<td align="center">{$tPG}</td>
<? $aPG = sprintf("%.1f", $PlayerSeasonStats_AssistsPerGame) ?>
<td align="center">{$aPG}</td>
<? $bsPG = sprintf("%.1f", $PlayerSeasonStats_BlockedShotsPerGame) ?>
<td align="center">{$bsPG}</td>
<? $stPG = sprintf("%.1f", $PlayerSeasonStats_StealsPerGame) ?>
<td align="center">{$stPG}</td>
</tr>
</tr>
</table>

<h4>Season scoring</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="center" abbr="Pts">Pts</th>
            <th scope="col" align="center" abbr="FGM">FGM</th>
            <th scope="col" align="center"  abbr="FGAtt">FGAtt</th>
            <th scope="col" align="center"  abbr="FG%">FG%</th>
            <th scope="col" align="center"  abbr="3PtM">3PtM</th>
            <th scope="col" align="center"  abbr="3PtAtt">3PtAtt</th>
            <th scope="col" align="center"  abbr="3Pt%">3Pt%</th>
            <th scope="col" align="center"  abbr="FtM">FtM</th>
            <th scope="col" align="center"  abbr="FtAtt">FtAtt</th>
            <th scope="col" align="center"  abbr="Ft%">Ft%</th>
           </tr>
        <tr class="schedRow trRow">
<!-- <td align="center">{$PlayerSeasonStats_Minutes}</td> -->
<? $fgPct = sprintf("%.1f", $PlayerSeasonStats_FieldGoalPercentage) ?>
<? $tpPct = sprintf("%.1f", $PlayerSeasonStats_ThreePointerPercentage) ?>
<? $ftPct = sprintf("%.1f", $PlayerSeasonStats_FreeThrowPercentage) ?>
<td align="center">{$PlayerSeasonStats_Points}</td>
<td align="center">{$PlayerSeasonStats_FieldGoalsMade}</td>
<td align="center">{$PlayerSeasonStats_FieldGoalsAttempted}</td>
<td align="center">{$fgPct}</td>
<td align="center">{$PlayerSeasonStats_ThreePointersMade}</td>
<td align="center">{$PlayerSeasonStats_ThreePointersAttempted}</td>
<td align="center">{$tpPct}</td>
<td align="center">{$PlayerSeasonStats_FreeThrowsMade}</td>
<td align="center">{$PlayerSeasonStats_FreeThrowsAttempted}</td>
<td align="center">{$ftPct}</td>
</tr>
</table>
<!-- begin second tier of stats -->
<h4>Other season stats</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="center" abbr="Reb">Rebounds</th>
            <th scope="col" align="center" abbr="PF">Fouls</th>
            <th scope="col" align="center"  abbr="Tch">Techs</th>
            <th scope="col" align="center"  abbr="TO">Turnovers</th>
            <th scope="col" align="center"  abbr="Ast">Assists</th>
            <th scope="col" align="center"  abbr="BS">Blocks</th>
            <th scope="col" align="center"  abbr="St">Steals</th>
           </tr>
</td></tr>

        <tr class="schedRow trRow">
<!-- <td align="center">{$PlayerSeasonStats_Minutes}</td> -->
<td align="center">{$PlayerSeasonStats_TotalRebounds}</td>
<td align="center">{$PlayerSeasonStats_PersonalFouls}</td>
<td align="center">{$PlayerSeasonStats_Technicals}</td>
<td align="center">{$PlayerSeasonStats_Turnovers}</td>
<td align="center">{$PlayerSeasonStats_Assists}</td>
<td align="center">{$PlayerSeasonStats_BlockedShots}</td>
<td align="center">{$PlayerSeasonStats_Steals}</td>
</tr>
</table>


### ------------------------------------------------------------------------ ###
### Game-By-Game ###
### ------------------------------------------------------------------------ ###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Game-By-Game Basketball Stats</h2>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
        	<th scope="col" align="left" abbr="">Date</th>
            <th scope="col" align="left" abbr="">Opponent</th>
            <th scope="col" abbr="" align="center">Pts</th>
            <th scope="col" abbr="" align="center">FG</th>
            <th scope="col" abbr="" align="center">3Pt</th>
            <th scope="col" abbr="" align="center">FT</th>
            <th scope="col" abbr="" align="center">Reb</th>
            <th scope="col" abbr="" align="center">PF</th>
            <th scope="col" abbr="" align="center">TF</th>
            <th scope="col" abbr="" align="center">TO</th>
            <th scope="col" abbr="" align="center">Asst</th>
            <th scope="col" abbr="" align="center">BS</th>
            <th scope="col" abbr="" align="center">St</th>
        </tr>
  <IFGREATER count($PlayerGameStats_rows) 0>
  <VAR $rowClass="leadersRow trRow">
  <RESULTS list=PlayerGameStats_rows prefix=PlayerGameStats>
  <tr class="{$rowClass}">
  			<VAR $dateDisplay = date("F j",strtotime($PlayerGameStats_GameDate))>
{$dateTimeDisplay}
            <? $fgPct = sprintf("%.1f", $PlayerGameStats_FieldGoalPercentage) ?>
            <? $tpPct = sprintf("%.1f", $PlayerGameStats_ThreePointerPercentage) ?>
            <? $ftPct = sprintf("%.1f", $PlayerGameStats_FreeThrowPercentage) ?>
            <td align="left"><a href="{$domainURL}/boxscores/{$PlayerGameStats_GamePlyrGameID}/">{$dateDisplay}</a></td>
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
            <td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameHomeTeamID}">
<ELSE>
            <td align="left"><a href="{$externalURL}site=default&tpl=Team&TeamID={$PlayerGameStats_GameAwayTeamID}">
</IFEQUAL>
<IFEQUAL $Player_SchoolName $PlayerGameStats_AwayTeamName>
    {$PlayerGameStats_HomeTeamName}
<ELSE>
    {$PlayerGameStats_AwayTeamName}
</IFEQUAL>
    </a></td>
            <td align="center">{$PlayerGameStats_Points}</td>
            <td align="center">{$PlayerGameStats_FieldGoalsMade}-{$PlayerGameStats_FieldGoalsAttempted}</td>
            <td align="center">{$PlayerGameStats_ThreePointersMade}-{$PlayerGameStats_ThreePointersAttempted}</td>
            <td align="center">{$PlayerGameStats_FreeThrowsMade}-{$PlayerGameStats_FreeThrowsAttempted}</td>
            <td align="center">{$PlayerGameStats_TotalRebounds}</td>
            <td align="center">{$PlayerGameStats_PersonalFouls}</td>
            <td align="center">{$PlayerGameStats_Technicals}</td>
            <td align="center">{$PlayerGameStats_Turnovers}</td>
            <td align="center">{$PlayerGameStats_Assists}</td>
            <td align="center">{$PlayerGameStats_BlockedShots}</td>
            <td align="center">{$PlayerGameStats_Steals}</td>
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
