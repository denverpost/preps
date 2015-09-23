// The js to include on the preps article template.
// Loads the lookup, searches for matches.
var p;
p = "http://localhost/work/preps/site/";
$.getScript(p + "matcher.js", function() { matcher.init(); });
