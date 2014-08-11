<!-- TeamPlayer search box begin -->
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<table class="searchBoxTable"><tr><td>
<form name="searchbox" method=get action="{$externalURL}">
<input type="hidden" id="site" name="site" value="default">
<input type="hidden" id="tpl" name="tpl" value="Team">


<table align=left border="0" cellspacing="0" cellpadding="0" valign=top>
<tr><td valign=top rowspan=2 width=90>
<font class="searchTableLabelText"><b>DISPLAY</b></font>
<font class="searchTableDisplayOptions">
<input type="radio" name="SearchType" id="SearchType" value="Teams" onclick="changeType()" <IFEQUAL $form_SearchType "Teams">checked="checked"</IFEQUAL> />Teams
<br />
<input type="radio" name="SearchType" id="SearchType" value="Schedules" onclick="changeType()" <IFEQUAL $form_SearchType "Schedules">checked="checked"</IFEQUAL> />Schedules
<br />
<input type="radio" name="SearchType" id="SearchType" value="Standings" onclick="changeType()" <IFEQUAL $form_SearchType "Standings">checked="checked"</IFEQUAL> />Standings
<br />
<input type="radio" name="SearchType" id="SearchType" value="Leaders" onclick="changeType()" <IFEQUAL $form_SearchType "Leaders">checked="checked"</IFEQUAL> />Leaders
<br />
</font>
</td>
<td valign="top">
<font class="searchTableLabelText"><b>SPORT</b></font>
<select name="Sport" id="Sport" class="searchSelect" onChange="getTeams(this.value);" size="5">
<OPTION VALUE="">&amp;lt;Select sport&amp;gt;</OPTION>
<QUERY name=Sports>
<RESULTS list=Sports_rows prefix=Sport>
<option value="{$Sport_SportID}" <IFEQUAL $Sport_SportID $form_Sport>selected="selected"</IFEQUAL>>{$Sport_SportName}</option>
</RESULTS>
</select>
<div id="TeamSelect" name="TeamSelect" style="<?PHP if ($form_SearchType !="Teams" && $form_SearchType != "Schedules") { ?>display:none<?PHP } ?>">
<select id="TeamID" name="TeamID" class="searchSelect">
<IFNOTEMPTY $form_Sport>
<QUERY name=SportTeams SPORTID=$form_Sport>
<IFGREATER count($SportTeams_rows) 0>
<option value="">&amp;lt;Select team&amp;gt;</option>
<RESULTS list=SportTeams_rows prefix=Team>
<option value="{$Team_TeamID}" <IFEQUAL $Team_TeamID $form_TeamID>selected="selected"</IFEQUAL>>{$Team_TeamName}</option>
</RESULTS>
</IFGREATER>
</IFNOTEMPTY>
</select>
</div>

<div id="ConfSelect" name="ConfSelect" style="width=11em;<?PHP if($form_SearchType =="Teams" || $form_SearchType == "Schedules") { ?>display:none;<?PHP } ?>">
<font class="searchTableLabelText"><b>CONFERENCE</b></font>
<QUERY name=Conferences>
<IFGREATER count($Conferences_rows) 0>
<select id="ConferenceID" name="ConferenceID" class="searchSelect">
<option VALUE="">Conference</option>
<RESULTS list=Conferences_rows prefix=Conf>
<option value="{$Conf_ConferenceID}" <IFEQUAL $Conf_ConferenceID $form_ConferenceID>selected="selected"</IFEQUAL>>{$Conf_ConferenceName}</option>
</RESULTS>
</select>
</IFGREATER>
</div>



</td>


