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
            /*
            int k = 0;
            int sumK = 0;
            double count = k + 1;

            if (s < p)
                System.out.println(0);
            else
            {
                k = (p-m)/d;
                sumK = (k+1)*p-k*(k+1)*d/2;
                if (s >= sumK)
                {
                    s -= sumK;
                    count += s/m;
                }
                else
                {
                    double D = (d/2.0 - p) * 2 - 2 * d * (s - p);
                    count = (-d/2.0+p-Math.sqrt(D))/d;
                    count = (int)count + 1;
                }
            }
            System.out.println((int)count);*/
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
