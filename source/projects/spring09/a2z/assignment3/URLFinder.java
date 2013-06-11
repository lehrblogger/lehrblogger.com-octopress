import com.decontextualize.a2z.TextFilter;
import java.util.HashMap;
import java.util.Set;
import java.util.Iterator;
import java.util.Map.Entry;
import java.util.regex.*;

public class URLFinder extends TextFilter {
  public static void main(String[] args) {
    new URLFinder().run();
  }

  HashMap urlCounts = new HashMap();
  Pattern p = Pattern.compile("<title>.*(http://)(\\S+)(.*)(</title>)+", Pattern.CASE_INSENSITIVE);
  
  public void eachLine(String line) {
    String url = findURL(line).toLowerCase();
    if (url != "") {
      if (urlCounts.containsKey(url)) {
        int curCount = ((Integer) urlCounts.get(url)).intValue();
        urlCounts.put(url, curCount + 1);
      } else {
        urlCounts.put(url, 1);
      }
    }
  }

  public void end() {
    Iterator iter = urlCounts.entrySet().iterator();
    
    while (iter.hasNext()) {
      Entry entry = (Entry) iter.next();
      print(entry.getValue().toString() + " - ");
      print(entry.getKey().toString());
      println();
    }
  }

  private String findURL(String line) {
    Matcher m = p.matcher(line);
    if (m.find()) {
      return(m.group(1) + m.group(2));
    } else { 
      return ("");
    }
  }
}
