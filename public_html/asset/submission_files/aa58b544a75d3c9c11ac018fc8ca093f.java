
import java.util.Scanner;
class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        
        int lTime = sc.nextInt();
        int t = 0;
        
        for(int i = 0;i < lTime;i++){
            t = 0;
            int  n = sc.nextInt();
            
            t = (10 * 10 * 10 * 10 * 10 * 10 * 10 * 10 * 10) + 7;
            t = t % n;
            System.out.println(t);
        }
    }
}
