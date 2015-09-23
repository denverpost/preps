// Look up proper nouns in an article against a lookup table of proper nouns to URLs.
// If there's a match, link the proper noun to the URL.
// Uses jQuery.

var lookup = {
  'Kanye West': 'http://kanyewest.com/',
  'Cherry Creek': 'http://preps.denverpost.com/schools/cherry-creek/10/',
  'The Denver Post': 'http://www.denverpost.com/'
}

var matcher = {
    config: {
        file: 'http://extras.denverpost.com/app/preps/prep_lookup.js',
        file: 'http://localhost/work/preps/site/prep_lookup.js',
        lookup_object: 'preps_schools'
        //section: ''
    },
    update_config: function (config) {
        // Take an external config object and update this config object.
        for ( var key in config )
        {
            if ( config.hasOwnProperty(key) )
            {
                this.config[key] = config[key];
            }
        }
    },
    regex: new RegExp(/\b([A-Z][a-z]+)\s(([A-Z][a-z]+)\s?)+\b/gm),
    init: function () {

        // Config handling. External config objects must be named matcher_config
        if ( typeof window.matcher_config !== 'undefined' )
        {
            this.update_config(matcher_config);
        }

        $.getScript(this.config.file, function()
        {
            $('#articleBody p, #articleBody td').each( function() { 
                //console.log($(this).text());
              var results = $(this).text().match(this.regex);

              if ( results !== null )
              {
                
                var count = results.length;
                for ( var i = 0; i < count; i++ )
                {
                  if ( preps_schools.hasOwnProperty(results[i]) )
                  {
                    // Replace the first instance of the text with the linked text,
                    // then remove the lookup from the object so we don't link it again.
                    $(this).html($(this).html().replace(results[i], '<a href="' + preps_schools[results[i]] + '">' + results[i] + '</a>'));
                    delete(preps_schools[results[i]]);
                  }
                }
              }

            });
        });
    }
}
