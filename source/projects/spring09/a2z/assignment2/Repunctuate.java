import com.decontextualize.a2z.TextFilter;
import java.util.Random;

public class Repunctuate extends TextFilter {
  Random rand;

  public static void main(String[] args) {
    Repunctuate e = new Repunctuate();
    e.run();
  }
  
  public Repunctuate() {
    super();
    rand = new Random();
  }
  
  public void eachLine(String line) {
   char[] charArr = line.toCharArray(); 
                            // It might be easier to do this without the Array using line.charAt instead, but
                            // we needed to use something from Java's String class that we hadn't discussed in class.
                            // It does make the code below slightly shorter though.
   
   for(int i = 0; i < charArr.length; i++) {
     if (Character.isLetter(charArr[i]) || Character.isWhitespace(charArr[i])) {
       print(Character.toLowerCase(charArr[i]));
     } else if ((charArr[i] == '\'' ) || (charArr[i] == '\"' )) {
       print(Character.toLowerCase(charArr[i]));

     } else {
       print(randomPunctuation());
     }
   }
   println();
  }

  private char randomPunctuation() {
  	String punctuationList = ".?!,;:-/";
  	
    return punctuationList.charAt(rand.nextInt(punctuationList.length()));
  }
}
