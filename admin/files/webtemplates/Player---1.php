<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $webURL = "http://denver-tpweb.newsengin.com/web/graphics/player/">
<VAR $rightSingleQuote = chr(38)."rsaquo;">
<INCLUDE site=default tpl=SportSeasons>
<VAR $dash = chr(151)>
<QUERY name=Player ID=$form_ID>
<QUERY name=PlayerTeams ID=$form_ID>
<VAR $teamCount=count($PlayerTeams_rows)>
<VAR $primaryColor = $Player_SchoolPrimaryColor>
<VAR $secondaryColor = $Player_SchoolSecondaryColor>
<IFEMPTY $primaryColor> <VAR $primaryColor = "#FF883D"> </IFEMPTY>
<IFEMPTY $secondaryColor> <VAR $secondaryColor = "#333399"> </IFEMPTY>
<?PHP $school_slug = slugify($Player_SchoolName); ?>

<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
<VAR $sportName = $PlayerTeams_SportName>
<?PHP $sport_slug = slugify($PlayerTeams_SportName); ?>
</RESULTS>

<div id="breadcrumbs" style="width: 500px">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    {$rightSingleQuote} <a href="{$domainURL}/sport/{$sport_slug}/">{$sportName}</a>
    {$rightSingleQuote} <a href="{$domainURL}/schools/{$school_slug}/{$Player_SchoolID}/">{$Player_SchoolName}</a>
    {$rightSingleQuote} <a href="{$domainURL}/schools/{$school_slug}/{$sport_slug}/{$PlayerTeams_TeamRosterTeamID}/">{$PlayerTeams_SchoolName} {$sportName} Roster</a>
</div>

<div id="preps-section-player">
<h1>
{$Player_PlayerFirstName} {$Player_PlayerLastName}, <IFNOTEMPTY $Player_PlayerYear>{$Player_PlayerYear} at 
</IFNOTEMPTY>{$Player_SchoolName}</h1>
<IFGREATER $Player_PlayerHeightInches 1>
<VAR $inchWord = "inches">
<ELSE>
<VAR $inchWord = "inch">
</IFGREATER>
<IFGREATER $Player_PlayerHeightFeet 0><strong>Height:</strong> {$Player_PlayerHeightFeet} feet<IFGREATER $Player_PlayerHeightInches 0>, {$Player_PlayerHeightInches} {$inchWord}.
</IFGREATER>
</IFGREATER>
<IFGREATER $Player_PlayerWeight 0><strong> Weight: </strong>
{$Player_PlayerWeight}
</IFGREATER>

<p class="list" style="margin-top:10px;">
<IFGREATER $teamCount 0>
<strong>Sports Played:</strong><br>
<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>
<?PHP $sport_slug = slugify($PlayerTeams_SportName); ?>
<A HREF="{$domainURL}/schools/{$school_slug}/{$sport_slug}/{$PlayerTeams_TeamRosterTeamID}/">
{$PlayerTeams_SportName}</A> <IFEMPTY $PlayerTeams_TeamRosterPosition> <ELSE>{$dash}  <IFNOTEMPTY $PlayerTeams_TeamRosterAdditionalPositions>
<strong>Positions:</strong> <ELSE> <strong>Position: </strong></IFNOTEMPTY>{$PlayerTeams_TeamRosterPosition}<IFNOTEMPTY $PlayerTeams_TeamRosterAdditionalPositions>, {$PlayerTeams_TeamRosterAdditionalPositions}</IFEMPTY>###</IFNOTEMPTY>###</IFNOTEMPTY><IFGREATER $teamCount 1> </IFGREATER><br>
</RESULTS>
</IFGREATER>
</p><!-- SCHOOLQUERY -->

<QUERY name=PlayerPhoto ID=$form_ID>
<IFNOTEMPTY $PlayerPhoto_UploadFile>
<div id="player_photo" class="photo">
    ### {$PlayerPhoto_UploadPathFolderFetch}/ ###
    <img src="{$webURL}{$PlayerPhoto_UploadFile}" alt="{$Player_PlayerFirstName} {$Player_PlayerLastName}" />
</div>
</IFNOTEMPTY>

