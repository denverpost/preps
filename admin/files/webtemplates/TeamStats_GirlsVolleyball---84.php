<VAR $domainURL = "http://preps.denverpost.com">
<h3>Team Stats</h3>
<IFGREATER $TeamSeasonStats_TotalAttempts 0>
<VAR $hitPercentage = round(($TeamSeasonStats_TotalKills-$TeamSeasonStats_TotalErrors)/$TeamSeasonStats_TotalAttempts,2)>
<ELSE>
<VAR $hitPercentage = "-">
</IFGREATER>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe">
<tbody><tr id="header-sub">
<th scope="col" abbr="" align="center">Matches</th>
<th scope="col" abbr="" align="center">Kill</th>
<th scope="col" abbr="" align="center">Err</th>
<th scope="col" abbr="" align="center">Att</th>
<th scope="col" abbr="" align="center">H%</th>
<th scope="col" abbr="" align="center">Asst</th>
<th scope="col" abbr="" align="center">Ace</th>
<th scope="col" abbr="" align="center">SvcErr</th>
<th scope="col" abbr="" align="center">RecErr</th>
<th scope="col" abbr="" align="center">Digs</th>
<th scope="col" abbr="" align="center">BlkSolo</th>
<th scope="col" abbr="" align="center">BlkAsst</th>
<th scope="col" abbr="" align="center">BlkErr</th>
<th scope="col" abbr="" align="center">BHE</th>
</tr>
<tr class="resultsText">
<td align="center">{$TeamSeasonStats_TeamGames}</td>
<td align="center">{$TeamSeasonStats_TotalKills}</td>
<td align="center">{$TeamSeasonStats_TotalErrors}</td>
<td align="center">{$TeamSeasonStats_TotalAttempts}</td>
<td align="center">{$hitPercentage}</td>
<td align="center">{$TeamSeasonStats_Assists}</td>
<td align="center">{$TeamSeasonStats_ServiceAces}</td>
<td align="center">{$TeamSeasonStats_ServiceErrors}</td>
<td align="center">{$TeamSeasonStats_ReceivingErrors}</td>
<td align="center">{$TeamSeasonStats_Digs}</td>
<td align="center">{$TeamSeasonStats_BlockSolos}</td>
<td align="center">{$TeamSeasonStats_BlockAssists}</td>
<td align="center">{$TeamSeasonStats_BlockErrors}</td>
<td align="center">{$TeamSeasonStats_BallHandlingErrors}</td>
</tr>
</tbody>
</table>