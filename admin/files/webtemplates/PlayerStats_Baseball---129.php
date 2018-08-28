<VAR $domainURL = "http://preps.denverpost.com">
<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s {$sportName} Season Stats</h2>
<h4>Hitting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="" align="center">AVG</th>
            <th scope="col" abbr="" align="center">SLG</th>
            <th scope="col" abbr="" align="center">OBP</th>
            <th scope="col" abbr="" align="center">AB</th>
            <th scope="col" abbr="" align="center">H</th>
            <th scope="col" abbr="" align="center">2B</th>
            <th scope="col" abbr="" align="center">3B</th>
            <th scope="col" abbr="" align="center">HR</th>
            <th scope="col" abbr="" align="center">RBI</th>
            <th scope="col" abbr="" align="center">SBA</th>
            <th scope="col" abbr="" align="center">SB</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">BB</th>
            <th scope="col" abbr="" align="center">HBP</th>
        </tr>
        <tr>
<VAR $batAvg = trailingZeroes(round($PlayerSeasonStats_BattingAverage,3),3,true)>
<VAR $slPct = trailingZeroes(round($PlayerSeasonStats_SluggingPercentage,3),3,true)>
<VAR $obPct = trailingZeroes(round($PlayerSeasonStats_OnBasePercentage,3),3,true)>
<VAR $flPct = trailingZeroes(round($PlayerSeasonStats_FieldingPercentage,3),3,true)>


<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<IFGREATER 100 $bAvg>
<VAR $btAvg = ".0$bAvg">
<ELSE>
<VAR $btAvg = ".$bAvg">
</IFGREATER>
</IFEQUAL>

<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>

<ROW NAME=LeaderCol STATFIELD="BattingAverage" STAT=$btAvg>

<IFEQUAL $slPct 1>
<VAR $sPct = $slPct>
<ELSE>
<VAR $slugPct = ($slPct * 1000)>
<IFGREATER 100 $slugPct>
<VAR $sPct = ".0$slugPct">
<ELSE>
<VAR $sPct = ".$slugPct">
</IFGREATER>
</IFEQUAL>
<IFGREATER $slPct 1>
<VAR $sPct = $slPct>
</IFGREATER>
<IFEQUAL $slPct 0>
<VAR $sPct = ".000">
</IFEQUAL>
<ROW NAME=LeaderCol STATFIELD="SluggingPercentage" STAT=$sPct>

<IFEQUAL $obPct 1>
<VAR $oPct = $obPct>
<ELSE>
<VAR $obasePct = ($obPct * 1000)>
<IFGREATER 100 $obasePct>
<VAR $oPct = ".0$obasePct">
<ELSE>
<VAR $oPct = ".$obasePct">
</IFGREATER>
</IFEQUAL>
<IFGREATER $obPct 1>
<VAR $oPct = $obPct>
</IFGREATER>
<IFEQUAL $obPct 0>
<VAR $oPct = ".000">
</IFEQUAL>
<ROW NAME=LeaderCol STATFIELD="OnBasePercentage" STAT=$oPct>
<ROW NAME=LeaderCol STATFIELD="AtBats" STAT=$PlayerSeasonStats_AtBats>
<ROW NAME=LeaderCol STATFIELD="Hits" STAT=$PlayerSeasonStats_Hits>
<ROW NAME=LeaderCol STATFIELD="Doubles" STAT=$PlayerSeasonStats_Doubles>
<ROW NAME=LeaderCol STATFIELD="Triples" STAT=$PlayerSeasonStats_Triples>
<ROW NAME=LeaderCol STATFIELD="HomeRuns" STAT=$PlayerSeasonStats_HomeRuns>
<ROW NAME=LeaderCol STATFIELD="RunsBattedIn" STAT=$PlayerSeasonStats_RunsBattedIn>
<ROW NAME=LeaderCol STATFIELD="StolenBaseAttempts" STAT=$PlayerSeasonStats_StolenBaseAttempts>
<ROW NAME=LeaderCol STATFIELD="StolenBases" STAT=$PlayerSeasonStats_StolenBases>
<ROW NAME=LeaderCol STATFIELD="Errors" STAT=$PlayerSeasonStats_Errors>
<ROW NAME=LeaderCol STATFIELD="Walks" STAT=$PlayerSeasonStats_Walks>
<ROW NAME=LeaderCol STATFIELD="HitByPitch" STAT=$PlayerSeasonStats_HitByPitch>
        </tr>
    </tbody>
</table>


<VAR $ip = round($PlayerSeasonStats_InningsPitched,2)>

<IFGREATER $ip 0> ### DID THIS PLAYER PITCH AT ALL?###

