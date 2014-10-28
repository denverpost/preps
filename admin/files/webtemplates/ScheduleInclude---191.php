<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<INCLUDE site=default tpl=SportSeasons>

<VAR $todayUnixDate = time(now)>
<VAR $todayMonth = date("F",strtotime(now))>
<VAR $todayDate = date("j",strtotime(now))>
<VAR $todayYear = date("Y",strtotime(now))>
<VAR $space = " "> 
<VAR $hyphen = "-">
<?PHP $defaultDate = $todayDate.$space.$todayMonth.$space.$todayYear;?>

### YEARCHECK these variables need to be re-set every year. they are the times that various### ###tournaments start###
<VAR $myEarlyFootballPlayoffTime = strtotime("1 November 2014")>
<VAR $myLateFootballPlayoffTime = strtotime("8 November 2014")>
<VAR $mySoftballTime = strtotime("11 October 2014")>
<VAR $myBoysSoccerTime = strtotime("22 October 2014")>
<VAR $myFieldHockeyTime = strtotime("17 October 2014")>
<VAR $myBasketballTime = strtotime("24 February 2015")> ###both boys and girls###
<VAR $myLateBasketballTime = strtotime("25 February 2015")> ###both boys and girls###
<VAR $myIceHockeyTime = strtotime("27 February 2015")>
<VAR $myEarlyBaseballTime = strtotime("9 May 2015")>
<VAR $myLateBaseballTime = strtotime("9 May 2015")>
<VAR $myGirlsSoccerTime = strtotime("5 May 2015")>


<VAR $myDefaulttime = strtotime("$defaultDate")>

###this is the start of the fall sports season###
### YEARCHECK this one too. ###
<VAR $seasonStart = strtotime("13 August 2014")>
<?PHP $difference = $strNow - $seasonStart ?>
<?PHP $difference = ($difference / 604800) ?>

### Set default values for start and count ###
<IFEMPTY $form_start><VAR $form_start = 0></IFEMPTY>
<IFEMPTY $form_count><VAR $form_count = 25></IFEMPTY>
<?PHP $strFutureEnd = time()+(3 * 24 * 60 * 60) ?>
<?PHP $strNow = time() ?>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y",$strFutureEnd)></IFEMPTY>

<VAR $strDateDisplay1 = $strNow>
<VAR $strDateDisplay2 = $strFutureEnd>
###NOW: {$strNow}###
###SEASONSTART: {$seasonStart}###
###DIFFERENCE: {$difference}###
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


function week_generate($game_timestamp)
{
    $saturday = 6;
    $game_day = date("w", $game_timestamp);
    $game_days_until_saturday = $saturday - $game_day;
    $week_start = strtotime("-$game_day days", $game_timestamp);
    $week_end = strtotime("+$game_days_until_saturday days", $game_timestamp);
    return array($week_start, $week_end);
}


function season_by_week($season_start, $season_end, $type="schedule", $sport_id=1, $week_current=-9, $conference_id=0, $day_current=0)
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

    // Football Week Zero logic
    if ( $sport_id == 1 ) --$week_start;

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
        //if ( $sport_id == 1 ) --$week_display;
        $timestamp = $season_start + ( $seconds_in_a_week * $i );
        $week[$i] = week_generate($timestamp);
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
### SeasonSchedule query: {$SeasonSchedule_query} ###

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



<VAR $SportIDCurrent = 0>
<VAR $ClassIDCurrent = 0>
<VAR $ConferenceIDCurrent = 0>
<VAR $DayCurrent = 0>
<VAR $TimeCurrent = 0>

### In case we need the schedule for a particular conference ###
<IFNOTEMPTY $form_ConferenceID>
    <VAR $sort = "ClassSort,GameDate,GameTime">
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName CONFERENCEID=$form_ConferenceID count=$form_count sort=$sort>
<ELSE>
    <VAR $sort = "ClassSort,Sport.SportName,hometeam.TeamClassID,hometeam.TeamConferenceID,GameDate,GameTime">
    <QUERY name=Schedule POINTSCLAUSE=$pointsClause SPORTNAME=$sqlSportName count=$form_count sort=$sort>
</IFNOTEMPTY>

### SCHEDULE QUERY: {$Schedule_query} ###

