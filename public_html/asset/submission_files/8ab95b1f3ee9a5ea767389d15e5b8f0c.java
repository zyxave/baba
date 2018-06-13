/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Scanner;

/**
 *
 * @author wojia
 */
class SemifinalPos5GCD {

    /*
    POLA :
    f(3)= 1,8 + 2,8 + 3,8 + 4,8 + 5,8 + 6,8 + 7,8 + 8,8
        = 1/1 + 2/2 + 3/1 + 4/4 + 5/1 + 6/2 + 7/1 + 8/8
        = (1,8 + 3,8 + 5,8 + 7,8) + (2,8 + 4,8 + 8,8) + (6,8)
        = (1 + 3 + 5 + 7) +
          (1 + 1 + 1) +
          (2)
        = 16 + 3 + 2
    f(4) = 1,16 + 2,16 + 3,16 + 4,16 + 5,16 + 6,16 + 7,16 + 8,16 + 9,16
         + 10,16 + 11,16 + 12,16 + 13,16 + 14,16 + 15,16 + 16,16
    
         = (1 + 3 + 5 + 7 + 9 + 11 + 13 + 15)
         + (2,16 + 4,16 + 8,16 + 16,16) || (1 + 1 + 1 + 1)
         //Tidak dipakai, karna habis dibagi bil prima)+ (6,16 + 10,16 + 12,16 + 14,16) || (2 + 2 + 3 + 2)
         2 * (3 + 5 + 7)
         4 * (3)
         
        6 10 12 14 18 20 22 24 26 28 30
        
         2 * (3 + 5 + 7 + 9 + 11 + 13 + 15 + ... + 31) 15
         4 * (3 + 5 + 7 + 9 + 11 + 13 + 15) || 7 (-8) +
         8 * (3 + 5 + 7) || 3 (-4)
    
    LIST    -> GCD
    6 10    -> 2
    12      -> 4
    14      -> 2
    18      -> 
        
    */
    
    private static long pow(long x, int k, long mod) {
        if (k==0) return 1;
        long p=pow(x, k/2, mod)%mod;
        return p*p%mod*(k%2!=0?x:1)%mod;
    }
    
    static long m = 1000000007;
    //HMMM
    private static long geoSum(long a, long r, int n)
    {
        //a * (1 - r^n) / 1 - r mod 
        //(((a mod m) * (1 mod m - r^n mod m))mod m) / (1 - r) mod m
        return (((a % m) * (1 % m - pow(2,n, m)))% m) / (1 - r) % m;
    }
    //END HMMMM
    private static long aritSum(int a, long u)
    {
        long n = (u + 1)/ 2;
        //(n / 2) * (a + u) mod m
        //u = 2^n - 1
        //(((n % m / 2 % m)% m)% m * (a + u) % m)%m 
        //return (int)((double)n/2d * (a + u));
        return (int)(((n % m / 2d % m)% m)% m * (a + u) % m)%m;
    }

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        while (T-- > 0)
        {
            int N = in.nextInt();
            long sumGanjil = aritSum(1, pow(2, N, m) - 1);
            System.out.println((sumGanjil + N) % m);
        }
    }
}
