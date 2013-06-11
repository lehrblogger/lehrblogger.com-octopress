#!/usr/bin/python

import sys
sys.path.append('/home/memento85/lehrblogger.com/nyu/classes/spring09/a2z/midterm/simplejson-2.0.9')
sys.path.append('./simplejson-2.0.9') #was having minor issues with file paths, this resolved it
import simplejson, urllib

def searchRSS( username='' ):
    url = 'http://feeds.delicious.com/v2/json/' + username + '?count=100'
    result = simplejson.load(urllib.urlopen(url))
    return result
    
bookmarks = searchRSS('lehrblogger')

f = open('/home/memento85/lehrblogger.com/nyu/classes/spring09/a2z/midterm/annotations.xml', 'w')
f.write('<Annotations>\n')
f.write('\n')

for bookmark in bookmarks:
    f.write('\t<Annotation about="' + bookmark['u'].replace( '&', '&amp;')+ '">\n') # & were breaking the XML parser, this fixes them
    f.write('\t\t<Label name="_cse_kucrzepmu5o"/>\n')  #v0.1
    #f.write('\t\t<Label name="_cse_sfvuwbcplki"/>\n') #v0.2
    #f.write('\t\t<Label name="_cse_k4ronzyjnvs"/>\n') #v0.3
    f.write('\t</Annotation>\n')
    f.write('\n')
	
f.write('</Annotations>')
f.close()
