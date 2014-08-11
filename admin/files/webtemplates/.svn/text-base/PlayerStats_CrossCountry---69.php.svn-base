<h3>Meet Stats</h3>
<h4>Meets</h4>
<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub" class="resultsText">
            <th scope="col" abbr="">Date</th>
            <th scope="col" abbr="">Meet name</th>
            <th scope="col" abbr="">Time</th>
        </tr>
<IFGREATER $total_PlayerMeetStats 0>
<RESULTS list=PlayerMeetStats_rows prefix=PlayerMeetStats>
        <tr class="{$rowClass}">
<VAR $meetDate = date("m/d/y",strtotime($PlayerMeetStats_GameDate))>
            <td align="left">{$meetDate}</td>
<VAR $PlayerMeetStats_GameMeetName = fixApostrophes($PlayerMeetStats_GameMeetName)>
<VAR $PlayerMeetStats_MeetEventName = fixApostrophes($PlayerMeetStats_MeetEventName)>
            <td align="left">{$PlayerMeetStats_GameMeetName}</td>
            <td align="right">{$PlayerMeetStats_Time}</td>
        </tr>
<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
</IFGREATER>
    </tbody>
</table>