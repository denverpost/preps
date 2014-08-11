<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<TABLE><TR><TD>
<form name="teamsearch" method=get action="{$externalURL}">
<input type="hidden" name="site" value="default">
<input type="hidden" name="tpl" value="Team">
<table align=left border="0" cellspacing="0" cellpadding="0" valign=top>
<tr><td valign=top>
<font class="searchTableLabelText"><B>TEAMS</B></FONT><BR>
<SELECT NAME="Sport" ID="Sport" CLASS="searchSelect" onChange="getTeams(this.value)">
<OPTION VALUE="">Select sport</OPTION>
<QUERY name=Sports>
<RESULTS list=Sports_rows prefix=Sport>
<OPTION VALUE="{$Sport_SportID}" <IFEQUAL $Sport_SportID $form_Sport>SELECTED</IFEQUAL>>{$Sport_SportName}</OPTION>
</RESULTS>
</SELECT>
<BR>
<DIV ID="TeamSelect" NAME="TeamSelect">
<IFNOTEMPTY $form_Sport>
<QUERY name=SportTeams SPORTID=$form_Sport>
<IFGREATER count($SportTeams_rows) 0>
<SELECT ID="TeamID" NAME="TeamID" CLASS="searchSelect">
<OPTION VALUE="">Team</OPTION>
<RESULTS list=SportTeams_rows prefix=Team>
<OPTION VALUE="{$Team_TeamID}" <IFEQUAL $Team_TeamID $form_TeamID>SELECTED</IFEQUAL>>{$Team_TeamName}</OPTION>
</RESULTS>
</SELECT>
</IFGREATER>
</IFNOTEMPTY>
</DIV>
<BR>
<INPUT TYPE=BUTTON VALUE="Go" onClick="checkTeam(document.teamsearch)">
</td>
</tr>
</table>
</form>

</TD>
<TD>
<form name="standingsearch" method=get action="{$externalURL}">
<input type="hidden" name="site" value="default">
<input type="hidden" name="tpl" value="Standings">
<table align=left border="0" cellspacing="0" cellpadding="0" valign=top>
<tr><td valign=top>
<font class="searchTableLabelText"><B>STANDINGS</B></FONT><BR>
<SELECT NAME="Sport" ID="Sport" CLASS="searchSelect">
<OPTION VALUE="">Select sport</OPTION>
<RESULTS list=Sports_rows prefix=Sport>
<OPTION VALUE="{$Sport_SportID}" <IFEQUAL $Sport_SportID $form_Sport>SELECTED</IFEQUAL>>{$Sport_SportName}</OPTION>
</RESULTS>
</SELECT>
<BR>
<QUERY name=Conferences>
<IFGREATER count($Conferences_rows) 0>
<SELECT ID="ConferenceID" NAME="ConferenceID" CLASS="searchSelect">
<OPTION VALUE="">Conference</OPTION>
<RESULTS list=Conferences_rows prefix=Conf>
<OPTION VALUE="{$Conf_ConferenceID}" <IFEQUAL $Conf_ConferenceID $form_ConferenceID>SELECTED</IFEQUAL>>{$Conf_ConferenceName}</OPTION>
</RESULTS>
</SELECT>
</IFGREATER>
<BR>
<INPUT TYPE=BUTTON VALUE="Go" onClick="checkConf(document.standingsearch)">
</td>
</tr>
</table>
</form>
</TD>
<TD>
<form name="leadersearch" method=get action="{$externalURL}">
<input type="hidden" name="site" value="default">
<input type="hidden" name="tpl" value="Leaders">
<table align=left border="0" cellspacing="0" cellpadding="0" valign=top>
<tr><td valign=top>
<font class="searchTableLabelText"><B>LEADERS</B></FONT><BR>
<SELECT NAME="Sport" ID="Sport" CLASS="searchSelect">
<OPTION VALUE="">Select sport</OPTION>
<RESULTS list=Sports_rows prefix=Sport>
<OPTION VALUE="{$Sport_SportID}" <IFEQUAL $Sport_SportID $form_Sport>SELECTED</IFEQUAL>>{$Sport_SportName}</OPTION>
</RESULTS>
</SELECT>
<BR>
<IFGREATER count($Conferences_rows) 0>
<SELECT ID="ConferenceID" NAME="ConferenceID" CLASS="searchSelect">
<OPTION VALUE="">Conference</OPTION>
<RESULTS list=Conferences_rows prefix=Conf>
<OPTION VALUE="{$Conf_ConferenceID}" <IFEQUAL $Conf_ConferenceID $form_ConferenceID>SELECTED</IFEQUAL>>{$Conf_ConferenceName}</OPTION>
</RESULTS>
</SELECT>
</IFGREATER>
<BR>
<INPUT TYPE=BUTTON VALUE="Go" onClick="checkConf(document.leadersearch)">
</td>
</tr>
</table>
</form>
</TD></TR>
</TABLE>