<h4>Pitching</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" align="center" abbr="Innings Pitched">IP</th>
            <th scope="col" align="center" abbr="Runs Allowed">R</th>
            <th scope="col" align="center" abbr="Earned Runs">ER</th>
            <th scope="col" align="center" abbr="Earned Run Average">ERA</th>
            <th scope="col" align="center" abbr="Wins">W</th>
            <th scope="col" align="center" abbr="Losses">L</th>
            <th scope="col" align="center" abbr="Saves">Sv</th>
            <th scope="col" align="center" abbr="ShutOuts">SHO</th>
            <th scope="col" align="center" abbr="Complete Games">CG</th>
            <th scope="col" align="center" abbr="Hits Allowed">H</th>
            <th scope="col" align="center" abbr="Strike outs">K</th>
            <th scope="col" align="center" abbr="Walks">BB</th>
            <th scope="col" align="center" abbr="Hit By Pitch">HBP</th>
            <th scope="col" abbr="" align="center">WP</th>
        </tr>
        <tr>
<VAR $whole_Innings = (round($PlayerSeasonStats_InningsPitched - .5))>
###WHOLE INNINGS= {$whole_Innings}
INNINGS PITCHED = {$Pitching_InningsPitched}###
<VAR $partial_Innings = ($PlayerSeasonStats_InningsPitched - $whole_Innings)>
###PARTIAL INNINGS = {$partial_Innings}###
<IFEQUAL $partial_Innings 0>
<VAR $partial_Innings = ".0">
<ELSE>
<IFGREATER $partial_Innings .5>
<VAR $partial_Innings = ".2">
<ELSE>
<VAR $partial_Innings = ".1">
</IFGREATER>
</IFEQUAL>

<?php $ip = $whole_Innings.$partial_Innings;?>

<VAR $era = trailingZeroes(round($PlayerSeasonStats_EarnedRunAverage,2),2,true)>


<ROW NAME=LeaderCol STATFIELD="InningsPitched" STAT=$ip>
<ROW NAME=LeaderCol STATFIELD="RunsAllowed" STAT=$PlayerSeasonStats_RunsAllowed>
<ROW NAME=LeaderCol STATFIELD="Earned Runs" STAT=$PlayerSeasonStats_EarnedRuns>
<ROW NAME=LeaderCol STATFIELD="EarnedRunAverage" STAT=$era>
<ROW NAME=LeaderCol STATFIELD="Win" STAT=$PlayerSeasonStats_Win>
<ROW NAME=LeaderCol STATFIELD="Loss" STAT=$PlayerSeasonStats_Loss>
<ROW NAME=LeaderCol STATFIELD="Save" STAT=$PlayerSeasonStats_Save>
<ROW NAME=LeaderCol STATFIELD="Shutout" STAT=$PlayerSeasonStats_Shutout>
<ROW NAME=LeaderCol STATFIELD="CompleteGame" STAT=$PlayerSeasonStats_CompleteGame>
<ROW NAME=LeaderCol STATFIELD="HitsAllowed" STAT=$PlayerSeasonStats_HitsAllowed>
<ROW NAME=LeaderCol STATFIELD="StrikeoutsPitched" STAT=$PlayerSeasonStats_StrikeoutsPitched>
<ROW NAME=LeaderCol STATFIELD="WalksAllowed" STAT=$PlayerSeasonStats_WalksAllowed>
<ROW NAME=LeaderCol STATFIELD="HitByPitchAllowed" STAT=$PlayerSeasonStats_HitByPitchAllowed>
<ROW NAME=LeaderCol STATFIELD="WildPitch" STAT=$PlayerSeasonStats_WildPitch>
        </tr>
    </tbody>
</table>
<ELSE>
</IFGREATER>

<h4>Fielding</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="" align="center">Att.</th>
            <th scope="col" abbr="" align="center">PO</th>
            <th scope="col" abbr="" align="center">Ast</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">DP</th>
            <th scope="col" abbr="" align="center">Fld %</th>
            <th scope="col" abbr="" align="center">PB</th>
            <th scope="col" abbr="" align="center">SBA</th>
            <th scope="col" abbr="" align="center">RCS</th>
        </tr>
        <tr>
<VAR $flPct = trailingZeroes(round($PlayerSeasonStats_FieldingPercentage,3),3,true)>

<IFEQUAL $flPct 1>
<VAR $fldPct = $flPct>
<VAR $fldPct = 1.000>
<ELSE>
<VAR $fldPct = ($flPct * 1000)>
<IFGREATER 100 $fldPct>
<VAR $fldPct = ".0$fldPct">
<ELSE>
<VAR $fldPct = ".$fldPct">
</IFGREATER>
</IFEQUAL>

