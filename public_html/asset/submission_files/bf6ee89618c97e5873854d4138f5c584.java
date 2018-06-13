import java.util.Scanner;

class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        while (T-- > 0)
        {
            int p = in.nextInt();
            int a = in.nextInt();
            int m = in.nextInt();
            int r = in.nextInt();
            int count = 0;
            while (r > 0)
            {
                r -= p;
                if (r < 0)
                    break;
                count++;
                p = Math.max(p - a, m);
            }
            System.out.println(count);
        }
    }
    
}
