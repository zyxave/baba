
import java.util.Scanner;
/**
 *
 * @author ILPC
 */
public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        int t;
        int a, b;
        int c = 0;
        t = sc.nextInt();
        a = sc.nextInt();
        b = sc.nextInt();
        for(int x = 0;x<t;x++){
        for (int i = a; i < b; i++) {
            if(i/10 == i%10){
                c +=1;
            }
        }
        System.out.println(c);
        }
        // TODO code application logic here
    }
    
}
