<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<VAR $TeamInitialCharacter = "A">
<VAR $ConferenceInitialCharacter = "5">

### Set default values for start and count ###
<?PHP if ( intval($form_Sport) < 0 ) { $form_Sport = False; } ?>
<IFEMPTY $form_Sport><VAR $form_Sport="No Search Query Entered"></IFEMPTY>

<QUERY name=Sport prefix=Sport SPORTID=$form_Sport>
<IFEMPTY $Sport_SportName>
<QUERY name=Sports>
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>
<h1>Prep Sport Results + Schedules in Colorado</h1>

<h2>Fall Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=13" title="Prep Boys Cross Country in Colorado">Boys Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=14" title="Prep Girls Cross Country in Colorado">Girls Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=32" title="Prep Field Hockey in Colorado">Field Hockey</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=1" title="Prep Football in Colorado">Football</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=18" title="Prep Boys Golf in Colorado">Boys Golf</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=33" title="Prep Girls Gymnastics in Colorado">Girls Gymnastics</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=12" title="Prep Boys Soccer in Colorado">Boys Soccer</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=30" title="Prep Softball in Colorado">Softball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=27" title="Prep Boys Tennis in Colorado">Boys Tennis</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=11" title="Prep Girls Volleyball in Colorado">Girls Volleyball</a></h3>

<h2>Winter Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=6" title="Prep Boys Basketball in Colorado">Boys Basketball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=21" title="Prep Girls Basketball in Colorado">Girls Basketball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=34" title="Prep Ice Hockey in Colorado">Ice Hockey</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=17" title="Prep Girls Swimming and Diving in Colorado">Girls Swimming and Diving</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=23" title="Prep Wrestling in Colorado">Wrestling</a></h3>


<h2>Spring Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=29" title="Prep Baseball in Colorado">Baseball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=19" title="Prep Girls Golf in Colorado">Girls Golf</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=35" title="Prep Boys Lacrosse in Colorado">Boys Lacrosse</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=36" title="Prep Girls Lacrosse in Colorado">Girls Lacrosse</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=15" title="Prep Girls Soccer in Colorado">Girls Soccer</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=16" title="Prep Boys Swimming and Diving in Colorado">Boys Swimming and Diving</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&amp;tpl=Sport&amp;Sport=31" title="Prep Girls Tennis in Colorado">Girls Tennis</a></h3>




###
<hr>
<RESULTS list=Sports_rows prefix=Sport>
<h2 class="list"><a href="{$externalURL}site=default&tpl=Sport&Sport={$Sport_SportID}" title="Prep {$Sport_SportName} in Colorado">{$Sport_SportName}</a></h2>
</RESULTS>
###

<ELSE>


<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
    &rsaquo; <a href="{$externalURL}site=default&tpl=Sport&Sport">Sport Results</a>
</div>
<h1>Prep {$Sport_SportName} Results in Colorado</h1>
<ul id="subnav">
	<li><a href="#results">Prep {$Sport_SportName} recent results</a></li>
	<li><a href="#games">Prep {$Sport_SportName} schedule</a></li>
### Only show the leader subnav for sports that have leaders ###
<IFTRUE $Sport_SportName == "Football" || $Sport_SportName == "Boys Basketball" || $Sport_SportName == "Wrestling" || $Sport_SportName == "Boys Swimming and Diving" || $Sport_SportName == "Girls Swimming and Diving" || $Sport_SportName == "Girls Volleyball" || $Sport_SportName == "Softball" || $Sport_SportName == "Boys Golf" || $Sport_SportName == "Girls Golf" || $Sport_SportName == "Boys Soccer" || $Sport_SportName == "Girls Soccer" >
	<li><a href="#leaders">Prep {$Sport_SportName} leaders</a></li>
</IFTRUE>
	<li><a href="#conference">Prep {$Sport_SportName}, by conference</a></li>
	<li><a href="#school">Prep {$Sport_SportName}, by school</a></li>
</ul>

<a name="results"></a>
<h2>Recent Prep {$Sport_SportName} Results</h2>
<VAR $form_SearchDate>
<IFEMPTY $form_SearchDateEnd><VAR $form_SearchDateEnd = date("m/d/Y")></IFEMPTY>
<VAR $schedule_type = "results">
<INCLUDE site=default tpl=ScheduleResultsWrapper>




<a name="games"></a>
<h2>This week's Prep {$Sport_SportName} Games</h2>

<VAR $form_count = 250>
<VAR $count = $form_count>
<VAR $form_SearchDate = date("m/d/Y")>
<?PHP
// To show the remainder of this week's schedule,
// we need to figure out what day is the next Saturday.
$saturday = 6;
$this_day = date("w");
$days_until_saturday = $saturday - $this_day;
$saturday_date = strtotime("+$days_until_saturday days");
?>
<VAR $form_SearchDateEnd = date("m/d/Y", $saturday_date)>
<VAR $schedule_type = "schedule">
<INCLUDE site=default tpl=ScheduleInclude>




<a name="leaders"></a>
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Leaders_Football>
</IFEQUAL>
<IFEQUAL $sportName "Girls Volleyball">
<INCLUDE site=default tpl=Leaders_Volleyball>
</IFEQUAL>
<IFEQUAL $sportName "Boys Golf" || $sportName == "Girls Golf">
<INCLUDE site=default tpl=Leaders_Golf>
</IFEQUAL>
<IFTRUE $sportName == "Softball" || $sportName == "Baseball">
<INCLUDE site=default tpl=Leaders_Baseball>
</IFTRUE>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Leaders_Basketball>
</IFEQUAL>
<IFEQUAL $sportName "Wrestling">
<INCLUDE site=default tpl=Leaders_Wrestling>
</IFEQUAL>
<IFTRUE $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving">
<INCLUDE site=default tpl=Leaders_Swimming>
</IFTRUE>
<IFTRUE $sportName == "Boys Soccer" || $sportName == "Girls Soccer">
<VAR $count = 25>
<INCLUDE site=default tpl=Leaders_Soccer>
</IFTRUE>

