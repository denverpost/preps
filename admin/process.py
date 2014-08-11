#!/usr/bin/env python
# Take a list of id's and filename slugs, 
# rename, move and parse out the appropriate text in the ids.
import os
import re

fileinput = 'webtemplate.ids.txt'
dir = 'files/webtemplates'
textarea_pattern = '<textarea tabindex="30" id="Template" name="WebTemplateTemplate" rows="40" cols="80" class="field textarea large">(.*)</textarea>'

# Loop through the list of ids and filename slugs.
f = open(fileinput)
try:
    for line in f:
        # Separate the id and the filename slug
        id, slug = line.split('\t')
        file_out = open('./' + id)
        file_content = file_out.read()

        # We know the content we want is between textarea tags,
        # and we know there's only one set of textarea tags.
        textarea_match = re.search(textarea_pattern, file_content, re.DOTALL)
        try:
            file_content_parsed = textarea_match.groups()[0]

            # Write the content, delete the source file.
            fn = './%s/%s---%s.php' % (dir, slug.strip(), id)
            print fn
            file_new = open(fn, 'wb')
            file_new.write(file_content_parsed)
            file_new.close()
        except:
            print 'Could not parse out text of %s---%s' % (slug.strip(), id)
        
        file_out.close()
        os.remove('./' + id)
finally:
    f.close()
