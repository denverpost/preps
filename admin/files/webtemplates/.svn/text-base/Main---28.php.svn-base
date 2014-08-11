<VAR $externalURL = "http://preps.denverpost.com/home.html?">
    
<div id="breadcrumbs">
    <INCLUDE site=default tpl=TemplateBreadcrumbs>
</div>

<h1>Welcome to Post Preps stats</h1>
<h2>Here we publish Colorado prep sports schedules, results, standings, leaders and more. <a href="{$externalURL}site=default&tpl=About">Read our welcome announcement here</a>, or skip down to <a href="#today">today's game schedule here</a>.</h2>



<h2>Fall Prep Sports in Colorado</h2>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=13" title="Prep Boys Cross Country in Colorado">Boys Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=14" title="Prep Girls Cross Country in Colorado">Girls Cross Country</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=32" title="Prep Field Hockey in Colorado">Field Hockey</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=1" title="Prep Football in Colorado">Football</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=18" title="Prep Boys Golf in Colorado">Boys Golf</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=33" title="Prep Girls Gymnastics in Colorado">Girls Gymnastics</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=12" title="Prep Boys Soccer in Colorado">Boys Soccer</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=30" title="Prep Softball in Colorado">Softball</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=27" title="Prep Boys Tennis in Colorado">Boys Tennis</a></h3>
<h3 class="list"><a href="http://preps.denverpost.com/home.html?site=default&tpl=Sport&Sport=11" title="Prep Girls Volleyball in Colorado">Girls Volleyball</a></h3>



<VAR $form_count = 250>
<VAR $count = 250>


<a name="yesterday"></a>
<h2>Yesterday's Colorado Prep Results</h2>
<?PHP $yesterday = time() - 86400; ?>
<VAR $sort="Sport.SportName, GameDate DESC, GameTime DESC">
<VAR $form_SearchDate = date("m/d/Y", $yesterday)>
<VAR $form_SearchDateEnd = date("m/d/Y", $yesterday)>
<INCLUDE site=default tpl=ScheduleResultsWrapper>
<?PHP
//include("/var/www/denver/tpweb/web/templates/tplScheduleResultsWrapper_default.php");
?>



<?PHP
unset($_REQUEST);
?>

<a name="today"></a>
<h2>Today's Colorado Prep Games and Meets</h2>
<VAR $sort="Sport.SportName, GameDate, GameTime">
<VAR $form_SearchDate = date("m/d/Y")>
<VAR $form_SearchDateEnd = date("m/d/Y")>

<?PHP
//include("/var/www/denver/tpweb/web/templates/tplScheduleInclude_default.php");
?>
<INCLUDE site=default tpl=ScheduleInclude>
### <INCLUDE site=default tpl=TodaySchedule> ###

<!--

-->