<VAR $gameCount = count($Schedule_rows)>
<RUN setPreviousNextPageLinks($form_start,$form_count,$gameCount,$total_Schedule) >
<RUN $beginPrevNextURL = $externalURL."site=default&tpl=Schedule">
<RUN $beginPrevNextURL .= "&Sport=".$form_Sport>
<RUN $beginPrevNextURL .= "&SearchDate=".$form_SearchDate>
<RUN $beginPrevNextURL .= "&SearchDateEnd=".$form_SearchDateEnd>
<IFTRUE $sportName == "Girls Swimming and Diving" || $sportName =="Wrestling" || $sportName == "Boys Swimming and Diving" || $sportName  == "Boys Cross Country" || $sportName  == "Girls Cross Country" || $sportName  == "Boys Tennis" || $sportName  == "Girls Tennis" || $sportName  == "Boys Golf" || $sportName  == "Girls Golf" || $sportName  == "Girls Track and Field" || $sportName  == "Boys Track and Field">
<VAR $contestTerm = "meet">
<ELSE>
<VAR $contestTerm = "game">
</IFTRUE>
<h3>
    <span class="color grey">{$total_Schedule} prep <?PHP echo strtolower($sportName) ?> {$contestTerm}<IFNOTEQUAL $total_Schedule 1>s</IFNOTEQUAL> for</span> <IFNOTEMPTY $form_Week> Week {$form_Week}, </IFNOTEMPTY>{$strDateDisplay}
    ### <IFNOTEQUAL $total_Schedule $form_count>( <a href="{$domainURL}/schedule/">view all games</a> )</IFNOTEQUAL> ###
</h3>


### ------------------------------------------------------------------------ ###
### Schedule Nav - Top ###
### ------------------------------------------------------------------------ ###
### If we have a sport, we display links to the week-by-week schedule ###
<IFNOTEMPTY $form_Sport>
<h4>
Week:
<?PHP
$nav = season_by_week($Season_GameDate, $SeasonEnd_GameDate, $schedule_type, $form_Sport, $form_Week, $form_ConferenceID);
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
<a href="{$beginPrevNextURL}&start={$form_start-$form_count}&count={$form_count}&sort={$form_sort}" class="pageNumberLink">Previous</a>
</IFTRUE>

<IFGREATER 501 $total_Schedule>
<LOOP counter=i start=0 end=$totalPages-1 incr=1>
<IFEQUAL $i*$form_count $form_start>
<span>{$i+1}</span>
<ELSE>
<a href="{$beginPrevNextURL}&start={$i*$form_count}&count={$form_count}&sort={$strReqSort}" class="pageNumberLink">{$i+1}</a>
</IFEQUAL>
</LOOP>
</IFGREATER>

<IFTRUE $showNextPageLink>
<a href="{$beginPrevNextURL}&start={$form_start+$form_count}&count={$form_count}&sort={$form_sort}" class="pageNumberLink">Next</a>
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


### ------------------------------------------------------------------------ ###
### ------------------------------------------------------------------------ ###
###                                                                          ###
### Schedule ###
###                                                                          ###
### ------------------------------------------------------------------------ ###
### ------------------------------------------------------------------------ ###


### ------------------------------------------------------------------------ ###
### Sport SubNav ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_Sport>
<p>Skip down to schedules by sport:</p>

### SCHEDULE QUERY: {$Schedule_query} ###

<RESULTS list=Schedule_rows prefix=Subnav>
    <ul id="subnav">
    <IFNOTEQUAL $SportIDCurrent $Subnav_SportID>
        <li><a href="#sport{$Subnav_SportID}">{$Subnav_SportName} Schedule</a></li>
        <VAR $SportIDCurrent = $Subnav_SportID>
             <ELSE>
    </IFNOTEQUAL>
    </ul>
</RESULTS>
</IFEMPTY>
### ------------------------------------------------------------------------ ###
### Class SubNav ###
### ------------------------------------------------------------------------ ###
<IFNOTEMPTY $form_Sport>
<IFEMPTY $form_ConferenceID>
###Keith M. added this klooge because Girls Swimming is weird and classes/conferences don't mean the same thing in this sport###
<IFTRUE $Subnav_SportName != "Girls Swimming and Diving" || $Subnav_SportName != "Boys Swimming and Diving">
<ELSE>
<RESULTS list=Schedule_rows prefix=Subnav>
    <ul id="subnav">
    <IFGREATER $Subnav_TeamClassID 0>
    <IFNOTEQUAL $ClassIDCurrent $Subnav_TeamClassID>
        <QUERY name=Class prefix=Class CLASSID=$Subnav_TeamClassID>

