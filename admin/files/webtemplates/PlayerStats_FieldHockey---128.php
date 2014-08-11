<br/><br/><h2>Field Hockey Season Stats</h2>
<span id="showKey"><a href="javascript:showKey('statKey')" class="keyButton">Show key</a></span>
<span id="hideKey" style="display:none"><a href="javascript:hideKey('statKey')" class="keyButton">Hide key</a></span>

<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
<tr><td COLSPAN=50>
<div id="statKey" style="display:none">
<table class="keyTable" cellpadding="0" cellspacing="0">
<tr class="statKeyRow">
<td id="keyGoalsAllowed">GA: Goals Allowed</td>
<td id="keySaves">SV: Saves</td>
</tr>
<tr class="statKeyRowAlt">
<td id="keyGoals">G: Goals</td>
<td id="keyAssists">A: Assists</td>
</tr>
</table>
</div>
</td></tr>
<tr id="header-sub" class="resultsText">
<td onmouseover="highlightKey('keyGoals')" onmouseout = "unHighlightKey('keyGoals')">G</td>
<td onmouseover="highlightKey('keyAssists')" onmouseout = "unHighlightKey('keyAssists')">A</td>
<td onmouseover="highlightKey('keyGoalsAllowed')" onmouseout = "unHighlightKey('keyGoalsAllowed')">GA</td>
<td onmouseover="highlightKey('keySaves')" onmouseout = "unHighlightKey('keySaves')">SV</td>
</tr>
        <tr class="schedRow trRow">
<td>{$PlayerSeasonStats_Goals}</td>
<td>{$PlayerSeasonStats_Assists}</td>
<td>{$PlayerSeasonStats_GoalsAllowed}</td>
<td>{$PlayerSeasonStats_Saves}</td>
</tr>
</tbody>
</table>
