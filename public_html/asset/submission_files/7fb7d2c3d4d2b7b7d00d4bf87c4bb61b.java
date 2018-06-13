/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.Scanner;
import java.util.Arrays;
import java.util.HashMap;

/**
 *
 * @author wojia
 */
class Main {

    private static long pow(long x, int k, long mod) {
        if (k==0) 
			return 1;
        long p=pow(x, k/2, mod)%mod;
        
		return p * p % mod * (k % 2 != 0 ? x:1) %mod;
    }

    public static void main(String[] args) throws Exception {
        Scanner in=new Scanner(System.in);
        int T = in.nextInt();
		while (T-- > 0)
		{
			int n = in.nextInt();
			long[] a = new long[n];
			for (int i = 0; i < n; i++) 
				a[i] = in.nextLong();
			
			Arrays.sort(a);
			
			long mod = 1000000007L;
			long ans = 0;
			HashMap<Integer, Long> map=new HashMap<>();
			for (int i = 0; i <= 10000; i++) 
				map.put(i, pow(2L, i, mod));
			for (int i = 0; i < n; i++) 
			{
				for (int j = i + 1; j < n; j++) 
				{
					ans+=(a[j] - a[i])*map.get(j - i - 1);
					ans%=mod;
				}
			}
			System.out.println(ans);
        }
    }
    
}
