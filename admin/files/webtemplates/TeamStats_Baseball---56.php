<VAR $domainURL = "http://preps.denverpost.com">
<h3>Team Stats</h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
    <tbody>
        <tr class="teamStatsHeader">
            <th scope="col" abbr="" align="center">Win %</th>
            <th scope="col" abbr="" align="center">Avg.</th>
            <th scope="col" abbr="" align="center">Slug %</th>
            <th scope="col" abbr="" align="center">H</th>
            <th scope="col" abbr="" align="center">2B</th>
            <th scope="col" abbr="" align="center">3B</th>
            <th scope="col" abbr="" align="center">HR</th>
            <th scope="col" abbr="" align="center">RBI</td>
            <th scope="col" abbr="" align="center">SB</th>
            <th scope="col" abbr="" align="center">ERA</th>
            <th scope="col" abbr="" align="center">W</th>
            <th scope="col" abbr="" align="center">SV</th>
            <th scope="col" abbr="" align="center">SHO</th>
            <th scope="col" abbr="" align="center">E</th>
            <th scope="col" abbr="" align="center">K</th>
            <th scope="col" abbr="" align="center">BB</th>
        </tr>
        <tr class="resultsText">
<VAR $winPct = trailingZeroes(round($TeamSeasonStats_WinningPercentage,3),3,true)>
<VAR $batAvg = trailingZeroes(round($TeamSeasonStats_BattingAverage,3),3,true)>
<VAR $slgPct = trailingZeroes(round($TeamSeasonStats_SluggingPercentage,3),3,true)>
<VAR $fldPct = trailingZeroes(round($TeamSeasonStats_FieldingPercentage,3),3,true)>
<VAR $era = trailingZeroes(round($TeamSeasonStats_EarnedRunAverage,2),2,true)>


<IFEQUAL $batAvg 1>
<VAR $btAvg = $batAvg>
<VAR $bAvg = 1>
<ELSE>
<VAR $bAvg = ($batAvg * 1000)>
<VAR $btAvg = ".$bAvg">
</IFEQUAL>
<IFEQUAL $bAvg 0>
<VAR $btAvg = ".000">
</IFEQUAL>

<IFEQUAL $winPct 1>
<VAR $wnPct = $winPct>
<VAR $wPct = 1>
<ELSE>
<VAR $wPct = ($winPct * 1000)>
<VAR $wnPct = ".$wPct">
</IFEQUAL>
<IFEQUAL $wPct 0>
<VAR $wnPct = ".000">
</IFEQUAL>

<IFEQUAL $slgPct 1>
<VAR $sPct = $slgPct>
<ELSE>
<VAR $slugPct = ($slgPct * 1000)>
<VAR $sPct = ".$slugPct">
</IFEQUAL>
<IFGREATER $slgPct 1>
<VAR $sPct = $slgPct>
</IFGREATER>
<IFEQUAL $slgPct 0>
<VAR $sPct = ".000">
</IFEQUAL>


<td align="center">{$wnPct}</td>
<td align="center">{$btAvg}</td>
<td align="center">{$sPct}</td>
<td align="center">{$TeamSeasonStats_TotalHits}</td>
<td align="center">{$TeamSeasonStats_Doubles}</td>
<td align="center">{$TeamSeasonStats_Triples}</td>
<td align="center">{$TeamSeasonStats_HomeRuns}</td>
<td align="center">{$TeamSeasonStats_RunsBattedIn}</td>
<td align="center">{$TeamSeasonStats_StolenBases}</td>
<td align="center">{$era}</td>
<td align="center">{$TeamSeasonStats_Win}</td>
<td align="center">{$TeamSeasonStats_Save}</td>
<td align="center">{$TeamSeasonStats_Shutout}</td>
<td align="center">{$TeamSeasonStats_TotalErrors}</td>
<td align="center">{$TeamSeasonStats_StrikeoutsPitched}</td>
<td align="center">{$TeamSeasonStats_WalksAllowed}</td>
</td>
        </tr>
    </tbody>
</table>
