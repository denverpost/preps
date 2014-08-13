<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<?PHP unset($_REQUEST["SearchDate"]); unset($_REQUEST["SearchDateEnd"]);  ?>
<?PHP $strPastStart = time()-(28 * 24 * 60 * 60) ?>
<IFEMPTY $form_SearchDate><VAR $form_SearchDate = date("m/d/Y", $strPastStart)></IFEMPTY>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y")></IFEMPTY>
<IFEMPTY $sort><VAR $sort="GameDate DESC, GameTime DESC"></IFEMPTY>
<VAR $FinishedGames=TRUE>
### ###



### Set default values for start and count ###
<IFEMPTY $form_start><VAR $form_start = 0></IFEMPTY>
<IFEMPTY $form_count><VAR $form_count = 25></IFEMPTY>



### Format search begin/end dates for MySQL, display ###
<IFNOTEMPTY $form_SearchDate>
    <IFEQUAL $form_SearchDate "mm/dd/yy">
        <VAR $_REQUEST["SearchDate"] = date("Y-m-d")>
    <ELSE>
        <VAR $_REQUEST["SearchDate"] = date("Y-m-d",strtotime($form_SearchDate))>
    </IFEQUAL>
    
    <VAR $strDateDisplay = date("m/d/Y",strtotime($_REQUEST["SearchDate"]))>
<ELSE>
### It defaults to the current day ###
    <VAR $strDateDisplay = date("m/d/Y")>
</IFNOTEMPTY>

<IFNOTEMPTY $form_SearchDateEnd>
    <IFEQUAL $form_SearchDateEnd "mm/dd/yy">
        <VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d",$strFutureEnd)>
    <ELSE>
        <VAR $_REQUEST["SearchDateEnd"] = date("Y-m-d",strtotime($form_SearchDateEnd))>
    </IFEQUAL>


    ### If we look up just one day, we don't need to display the date range ###
    <VAR $strDateDisplayEnd = date("m/d/Y",strtotime($_REQUEST["SearchDateEnd"]))>
    <IFEQUAL $strDateDisplay $strDateDisplayEnd>
        <VAR $strDateDisplay = date("F j, Y",strtotime($_REQUEST["SearchDateEnd"]))>
        <VAR $singleDay = 1>
    <ELSE>
        <VAR $strDateDisplay = $strDateDisplay." - ".$strDateDisplayEnd>
        <VAR $singleDay = 0>
    </IFEQUAL>
<ELSE>
### It defaults to several weeks from today ###
    <VAR $strDateDisplay = $strDateDisplay." - ".date("m/d/Y",$strFutureEnd)>
</IFNOTEMPTY>



<VAR $pointsClause = "">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sportType = $Sport_SportType>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>


### Week-by-week schedule pagination functions ###
<?PHP
// Configure the variables for the week generator

function week_generate_r($game_timestamp)
{
    $saturday = 6;
    $game_day = date("w", $game_timestamp);
    $game_days_until_saturday = $saturday - $game_day;
    $week_start = strtotime("-$game_day days", $game_timestamp);
    $week_end = strtotime("+$game_days_until_saturday days", $game_timestamp);
    return array($week_start, $week_end);
}


