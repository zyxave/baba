
import java.util.Scanner;
class Main {

    public static void main(String[] args) {
  
      Scanner sc = new Scanner(System.in);
        int loop = sc.nextInt();
        
        for(int n = 0 ; n< loop;n++)
        {
            String line = sc.next();
        int jml = line.length() - line.replace(line.substring(0,1), "").length();
        int helper = 0;
        String hsl = "";
        for(int i = 0 ; i<line.length()-1; i++)
        {
            helper = line.length() - line.replace(line.substring(i,i+1), "").length();
            if(helper == jml)
            {
                hsl = "YES";
            }
            else
            {
                hsl = "NO";
                break;
            }
        }     
        System.out.println(hsl);    
    }
    
}