<td valign="top">
</td>
</tr>
<tr>
<td colspan="2" width="375">
<div id="dateSearch" <IFNOTEQUAL $form_SearchType "Schedules">style="display:none"</IFNOTEQUAL>>
<table cellpadding="0" cellspacing="0"><tr><td>
<font class="searchTableLabelText"><b>START DATE</b></font>
<input type="text" size="10" name="SearchDate" id="SearchDate" class="indextxt" value="<IFEMPTY $form_SearchDate><?PHP echo(date("m/d/y")); ?><ELSE>
<VAR $fmtDate = date("m/d/y",strtotime($form_SearchDate))>
{$fmtDate}</IFEMPTY>" size="8" />
<img src="http://denver-tpweb.newsengin.com/web/graphics/calendar.png" class="icon button" alt="Pick date." id="fromdateCal"
title="Click the icon to display calendar, arrow keys and &amp;lt;enter&amp;gt; to choose date, &amp;lt;esc&amp;gt; to close" onmouseover='setUpFromDateCal()' />
</td>
<td align=left>
<font class="searchTableLabelText"><b>END DATE</b></font>
<input type="text" size="10" name="SearchDateEnd" id="SearchDateEnd" class="indextxt" value="<IFEMPTY $form_SearchDateEnd><?PHP echo(date("m/d/y")); ?><ELSE>
<VAR $fmtDate = date("m/d/y",strtotime($form_SearchDateEnd))>{$fmtDate}</IFEMPTY>" size="8" />
<img src="http://denver-tpweb.newsengin.com/web/graphics/calendar.png" class="icon button" alt="Pick date." id="todateCal"
title="Click the icon to display calendar, arrow keys and &amp;lt;enter&amp;gt; to choose date, &amp;lt;esc&amp;gt; to close" onmouseover='setUpToDateCal()' />
</td>
</tr></table>
</div>
</td>
</tr>
<tr>
<td valign="top">
<font class="searchTableLabelText"><?PHP echo(chr(38)) ?>nbsp;</font>
<input type="button" value="Go" onClick="checkCriteria(document.searchbox)" />
</td>
</tr>
</table>
</form>
</td></tr>
</table>

 <div class="quicklinks">
<h4>Quicklinks</h4>
<!--
<h5>Boys Basketball</h5>
<ul>
	<li><a href="http://preps.denverpost.com/?schedule=-7&sport=basketball&sex=boys">View results from the past week</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=-1&sport=basketball&sex=boys">View yesterday's results</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=1&sport=basketball&sex=boys">View all today's games</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=7&sport=basketball&sex=boys">View all this week's games</a></li>
</ul>
-->
<!--
<h5>Girls Basketball</h5>
<ul>
	<li><a href="http://preps.denverpost.com/?schedule=-7&sport=basketball&sex=girls">View results from the past week</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=-1&sport=basketball&sex=girls">View yesterday's results</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=1&sport=basketball&sex=girls">View all today's games</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=7&sport=basketball&sex=girls">View all this week's games</a></li>
</ul>
-->


<h5>Football</h5>
<ul>
<li> <a href="http://preps.denverpost.com/?schedule=-7">View results from the past week</a>
<li><a href="http://preps.denverpost.com/?schedule=-1">View yesterday's results</a>
<li><a href="http://preps.denverpost.com/?schedule=1">View all today's games</a>
<li><a href="http://preps.denverpost.com/?schedule=7">View all this week's games</a>
</ul>

<!--
<h5>Baseball</h5>
<ul>
	<li><a href="http://preps.denverpost.com/?schedule=-7&sport=baseball">View results from the past week</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=-1&sport=baseball">View yesterday's results</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=1&sport=baseball">View all today's games</a></li>
	<li><a href="http://preps.denverpost.com/?schedule=7&sport=basebal">View all this week's games</a></li>
</ul>
 
<strong>Football Quicklinks</strong><br>
<a href="http://preps.denverpost.com/?schedule=-7">View results from the past week</a><br />
<a href="http://preps.denverpost.com/?schedule=-1">View yesterday's results</a><br />
<a href="http://preps.denverpost.com/?schedule=1">View all today's games</a><br />
<a href="http://preps.denverpost.com/?schedule=7">View all this week's games</a>
</p>
 -->
</div>

<!-- TeamPlayer search box end -->