function season_by_week_r($season_start, $season_end, $type="schedule", $sport_id=1, $week_current=0, $conference_id=0, $day_current=0)
{
    /*
     Generates pagination-style navigation for a particular sport's schedule.
     We do it by week because that makes sense to people.
     
     The $type variable recognizes three options:
        schedule: Returns weeks for current and future weeks.
        results: Returns weeks for current and past weeks.
        all: Returns all.
    */
    $season_start = strtotime($season_start);
    $season_end = strtotime($season_end);
    $seconds_in_a_week = 604800;
    $seconds_in_a_day = 86400;
        
    // How many weeks are in a season?
    $season_weeks = round(( $season_end - $season_start ) / $seconds_in_a_week);
    
    $this_week = round(( time() - $season_start ) / $seconds_in_a_week);
    if ( $this_week < 0 ) $this_week = 0;

    switch ( strtolower($type) )
    {
        case "schedule":
            $week_start = $this_week;
            break;
        case "results":
            $week_start = 0;
            $season_weeks = $this_week;
            break;
        default:
        
            $week_start = 0;
            break;
    }


    //echo "<dd>Weeks: $season_weeks</dd>";
    //echo "<dd>This week: $this_week</dd>";
    //echo "<dd>Week start: $week_start</dd>";
    
    if ( $conference_id > 0 )
    {
        $conference_link = "&ConferenceID=$conference_id";
    }
    
    // Loop through the weeks, put the dates in an array.
    $return = array(
                    "day" => "",
                    "week" => "");
    for ( $i = $week_start; $i <= $season_weeks; $i ++ )
    {
        $week_display = $i + 1;
        $timestamp = $season_start + ( $seconds_in_a_week * $i );
        $week[$i] = week_generate_r($timestamp);
        $week_start_timestamp = $week[$i][0];
        $week_end_timestamp = $week[$i][1];
        

        
        
        
        if ( $week_current == $week_display )
        {
            $return["week"] .= $week_display . " ";
            
            // If we know we're on the current week, we also build
            // the navigation for that particular day.
            for ( $j = 0; $j <= 6; $j ++ )
            {
                $day_display = $j + 1;
                $timestamp = $week_start_timestamp + ( $seconds_in_a_day * $j );
                $link = "/home.html?site=default&tpl=Schedule&Sport=" . $sport_id . "&SearchDate=" . date("m/d/Y", $timestamp) . "&SearchDateEnd=" . date("m/d/Y", $timestamp) . "&start=0&count=500&Week=" . $week_display . "&Day=" . $day_display . $conference_link;
                $return["day"] .= "<a href=" . $link . " class=pageNumberLink>" . date("m/d", $timestamp) . "</a> ";
            }
        }
        else
        {
            $link = "/home.html?site=default&tpl=Schedule&Sport=" . $sport_id . "&SearchDate=" . date("m/d/Y", $week_start_timestamp) . "&SearchDateEnd=" . date("m/d/Y", $week_end_timestamp) . "&start=0&count=500&Week=" . $week_display . $conference_link;
            $return["week"] .= "<a href=" . $link . " class=pageNumberLink>" . $week_display . "</a> ";
        }
        
    }
    return $return;
}
?>
<QUERY name=SeasonSchedule prefix=Season>
<VAR $seasonsort="GameDate DESC">
<QUERY name=SeasonSchedule prefix=SeasonEnd>




<?PHP if ($sportName == "Girls Volleyball") { ?>
<VAR $pointsClause = ",awayteamstats.FinalScore as AwayTeamPoints,hometeamstats.FinalScore  as HomeTeamPoints">
<?PHP } ?>

<?PHP if ($sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Girls Basketball") { ?>
<VAR $pointsClause = ",awayteamstats.TotalPoints as AwayTeamPoints,hometeamstats.TotalPoints as HomeTeamPoints">
<?PHP } ?>
<?PHP if ($sportName == "Baseball" || $sportName == "Softball") { ?>
<VAR $pointsClause = ",awayteamstats.Runs as AwayTeamPoints,hometeamstats.Runs as HomeTeamPoints">
<?PHP } ?>
<?PHP if ($sportName == "Field Hockey" || $sportName == "Boys Hockey" || $sportName == "Ice Hockey" || $sportName == "Girls Soccer"  || $sportName == "Boys Soccer" || $sportName == "Girls Lacrosse" || $sportName == "Boys Lacrosse") { ?>
<VAR $pointsClause = ",awayteamstats.TotalGoals AS AwayTeamPoints,hometeamstats.TotalGoals as HomeTeamPoints">
<?PHP } ?>
</IFNOTEMPTY>




### In case we need the schedule for a particular conference ###
<IFNOTEMPTY $form_ConferenceID>
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName CONFERENCEID=$form_ConferenceID count=$form_count>
<ELSE>
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName count=$form_count>
</IFNOTEMPTY>


<VAR $gameCount = count($Schedule_rows)>
<RUN setPreviousNextPageLinks($form_start,$form_count,$gameCount,$total_Schedule) >
<RUN $beginPrevNextURL = $externalURL."site=default&tpl=Schedule">
<RUN $beginPrevNextURL .= "&Sport=".$form_Sport>
<RUN $beginPrevNextURL .= "&SearchDate=".$form_SearchDate>
<RUN $beginPrevNextURL .= "&SearchDateEnd=".$form_SearchDateEnd>

