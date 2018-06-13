
import java.util.Scanner;

class Main {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
            int[] p = new int[t];
            int[] a = new int[t];
            int[] m = new int[t];
            int[] r = new int[t];
            int[] x = new int [t];
            for(int z=0;z<t;z++){
             p[z] = scan.nextInt();
             a[z] = scan.nextInt();
             m[z] = scan.nextInt();
             r[z] = scan.nextInt();
            x[z] = 0;

            r[z] -= p[z];
            x[z] += 1;
            while (p[z] > m[z]) {
                p[z] = p[z] - a[z];
                r[z] -= p[z];
                x[z]++;
            }
            while (r[z] > m[z]) {
                r[z] -= m[z];
                x[z]++;
            }}
            for(int ss=0;ss<t;ss++){
            
            System.out.println(x[ss]);
            }
        

    }

}
