import java.util.*;class Main {public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        int[] H = new int[T];
        for (int i = 0; i < T; i++) {
            int A = in.nextInt();
            int B = in.nextInt();
            int s = A-B;
            int k =0;
            k+=s/100;
            s%=100;
            k+=s/20;
            s%=20;
            k+=s/5;
            s%=5;
            k+=s;
            H[i]=k;
        }
        for (int j = 0; j < T; j++) {
            System.out.println(H[j]);
        }}}