<IFTRUE $sportName == "Girls Swimming and Diving" || $Sport_SportName == "Wrestling" || $Sport_SportName == "Boys Swimming and Diving" || $Sport_SportName == "Boys Cross Country" || $Sport_SportName == "Girls Cross Country" || $Sport_SportName == "Boys Golf" || $Sport_SportName == "Girls Golf" || $Sport_SportName == "Boys Tennis" || $Sport_SportName == "Girls Tennis" || $Sport_SportName == "Boys Track and Field" || $Sport_SportName == "Girls Track and Field">
### || "Boys Tennis" || "Girls Tennis" || "Boys Golf" || "Girls Golf" || "Boys Cross Country" || "Girls Cross Country">###
<VAR $contestTerm = "meet">
<ELSE>
<VAR $contestTerm = "game">
</IFTRUE>


<h3>
    <span class="color grey">{$total_Schedule} prep <?PHP echo strtolower($sportName) ?> {$contestTerm}<IFNOTEQUAL $total_Schedule 1>s</IFNOTEQUAL> for</span> <IFNOTEMPTY $form_Week> Week {$form_Week}, </IFNOTEMPTY>{$strDateDisplay}
    ### <IFNOTEQUAL $total_Schedule $form_count>( <a href="{$externalURL}site=default&tpl=Schedule">view all games</a> )</IFNOTEQUAL> ###
</h3>
<table>
<tr>
<td colspan="50" align="left" valign="top">

###if THERE ARE GAMES###
<IFNOTEQUAL $gameCount 0>

### If we have a sport, we display links to the week-by-week schedule ###
<IFNOTEMPTY $form_Sport>
<h4>
Week: 
<?PHP
$nav = season_by_week_r($Season_GameDate, $SeasonEnd_GameDate, $schedule_type, $form_Sport, $form_Week, $form_ConferenceID);
echo $nav["week"];
?>
</h4>
<ELSE>
<h4>
<IFGREATER $gameCount 0>
<IFGREATER 501 $total_Schedule>
Pages:
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<span>{$i+1}</span>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

</IFGREATER>
</h4>
</IFNOTEMPTY>


### If we are displaying a week's worth of games, we display links to each day's schedule ###
<IFNOTEMPTY $form_Week>
<h4>Day:
<?PHP
echo $nav["day"];
?>
</h4>
</IFNOTEMPTY>
</td>
</tr>
<tr><td>

<table cellpadding="0" cellspacing="0" class="schedTable deluxe">
    <tbody>
        <tr id="header-sub">
            <th scope="col" abbr="">Date + Time</th>
<IFEMPTY $form_Sport>            <th scope="col" abbr="">Sport</th></IFEMPTY>
<?PHP if ($sportType == "1") { ?>
<?PHP } ?>
<?PHP if ($sportType != "1") { ?>
            <th scope="col" abbr="" colspan="2">Away</th>
<?PHP } ?>

<?PHP if ($sportType == "1") { ?>
            <th scope="col" abbr="" colspan="4">Meet Name</th>
<?PHP } ?>
<?PHP if ($sportType != "1") { ?>
            <th scope="col" abbr="" colspan="2">Home</th>
<?PHP } ?>

            <th scope="col" abbr="">Boxscore</th>
        </tr>
<VAR $rowClass = "schedRow trRow">


<RESULTS list=Schedule_rows prefix=Game>
###Query: {$Schedule_query}###
        <tr class="{$rowClass}">
            <td nowrap="nowrap" scope="row" abbr="Date and Time"><IFNOTEQUAL $singleDay 1><VAR $gameDate = date("D n/d",strtotime($Game_GameDate))>
###                {$gameDate}
                <br />###</IFNOTEQUAL>
<VAR $gameTime = date("g:ia",strtotime($Game_GameTime))>
### inserted code begins here###

<VAR $gameHour = date("g",strtotime($Game_GameTime))>
<VAR $gameMinute = date("i",strtotime($Game_GameTime))>
###<VAR $gameSecond = date("s",strtotime($Game_GameTime))>###
<VAR $meridian = date("a",strtotime($Game_GameTime))>
<VAR $gameDay = date("D",strtotime($Game_GameDate))>
<VAR $gameMonth = date("n",strtotime($Game_GameDate))>
<VAR $gameDate = date("j",strtotime($Game_GameDate))>
<VAR $gameYear = date("Y",strtotime($Game_GameDate))>

<IFTRUE $meridian == "pm">
<VAR $meridian = "p.m.">
<ELSE>
<VAR $meridian = "a.m.">
</IFTRUE>

<VAR $myDay = "$gameDay"." $gameMonth"."/"."$gameDate">
<VAR $myTime = "$gameHour".":"."$gameMinute"." $meridian">

