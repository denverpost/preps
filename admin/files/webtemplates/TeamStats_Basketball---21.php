<VAR $domainURL = "http://preps.denverpost.com">
###
<h3>Team Stats</h3>
<table cellpadding="0" cellspacing="0" class="teamStatTable deluxe wide400">
<tbody><tr id="header-sub">
<th scope="col" abbr="">Games</th>
<th scope="col" abbr="">Points</th>
<th scope="col" abbr="">FGM</th>
<th scope="col" abbr="">3PM</th>
<th scope="col" abbr="">FTM</th>
<th scope="col" abbr="">Reb</th>
</tr>
<tr class="resultsText">
###<VAR $yardsAtt = round($TeamSeasonStats_RushingYardsPerAttempt,2)>###
###<VAR $yardsCatch = round($TeamSeasonStats_YardsPerCatch,2)>###
<td align="right">{$TeamSeasonStats_Games}</td>
<td align="right">{$TeamSeasonStats_TotalPoints}</td>
<td align="right">{$TeamSeasonStats_FieldGoalsMade}</td>
<td align="right">{$TeamSeasonStats_ThreePointersMade}</td>
<td align="right">{$TeamSeasonStats_FreeThrowsMade}</td>
</td>
</tr>
</tbody>
</table>
###