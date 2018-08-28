<VAR $domainURL = "http://preps.denverpost.com">
<VAR $externalURL = "http://preps.denverpost.com/home.html?">
<IFNOTEMPTY $form_Sport>
<QUERY name=Sport SPORTID=$form_Sport>
<VAR $sportName=$Sport_SportName>
<VAR $sqlSportName=strtolower(convertForSQL($sportName))>
</IFNOTEMPTY>
<IFEQUAL $sportName "Football">
<INCLUDE site=default tpl=Leaders_Football>
</IFEQUAL>
<IFEQUAL $sportName "Boys Basketball">
<INCLUDE site=default tpl=Leaders_Basketball>
</IFEQUAL>