<IFEQUAL $Game_GameTimeTBD 1>
<VAR $myTime = "TBD">
<ELSE>
</IFEQUAL>



### inserted code ends here###

###{$gameTime}###
{$myDay}
<BR>
{$myTime}
###GAMETIMEHERE###
            </td>
<IFEMPTY $form_Sport>            <td valign="top"><a href="{$externalURL}site=default&tpl=Sport&Sport={$Game_SportID}">{$Game_SportName}</a></td></IFEMPTY>
<?PHP if ($sportType == "1") { ?>
            <td valign="top" colspan="4">
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">{$Game_GameMeetName}</a>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<IFNOTEMPTY $Game_SchoolName>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
?>
                <br />(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field"><strong>{$Game_SchoolName}</strong></a>)
</IFNOTEMPTY>
<ELSE>
</IFNOTEQUAL>
            </td>
<?PHP } ?>
<?PHP if ($sportType != "1") { ?>
### Logic for the meet events not already accounted for ###
<IFNOTEMPTY $Game_GameMeetName>
            <td valign="top" colspan="4">
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">{$Game_GameMeetName}</a>
<IFNOTEMPTY $Game_SchoolName>
<IFNOTEMPTY $Game_SchoolAddress>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
                <br />(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field"><strong>{$Game_SchoolName}</strong></a>)
</IFNOTEMPTY>
</IFNOTEMPTY>
            </td>
<ELSE>
            <td valign="top">
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Game_AwayTeamID}">
                {$Game_AwayTeamName}
                </a></td>
            <td valign="top">
<IFGREATER $Game_GameStatStatus 2>
                {$Game_AwayTeamPoints}
</IFGREATER>
            </td>
            <td valign="top">
                <a href="{$externalURL}site=default&tpl=Team&TeamID={$Game_HomeTeamID}">
                {$Game_HomeTeamName}
                </a>
            <td valign="top">
<IFGREATER $Game_GameStatStatus 2>
                {$Game_HomeTeamPoints}
</IFGREATER>
            </td>
###<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>###
###<IFNOTEMPTY $Game_SchoolName>###
###<IFNOTEMPTY $Game_SchoolAddress>###
<?PHP
//$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
?>
###                <br />(zat <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and ###
###directions to the field"><strong>{$Game_SchoolName}</strong></a>)###
###</IFNOTEMPTY>###
###</IFNOTEMPTY>###
###<ELSE>###
###test###
###</IFNOTEQUAL>###
            </td>
###            <td valign="top">###
###<IFGREATER $Game_GameStatStatus 2>###
###                {$HomeTeamPoints}###
###</IFGREATER>###
###            </td>###
</IFNOTEMPTY>### Close out the logic for a gentler display of meet events ###
<?PHP } ?>
            <td valign="top">
<?PHP if ($Game_GameStatStatus > 2 ) { ?>
                <a href="{$externalURL}site=default&tpl=Boxscore&ID={$Game_GameID}">Boxscore</a>
<?PHP } ?>
            </td>
        </tr>
<IFEQUAL $rowClass "schedRow trRow">
<VAR $rowClass = "schedRowAlternate trAlt">
<ELSE>
<VAR $rowClass = "schedRow trRow">
</IFEQUAL>
</RESULTS>
    </tbody>
</table>
</td></tr>
<tr><td colspan="50">
### If we have a sport, we display links to the week-by-week schedule ###
<IFNOTEMPTY $form_Sport>
<h4>
Week: 
<?PHP
echo $nav["week"];
?>
</h4>
<ELSE>
<h4>
<IFGREATER $gameCount 0>
<IFGREATER 501 $total_Schedule>
Pages:
</IFGREATER>

<IFTRUE $showPrevPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start-$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<span>{$i+1}</span>
<ELSE>
<a href="{$beginPrevNextURL}
&start={$i*$form_count}
&count={$form_count}
&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}
&start={$form_start+$form_count}
&count={$form_count}
&sort={$form_sort}" class="pageNumberLink">Next</a>
</IFTRUE>

<ELSE>
</IFNOTEQUAL>

</IFGREATER>
</h4>
</IFNOTEMPTY>
</td></tr>
</table>


### ###
<VAR $form_SearchDate = "">
<VAR $form_SearchDateEnd = "">
<VAR $SearchDate = "">
<VAR $SearchDateEnd = "">
<VAR $FinishedGames=FALSE>