### Query: {$Class_query} ###

        <li><a href="#class{$Class_ClassName}">Class {$Class_ClassName} Schedule</a></li>
        <VAR $ClassIDCurrent = $Subnav_TeamClassID>
    </IFNOTEQUAL>
    </IFGREATER>
    </IFTRUE>###This closes the IFTRUE that Keith M. added up a few lines###
</ul>
</RESULTS>
</IFEMPTY>
</IFNOTEMPTY>


### the "sked note" is unnecessary once a sport tournament or playoff begins ###
<IFEQUAL $sportType 0>
<VAR $mySkedNote = "Non-league games can be found in the schedule of the home team's conference">
<VAR $mySkedWord = "(Non-league)">
</IFEQUAL>

### yes, the football playoffs start in different weeks for different classes, but it's only a week and we're not going to worry about it###

<IFEMPTY $sport_SportName>
<IFGREATER $Game_GameDate $strmyEarlyFootballPlayoffTime>
<VAR $mySkedNote = "">
</IFGREATER>
<ELSE>
</IFEMPTY>

<IFTRUE  $Sport_SportName == "Football">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmyEarlyFootballPlayoffTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

<IFTRUE  $Sport_SportName == "Softball">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmySoftballTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

<IFTRUE  $Sport_SportName == "Baseball">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmyEarlyBaseballTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

<IFTRUE  $Sport_SportName == "Baseball">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmyLateBaseballTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>




<IFTRUE  $Sport_SportName == "Boys Soccer">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmyBoysSoccerTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

<IFTRUE  $Sport_SportName == "Boys Basketball" || $Sport_SportName == "Girls  Basketball">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $myBasketballTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

<IFTRUE  $Sport_SportName == "Ice Hockey">
###GAMEDATE: {$Game_GameDate}<br>###
<IFGREATER $Game_GameDate $strmyIceHockeyTime>
<VAR $mySkedNote = "">
</IFGREATER>
</IFTRUE>

###There are no conferences in Field Hockey###
<IFTRUE  $Sport_SportName == "Field Hockey">
<VAR $mySkedNote = "">
</IFTRUE>

<IFTRUE  $Sport_SportName == "Boys Lacrosse">
<VAR $mySkedNote = "">
</IFTRUE>

<h3>{$mySkedNote}</h3>
<div class="schedule">
### Query: {$Schedule_query} ###
<RESULTS list=Schedule_rows prefix=Game>

### ------------------------------------------------------------------------ ###
### Sport ###
### ------------------------------------------------------------------------ ###
<IFEMPTY $form_Sport>
    <IFNOTEQUAL $SportIDCurrent $Game_SportID>
        <?PHP $sport_slug = sport_id($Game_SportID); ?>
        <div class="clear"></div>
        <a name="sport{$Game_SportID}"></a>
        <h3 style="margin-top:25px; font-size:36px; border-top:10px solid #ccc;"><a href="{$domainURL}/sport/{$sport_slug}/">{$Game_SportName}</a></h3>
        <VAR $SportIDCurrent = $Game_SportID>
    </IFNOTEQUAL>
<ELSE>
<?PHP $sport_slug = sport_id($form_Sport); ?>
</IFEMPTY>


### ------------------------------------------------------------------------ ###
### Class ###
### ------------------------------------------------------------------------ ###
###TEAMCLASSID: {$Game_TeamClassID}<BR>###
<IFEMPTY $form_ConferenceID>
 ### here is the beginning ###   
     <IFGREATER $Game_TeamClassID 0>
        <IFNOTEQUAL $ClassIDCurrent $Game_TeamClassID>
            <QUERY name=Class prefix=Class CLASSID=$Game_TeamClassID>
### Query: {$Class_query} ###
         <div class="clear"></div>
            <a name="class{$Class_ClassName}"></a><BR>
                <IFNOTEMPTY $form_Sport><h3 class="sub sublarge">
                    <ELSE>
                    <h3 class="sub">
                </IFNOTEMPTY>