<ROW NAME=LeaderCol STATFIELD="TotalChances" STAT=$PlayerSeasonStats_TotalChances>
<ROW NAME=LeaderCol STATFIELD="TotalPutouts" STAT=$PlayerSeasonStats_TotalPutouts>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$PlayerSeasonStats_Assists>
<ROW NAME=LeaderCol STATFIELD="Errors" STAT=$PlayerSeasonStats_Errors>
<ROW NAME=LeaderCol STATFIELD="DoublePlays" STAT=$PlayerSeasonStats_DoublePlays>
<ROW NAME=LeaderCol STATFIELD="FieldingPercentage" STAT=$flPct>
<ROW NAME=LeaderCol STATFIELD="PassedBalls" STAT=$PlayerSeasonStats_PassedBalls>
<ROW NAME=LeaderCol STATFIELD="StolenBasesAgainst" STAT=$PlayerSeasonStats_StolenBasesAgainst>
<ROW NAME=LeaderCol STATFIELD="CaughtStealingRunners" STAT=$PlayerSeasonStats_CaughtStealingRunners>
        </tr>
    </tbody>
</table>











### ------------------------------------------------------------------------ ###
### Game-By-Game ###
### ------------------------------------------------------------------------ ###

<h2>{$Player_PlayerFirstName} {$Player_PlayerLastName}'s Game-By-Game {$sportName} Stats</h2>

<IFGREATER $PlayerSeasonStats_AtBats 0>

<h4>Hitting</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" abbr="" align="center">AB</th>
            <th scope="col" abbr="" align="center">R</th>
            <th scope="col" abbr="" align="center">H</th>
            <th scope="col" abbr="" align="center">2B</th>
            <th scope="col" abbr="" align="center">3B</th>
            <th scope="col" abbr="" align="center">HR</th>
            <th scope="col" abbr="" align="center">RBI</th>
            <th scope="col" abbr="" align="center">K</th>
            <th scope="col" abbr="" align="center">BB</th>
            <th scope="col" abbr="" align="center">HBP</th>
            <th scope="col" abbr="" align="center">SB</th>
            <th scope="col" abbr="" align="center">SBA</th>
            <th scope="col" abbr="" align="center">E</th>
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
<ROW NAME=LeaderCol STATFIELD="AtBats" STAT=$PlayerGameStats_AtBats>
<ROW NAME=LeaderCol STATFIELD="Runs" STAT=$PlayerGameStats_Runs>
<ROW NAME=LeaderCol STATFIELD="Hits" STAT=$PlayerGameStats_Hits>
<ROW NAME=LeaderCol STATFIELD="Doubles" STAT=$PlayerGameStats_Doubles>
<ROW NAME=LeaderCol STATFIELD="Triples" STAT=$PlayerGameStats_Triples>
<ROW NAME=LeaderCol STATFIELD="HomeRuns" STAT=$PlayerGameStats_HomeRuns>
<ROW NAME=LeaderCol STATFIELD="RunsBattedIn" STAT=$PlayerGameStats_RunsBattedIn>
<ROW NAME=LeaderCol STATFIELD="Strikeouts" STAT=$PlayerGameStats_Strikeouts>
<ROW NAME=LeaderCol STATFIELD="Walks" STAT=$PlayerGameStats_Walks>
<ROW NAME=LeaderCol STATFIELD="HitByPitch" STAT=$PlayerGameStats_HitByPitch>
<ROW NAME=LeaderCol STATFIELD="StolenBases" STAT=$PlayerGameStats_StolenBases>
<ROW NAME=LeaderCol STATFIELD="StolenBaseAttempts" STAT=$PlayerGameStats_StolenBaseAttempts>
<ROW NAME=LeaderCol STATFIELD="Errors" STAT=$PlayerGameStats_Errors>
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
</IFGREATER>

<IFGREATER $ip 0>
<h4>Pitching</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="teamStatsHeader">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" align="center" abbr="Innings Pitched">IP</th>
            <th scope="col" align="center" abbr="Runs">R</th>
            <th scope="col" align="center" abbr="Earned Runs">ER</th>
            <th scope="col" align="center" abbr="Wins">W</th>
            <th scope="col" align="center" abbr="Losses">L</th>
            <th scope="col" align="center" abbr="Saves">Sv</th>