<IFTRUE $sportName == "Football" || $sportName == "Boys Basketball" || $sportName == "Wrestling" || $sportName == "Boys Swimming and Diving" || $sportName == "Girls Swimming and Diving" || $sportName == "Softball" || $sportName == "Baseball" || $sportName == "Girls Volleyball" || $sportName == "Boys Golf" || $sportName == "Girls Golf" || $sportName == "Boys Soccer" || $sportName == "Girls Soccer">
<a name="class"></a>
<h2>Prep {$Sport_SportName} Leaders, By Class</h2>
<QUERY name=ClassesForSport SPORTID=$form_Sport>
<ul>
<RESULTS list=ClassesForSport_rows prefix=Class>
<li><a href="{$externalURL}site=default&tpl=Class&Sport={$form_Sport}&ClassID={$Class_ClassID}">{$Class_ClassName} {$Sport_SportName} leaders</a></li></RESULTS>
</ul>
</IFTRUE>

<div style="width:200px; float:left;">
<a name="conference"></a>
<h2>{$Sport_SportName}, By Conference</h2>
<ul class="namelist">	<!-- Tier 3 -->
	<VAR $IndexLetter = "">
	<VAR $newIndexLetter = "">
	<QUERY name=ConferencesForSport SPORTID=$form_Sport>
		<IFGREATER count($ConferencesForSport_rows) 0>

		<li>{$ConfInitialCharacter}
			<ul>	<!-- Tier 4 -->
			<RESULTS list=ConferencesForSport_rows prefix=Conf>
				

				<VAR $IndexLetter = $newIndexLetter>
				<VAR $newIndexLetter = strtoupper(substr($Conf_ConferenceName, 0, 1))>
				<IFNOTEQUAL $newIndexLetter "">
				<IFNOTEQUAL $newIndexLetter $ConfInitialCharacter>
					<IFNOTEQUAL $newIndexLetter $IndexLetter>
		</ul></li>	<!-- /Tier 4 -->
		<li><a name="conferences-{$newIndexLetter}" href="#conferences-{$newIndexLetter}" title="Prep {$Sport_SportName} conferences in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
					</IFNOTEQUAL>
				</IFNOTEQUAL>
				</IFNOTEQUAL>
				
				
				<li><a href="{$externalURL}site=default&tpl=Conference&Sport={$Sport_SportID}&ConferenceID={$Conf_ConferenceID}" title="{$Conf_ConferenceName} conference results and standings for prep {$Sport_SportName} (Colorado)">{$Conf_ConferenceName}</a></li>
			</RESULTS>

	</ul></li>	<!-- /Tier 4 -->
	</IFGREATER>
</ul>	<!-- /Tier 3 -->
</div>

<div style="width:400px; float:left;">
<a name="school"></a>
<h2>{$Sport_SportName}, By School</h2>
<div class="" style="width:200px; float:left;">
<ul class="namelist">	<!-- Tier 3 -->
	<VAR $IndexLetter = "">
	<VAR $newIndexLetter = "">
	<QUERY name=SportTeams_dev SPORTID=$form_Sport>
		<IFGREATER count($SportTeams_dev_rows) 1>

		<li>{$TeamInitialCharacter}
			<ul>	<!-- Tier 4 -->
			<RESULTS list=SportTeams_dev_rows prefix=Team>
				

				<VAR $IndexLetter = $newIndexLetter>
				<VAR $newIndexLetter = strtoupper(substr($Team_TeamName, 0, 1))>
				<IFNOTEQUAL $newIndexLetter "">
				<IFNOTEQUAL $newIndexLetter $TeamInitialCharacter>
					<IFNOTEQUAL $newIndexLetter $IndexLetter>
                        ### This logic allows for two columns on the list. ###
                        <IFEQUAL $newIndexLetter "L">
		</ul></li>	<!-- /Tier 4 -->
</ul>	<!-- /Tier 3 -->
</div>
<div class="" style="width:200px; float:left;">
<ul class="namelist">	<!-- Tier 3 -->
		<li><a name="teams-{$newIndexLetter}" href="#teams-{$newIndexLetter}" title="Prep {$Sport_SportName} teams in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
                        <ELSE>
		</ul></li>	<!-- /Tier 4 -->
		<li><a name="teams-{$newIndexLetter}" href="#teams-{$newIndexLetter}" title="Prep {$Sport_SportName} teams in Colorado with names that start with the letter {$newIndexLetter}">{$newIndexLetter}</a>
			<ul>	<!-- Tier 4 -->
                        </IFEQUAL>
					</IFNOTEQUAL>
				</IFNOTEQUAL>
				</IFNOTEQUAL>
				
				
				<li><a href="{$externalURL}site=default&tpl=Team&Sport={$Sport_SportID}&TeamID={$Team_TeamID}" title="{$Team_TeamName} prep {$Sport_SportName} team and player stats, schedule and standings.">{$Team_TeamName}</a></li>

			</RESULTS>

	</ul></li>	<!-- /Tier 4 -->
	</IFGREATER>
</ul>	<!-- /Tier 3 -->
</div>
</div>


</IFEMPTY>