###THIS IS WHERE THE CLASS NAME AND SPORT ARE DISPLAYED###

<IFEQUAL $Sport_SportName "Field Hockey">
<VAR $myTerm = "Tournament">
<ELSE>
</IFEQUAL>

<IFTRUE  $Sport_SportName == "Football" || $SportID_Current == "1">
<IFGREATER $Class_ClassID 5>
<VAR $classWord = "">
<ELSE>
</IFGREATER>
<ELSE>
<VAR $classWord = "Class ">
</IFTRUE>

<a href="{$externalURL}site=default&tpl=Class&ClassID={$Class_ClassID}&Sport={$Game_SportID}" title="{$Class_ClassName} Prep {$Sport_SportName}">{$classWord} {$Class_ClassName}</a>

<IFTRUE $Sport_SportName == "Boys Basketball" || $SportIDCurrent == "6">
<VAR $myTerm = "Tournament">
</IFTRUE>
<IFTRUE $Sport_SportName == "Girls Basketball" || $SportIDCurrent == "21">
<VAR $myTerm = "Tournament">
</IFTRUE>
<IFTRUE $Sport_SportName == "Ice Hockey" || $SportIDCurrent == "34">
<VAR $myTerm = "Playoffs">
</IFTRUE>
<IFEQUAL $Sport_SportName "Field Hockey">
<VAR $myTerm = "Tournament">
</IFEQUAL>
<IFEQUAL $Sport_SportName "Boys Soccer">
<VAR $myTerm = "Tournament">
</IFEQUAL>
<IFEQUAL $Sport_SportName "Girls Soccer">
<VAR $myTerm = "Playoffs">
</IFEQUAL>
<IFTRUE $Sport_SportName == "Football" || $Subnav_SportName == "Football">
<VAR $myTerm = "Playoffs">
</IFTRUE>
<IFEQUAL $Sport_SportName "Softball">
<VAR $myTerm = "Tournament">
</IFEQUAL>
<IFEQUAL $Sport_SportName "Baseball">
<VAR $myTerm = "Championship Series">
</IFEQUAL>
<IFEQUAL $Sport_SportName "Field Hockey">
<VAR $myTerm = "Tournament">
<ELSE>
</IFEQUAL>
<IFEQUAL $Sport_SportName "Boys Lacrosse">
<VAR $myTerm = "Playoffs">
<ELSE>
</IFEQUAL>
<IFEQUAL $Sport_SportName "Girls Lacrosse">
<VAR $myTerm = "Playoffs">
<ELSE>
</IFEQUAL>


<IFTRUE $sportName == "Football" || $Subnav_SportName == "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 2>
<IFGREATER $testTime $myEarlyFootballPlayoffTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFTRUE>

<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 5>
<IFGREATER $testTime $myEarlyFootballPlayoffTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 6>
<IFGREATER $testTime $myEarlyFootballPlayoffTime >
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

###HELLO###
<IFEMPTY $Game_GameDate>
<VAR $Game_GameDate = $defaultDate>
<ELSE>
</IFEMPTY>
<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 7>
<IFGREATER $testTime $myEarlyFootballPlayoffTime >
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 1>
<IFGREATER $testTime $myLateFootballPlayoffTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 3>
<IFGREATER $testTime $myLateFootballPlayoffTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

<IFEQUAL $sportName "Football">
<VAR $testTime = strtotime($Game_GameDate)>
<IFEQUAL $Class_ClassID 4>
<IFGREATER $testTime $myLateFootballPlayoffTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
</IFEQUAL>