###            <th scope="col" align="center" abbr="Save Percent">Sv %</th>###
###            <th scope="col" align="center" abbr="ShutOuts">SHO</th>###
###            <th scope="col" align="center" abbr="Complete Games">CG</th>###
            <th scope="col" align="center" abbr="Hits Allowed">H</th>
            <th scope="col" align="center" abbr="Strike outs">K</th>
            <th scope="col" align="center" abbr="Walks">BB</th>
            <th scope="col" align="center" abbr="Hit By Pitch">HBP</th>
            <th scope="col" align="center" abbr="Hit By Pitch">WP</th>
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

<VAR $ip = round($PlayerGameStats_InningsPitched,2)>

<VAR $whole_Innings = (round($PlayerGameStats_InningsPitched - .5))>
###WHOLE INNINGS= {$whole_Innings}
INNINGS PITCHED = {$Pitching_InningsPitched}###
<VAR $partial_Innings = ($PlayerGameStats_InningsPitched - $whole_Innings)>
###PARTIAL INNINGS = {$partial_Innings}###
<IFEQUAL $partial_Innings 0>
<VAR $partial_Innings = ".0">
<ELSE>
<IFGREATER $partial_Innings .5>
<VAR $partial_Innings = ".2">
<ELSE>
<VAR $partial_Innings = ".1">
</IFGREATER>
</IFEQUAL>

<?php $ip = $whole_Innings.$partial_Innings;?>


<ROW NAME=LeaderCol STATFIELD="InningsPitched" STAT=$ip>
<ROW NAME=LeaderCol STATFIELD="RunsAllowed" STAT=$PlayerGameStats_RunsAllowed>
<ROW NAME=LeaderCol STATFIELD="Earned Runs" STAT=$PlayerGameStats_EarnedRuns>
<ROW NAME=LeaderCol STATFIELD="Win" STAT=$PlayerGameStats_Win>
<ROW NAME=LeaderCol STATFIELD="Loss" STAT=$PlayerGameStats_Loss>
<ROW NAME=LeaderCol STATFIELD="Save" STAT=$PlayerGameStats_Save>
###<ROW NAME=LeaderCol STATFIELD="SavePercentage" STAT=$PlayerGameStats_SavePercentage>###
###<ROW NAME=LeaderCol STATFIELD="Shutout" STAT=$PlayerGameStats_Shutout>###
###<ROW NAME=LeaderCol STATFIELD="CompleteGame" STAT=$PlayerGameStats_CompleteGame>###
<ROW NAME=LeaderCol STATFIELD="HitsAllowed" STAT=$PlayerGameStats_HitsAllowed>
<ROW NAME=LeaderCol STATFIELD="StrikeoutsPitched" STAT=$PlayerGameStats_StrikeoutsPitched>
<ROW NAME=LeaderCol STATFIELD="WalksAllowed" STAT=$PlayerGameStats_WalksAllowed>
<ROW NAME=LeaderCol STATFIELD="HitByPitchAllowed" STAT=$PlayerGameStats_HitByPitchAllowed>
<ROW NAME=LeaderCol STATFIELD="WildPitch" STAT=$PlayerGameStats_WildPitch>
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



<IFGREATER $PlayerSeasonStats_TotalChances 0>
<h4>Fielding</h4>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" align="left" abbr="D">Date</th>
            <th scope="col" align="left" abbr="Opp">Opponent</th>
            <th scope="col" abbr="" align="center">Att.</th>
            <th scope="col" abbr="" align="center">PO</th>
            <th scope="col" abbr="" align="center">Ast</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">DP</th>
            <th scope="col" abbr="" align="center">PB</th>
            <th scope="col" abbr="" align="center">SBA</th>
            <th scope="col" abbr="" align="center">RCS</th>
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

<ROW NAME=LeaderCol STATFIELD="TotalChances" STAT=$PlayerGameStats_TotalChances>
<ROW NAME=LeaderCol STATFIELD="TotalPutouts" STAT=$PlayerGameStats_TotalPutouts>
<ROW NAME=LeaderCol STATFIELD="Assists" STAT=$PlayerGameStats_Assists>
<ROW NAME=LeaderCol STATFIELD="Errors" STAT=$PlayerGameStats_Errors>
<ROW NAME=LeaderCol STATFIELD="DoublePlays" STAT=$PlayerGameStats_DoublePlays>
<ROW NAME=LeaderCol STATFIELD="PassedBalls" STAT=$PlayerGameStats_PassedBalls>
<ROW NAME=LeaderCol STATFIELD="StolenBasesAgainst" STAT=$PlayerGameStats_StolenBasesAgainst>
<ROW NAME=LeaderCol STATFIELD="CaughtStealingRunners" STAT=$PlayerGameStats_CaughtStealingRunners>
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