<div id="player_info" class="info" style="display:none;">
    <div>
        <dl>
<IFNOTEQUAL $Player_PlayerHeightFeet 0>
            <dt>Height/Weight:</dt>
            <dd>{$Player_PlayerHeightFeet}' {$Player_PlayerHeightInches}"
<IFNOTEMPTY $Player_PlayerWeight>/{$Player_PlayerWeight}</IFNOTEMPTY></dd>
</IFNOTEQUAL>
        </dl>
    </div>
</div>


<div class="clear" style="margin-bottom:20px;"></div>

<RESULTS list=PlayerTeams_rows prefix=PlayerTeams>

<VAR $teamID = "">
<IFEMPTY $form_TeamID>
<IFGREATER $teamCount 0>
<VAR $teamID = $PlayerTeams_TeamRosterTeamID>
</IFGREATER>
<ELSE>
<VAR $teamID = $form_TeamID>
</IFEMPTY>

<VAR $sportName = "">
<IFNOTEMPTY $teamID>
<QUERY name=TeamSport ID=$teamID>
<VAR $sportName = $TeamSport_SportName>
<VAR $sportType = $TeamSport_SportType>
<VAR $sportTotalEvents = $TeamSport_SportTotalEvents>
<VAR $sqlSportName = strtolower(convertForSQL($sportName))>

<IFEQUAL $sportType 1>
    <IFEQUAL $sportTotalEvents 0>
        <IFTRUE ($sportName == "Boys Tennis") || ($sportName == "Girls Tennis")>
            <QUERY name=PlayerTennisStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
        <ELSE>
            <QUERY name=PlayerMeetNoEventStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
                <!-- Query: {$PlayerMeetNoEventStats_query} -->
        </IFTRUE>
    <ELSE>
        <QUERY name=PlayerMeetStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
<!--                Query: {$PlayerMeetStats_query} -->
    </IFEQUAL>
<ELSE>
###<VAR $seasonYear = "2011">###
    <QUERY name=PlayerSeasonStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
    <QUERY name=PlayerGameStats SPORTNAME=$sqlSportName PLAYERID=$form_ID>
<!--                Query2: {$PlayerSeasonStats_query} -->
</IFEQUAL>

<IFEQUAL $sportName "Girls Basketball">
<INCLUDE site=default tpl=PlayerStats_GirlsBasketball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=PlayerStats_BoysBasketball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Cross Country">
<INCLUDE site=default tpl=PlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Girls Cross Country">
<INCLUDE site=default tpl=PlayerStats_CrossCountry>
</IFEQUAL>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=PlayerStats_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf">
<INCLUDE site=default tpl=PlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Girls Golf">
<INCLUDE site=default tpl=PlayerStats_Golf>
</IFEQUAL>
<IFEQUAL $sportName "Boys Tennis">
<INCLUDE site=default tpl=PlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Girls Tennis">
<INCLUDE site=default tpl=PlayerStats_Tennis>
</IFEQUAL>
<IFEQUAL $sportName "Field Hockey">
<INCLUDE site=default tpl=PlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Boys Lacrosse">
<INCLUDE site=default tpl=PlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Girls Lacrosse">
<INCLUDE site=default tpl=PlayerStats_FieldHockey>
</IFEQUAL>
<IFEQUAL $sportName "Ice Hockey">
<INCLUDE site=default tpl=PlayerStats_Hockey>
</IFEQUAL>
<IFEQUAL $sportName "Girls Soccer">
<INCLUDE site=default tpl=PlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Boys Soccer">
<INCLUDE site=default tpl=PlayerStats_Soccer>
</IFEQUAL>
<IFEQUAL $sportName "Softball">
<INCLUDE site=default tpl=PlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Baseball">
<INCLUDE site=default tpl=PlayerStats_Baseball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<INCLUDE site=default tpl=PlayerStats_Volleyball>
</IFEQUAL>
<IFEQUAL $sportName "Girls Swimming and Diving">
<INCLUDE site=default tpl=PlayerStats_swimming>
</IFEQUAL>
</IFNOTEMPTY>


</RESULTS>

</div>
