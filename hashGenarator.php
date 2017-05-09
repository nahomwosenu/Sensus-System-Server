import javax.swing.*;
import java.awt.*;
import java.awt.event.*;
public class Stemmer{
 final String[] prefix={"pre","im","in","non"};
 final String[] suffix={"ize","ing","ed","er","les"};
 final String[] COMMON={"is","are","was","the","they","there","where","when"};
 public String stem(String word){
 int i=0;
  while(!word.contains(prefix[i])){
   if(word.contains(prefix[i]))
     word=word.remove(prefix[i]);
   }
 }
 public boolean isToken(String word){
 
 }
 
}