<IFEQUAL $sportName "Softball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $mySoftballTime>
Championship {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myBoysSoccerTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Girls Soccer">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myGirlsSoccerTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>


<IFEQUAL $sportName "Field Hockey">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myFieldHockeyTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Ice Hockey">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myIceHockeyTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>


<IFEQUAL $sportName "Boys Basketball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myLateBasketballTime>
State {$myTerm}
<ELSE>
<IFGREATER $testTime $myBasketballTime>
<IFGREATER $Class_ClassID 3>
District playoffs
<ELSE>
<IFGREATER $Class_ClassID 2>
Conference Playoffs
<ELSE>
State {$myTerm}
</IFGREATER>
</IFGREATER>
<ELSE>
</IFGREATER>
</IFGREATER>
</IFEQUAL>


<IFEQUAL $sportName "Girls Basketball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myLateBasketballTime>
State {$myTerm}
<ELSE>
<IFGREATER $testTime $myBasketballTime>
<IFGREATER $Class_ClassID 3>
District playoffs
<ELSE>
<IFGREATER $Class_ClassID 2>
Conference Playoffs
<ELSE>
State {$myTerm}
</IFGREATER>
</IFGREATER>
<ELSE>
</IFGREATER>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Boys Lacrosse">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myBoysLacrosseTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Girls Lacrosse">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $testTime $myGirlsLacrosseTime>
State {$myTerm}
<ELSE>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Baseball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $Class_ClassID 3>
<IFGREATER $testTime $myEarlyBaseballTime >
State {$myTerm}
<ELSE>
</IFGREATER>
</IFGREATER>
</IFEQUAL>

<IFEQUAL $sportName "Baseball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFTRUE $Class_ClassID == 1 || $Class_ClassID == 2 || $Class_ClassID == 3>
<IFGREATER $testTime $myLateBaseballTime >
State {$myTerm}
<ELSE>
</IFTRUE>
</IFGREATER>
</IFEQUAL>



</h3>
            <VAR $ClassIDCurrent = $Game_TeamClassID>
            <VAR $DayCurrent = 0>
        </IFNOTEQUAL>
    </IFGREATER>
</IFEMPTY>
<IFEMPTY $form_ConferenceID>
    <IFGREATER $Game_TeamConferenceID 0>
        <IFNOTEQUAL $ConferenceIDCurrent $Game_TeamConferenceID>
            <QUERY name=Conference prefix=Conference CONFERENCEID=$Game_TeamConferenceID>
<IFTRUE $sportName == "Softball" || $sportName == "Boys Soccer" || $sportName == "Girls Soccer"|| $sportName == "Field Hockey" || $sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Girls Basketball" || $sportName == "Ice Hockey" || $sportName == "Boys Lacrosse" || $sportName == "Girls Lacrosse" || $sportName == "Baseball" || $SportIDCurrent == "1" || $SportIDCurrent == "34" || $SportIDCurrent == "6" || $SportIDCurrent == "15" || $SportIDCurrent == "21" || $SportIDCurrent == "35"  || $SportIDCurrent == "36" || $SportIDCurrent == "29" || $SportIDCurrent == "21">
<ELSE>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFTRUE>

### the following block of code decides whether to include conference names in the football schedule, depending on whether the class in question is in the tournament/playoff phase of the season###
<IFTRUE $sportName == "Football" || $SportIDCurrent =="1">
<VAR $testTime = strtotime($Game_GameDate)>
###Class 5A football###
<IFTRUE $Class_ClassID == 2>
<?php
$confName = preg_replace("/(\w+)\s(\(\d\w\))/", "$1", "$Conference_ConferenceName");
?>
<IFGREATER $myEarlyFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 4A football###
<IFTRUE $Class_ClassID == 1>
<?php
$confName = preg_replace("/(\w+)\s(\(\d\w\))/", "$1", "$Conference_ConferenceName");
?>
<IFGREATER $myLateFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 3A football###
<IFTRUE $Class_ClassID == 3>
<?php
$confName = preg_replace("/(\w+)\s(\(\d\w\))/", "$1", "$Conference_ConferenceName");
?>
<IFGREATER $myLateFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 2A football###
<IFTRUE $Class_ClassID == 4>
<?php
$confName = preg_replace("/(\w+)\s(\(\d\w\))/", "$1", "$Conference_ConferenceName");
?>
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myLateFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 1A football###
<IFTRUE $Class_ClassID == 5>
<?php
$confName = preg_replace("/(\w+)\s(\(\d\w\))/", "$1", "$Conference_ConferenceName");
?>
<IFGREATER $myEarlyFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 8-man football###
<IFTRUE $Class_ClassID == 6>
<?php
$confName = preg_replace("/(\w+)\s(\(8\-man\))/", "$1", "$confName");
?>
###<?php
$divisionName = preg_replace("/(\w+)\s(\w.*)/", "$1", "$confName");
?>###

<IFGREATER $myEarlyFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
###Class 6-man football###
<IFTRUE $Class_ClassID == 7>
<?php
$confName = preg_replace("/(\w+)\s(\(6\-man\))/", "$1", "$Conference_ConferenceName");
?>
<IFGREATER $myEarlyFootballPlayoffTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>
</IFTRUE> ###closes <IFTRUE $sportName == "Football">###

### the following block of code decides whether to include conference names in the softball schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Softball">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $mySoftballTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the boys soccer schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Boys Soccer">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myBoysSoccerTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the boys and girls basketball schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Boys Basketball" || $sportName == "Girls Basketball" || $SportIDCurrent == "6" || $SportIDCurrent == "21">
<VAR $confName = $Conference_ConferenceName>
<?php
$confName = preg_replace("/(\(\d\w\))/", "", "$Conference_ConferenceName");
?>
###GO HERE###
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myBasketballTime $testTime>
<IFTRUE $Class_ClassID == 1 || $Class_ClassID == 2>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
###confname: {$confName}<br>###
<ELSE>
</IFTRUE>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the ice hockey schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Ice Hockey" || $SportIDCurrent == "34">
<?php
$confName = preg_replace("/(\w+)\s(\(Ice hockey\))/", "$1", "$Conference_ConferenceName");
?>
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myIceHockeyTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the boys lacrosse schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Boys Lacrosse"  || $SportIDCurrent == "35">
<?php
$confName = preg_replace("/(\w+)\s(\(Boys lacrosse\))/", "$1", "$Conference_ConferenceName");
?>
<VAR $testTime = strtotime($Game_GameDate)>

<IFGREATER $myBoysLacrosseTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the girls lacrosse schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Girls Lacrosse"  || $SportIDCurrent == "36">
<?php
$confName = preg_replace("/(\w+)\s(\(Girls lacrosse\))/", "$1", "$Conference_ConferenceName");
?>
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myGirlsLacrosseTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$confName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

### the following block of code decides whether to include conference names in the girls soccer schedule, depending on whether or not the class in question is in the tournament/playoff phase of the season###

<IFTRUE $sportName == "Girls Soccer"  || $SportIDCurrent == "15">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myGirlsSoccerTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

<IFTRUE $sportName == "Baseball" || $SportIDCurrent == "29">
<VAR $testTime = strtotime($Game_GameDate)>
<IFGREATER $myLateBaseballTime $testTime>
<h4><a href="{$externalURL}site=default&tpl=Conference&ConferenceID={$Conference_ConferenceID}&Sport={$Game_SportID}" title="{$Conference_ConferenceName} Conference">{$Conference_ConferenceName} Conference</a></h4>
</IFGREATER>
</IFTRUE>

            <VAR $ConferenceIDCurrent = $Game_TeamConferenceID>
            <VAR $DayCurrent = 0>
        </IFNOTEQUAL>
    </IFGREATER>
</IFEMPTY>
###</IFGREATER>###
###</IFTRUE>###
### ------------------------------------------------------------------------ ###
### Day ###
### ------------------------------------------------------------------------ ###
<IFNOTEQUAL $singleDay 1>
    <VAR $Day = date("j", strtotime($Game_GameDate))>
    <IFNOTEQUAL $DayCurrent $Day>
        <h5><?PHP echo date("l F j", strtotime($Game_GameDate)); ?></h5>
        <VAR $DayCurrent = $Day>
    </IFNOTEQUAL>
</IFNOTEQUAL>




### ------------------------------------------------------------------------ ###
### Time, Teams, Results ###
### ------------------------------------------------------------------------ ###

<VAR $timeDateDisplay = date("g:i a",strtotime($Game_GameTime))." ".date("l, F j, Y",strtotime($Game_GameDate))>

<VAR $gameHour = date("g",strtotime($Game_GameTime))>
<VAR $gameMinute = date("i",strtotime($Game_GameTime))>
<VAR $gameSecond = date("s",strtotime($Game_GameTime))>
<VAR $meridian = date("a",strtotime($Game_GameTime))>
<VAR $gameDay = date("l",strtotime($Game_GameDate))>
<VAR $gameMonth = date("F",strtotime($Game_GameDate))>
<VAR $gameDate = date("j",strtotime($Game_GameDate))>
<VAR $gameYear = date("Y",strtotime($Game_GameDate))>

<IFTRUE $meridian == "pm">
<VAR $meridian = "p.m.">
<ELSE>
<VAR $meridian = "a.m.">
</IFTRUE>

<VAR $gameTime = "$gameHour".":"."$gameMinute"." $meridian">

<IFEQUAL $Game_GameTimeTBD 1>
<VAR $gameTime = "TBD:">
<ELSE>
</IFEQUAL>
<IFEQUAL $sportType 1>
<IFEMPTY $Game_GameMeetName>
<ELSE>
</IFEMPTY>
<ELSE>
</IFEQUAL>
<h6>{$gameTime} 
<?PHP if ($sportType == "1") { ?>
                <a href="{$domainURL}/boxscores/{$Game_GameID}/">{$Game_GameMeetName}</a>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<IFNOTEMPTY $Game_SchoolName>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEQUAL>
<?PHP } ?>

### Logic for the meet events not already accounted for ###
<?PHP if ($sportType != "1") { ?>
<IFNOTEMPTY $Game_GameMeetName>
                <a href="{$domainURL}/boxscores/{$Game_GameID}/">{$Game_GameMeetName}</a>
<IFNOTEMPTY $Game_SchoolName>
<IFNOTEMPTY $Game_SchoolAddress>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEMPTY>


<ELSE>
<VAR $Game_AwayTeamName = trim($Game_AwayTeamName)>
<VAR $Game_HomeTeamName = trim($Game_HomeTeamName)>
<?PHP
$team_slug = slugify($Game_AwayTeamName);
?>
                <a href="{$domainURL}/schools/{$team_slug}/{$sport_slug}/{$Game_AwayTeamID}/">
                {$Game_AwayTeamName}</a><IFGREATER $Game_GameStatStatus 1>: {$Game_AwayTeamPoints}
</IFGREATER>
<?PHP
$team_slug = slugify($Game_HomeTeamName);
?>
                at
                <a href="{$domainURL}/schools/{$team_slug}/{$sport_slug}/{$Game_HomeTeamID}/">
                {$Game_HomeTeamName}</a><IFGREATER $Game_GameStatStatus 1>: {$Game_HomeTeamPoints}
</IFGREATER>
<IFNOTEQUAL $Game_GameLocation $Game_HomeTeamID>
<IFNOTEMPTY $Game_SchoolName>
<IFNOTEMPTY $Game_SchoolAddress>
<?PHP
$Map_Address = str_replace(" ", "+", trim($Game_SchoolAddress) . "&csz=" . trim($Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip));
//$Map_Address = str_replace(" ", "+", $Game_SchoolAddress . "&csz=" . $Game_SchoolCity . ",+" . $Game_SchoolState . "+" . $Game_SchoolZip);
?>
                <span>(at <a href="http://maps.yahoo.com/py/maps.py?addr={$Map_Address}" title="Get a map and directions to the field">{$Game_SchoolName}</a>)</span>
</IFNOTEMPTY>
</IFNOTEMPTY>
</IFNOTEQUAL>


</IFNOTEMPTY>### Close out the logic for a gentler display of meet events ###
<?PHP } ?>


<IFTRUE $Game_GameIsConference || $Game_GameIsTournament || $Game_GameIsPlayoff || $SportIDCurrent == 13 || $SportIDCurrent == 14 || $SportIDCurrent == 16 || $SportIDCurrent == 17 || $SportIDCurrent == 18 || $SportIDCurrent == 19 || $SportIDCurrent == 23 || $SportIDCurrent == 25 || $SportIDCurrent == 28 || $SportIDCurrent == 31>
<ELSE>
{$mySkedWord}
</IFTRUE>

<?PHP if ($Game_GameStatStatus > 2 ) { ?>
                <em><a href="{$domainURL}/boxscores/{$Game_GameID}/">Boxscore</a></em>
<?PHP } ?>
<?PHP if ($Game_GameStatStatus <= 2 && $sportType == 0 ) { ?>
                <em><a href="{$domainURL}/boxscores/{$Game_GameID}/">Preview</a></em>
<?PHP } ?>
</h6>
</RESULTS>
</div>

### ------------------------------------------------------------------------ ###
### Schedule Nav - Bottom ###
### ------------------------------------------------------------------------ ###
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

</IFGREATER>
</h4>
</IFNOTEMPTY>
