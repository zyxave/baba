import java.util.Scanner;
class Main {
    public static void main(String[] args) {
        Scanner s = new Scanner(System.in);
        int t = s.nextInt();
		int hitung = 0;
        for(int i = 1; i <= t; i++)
        {
            int p = s.nextInt(), a = s.nextInt(), m = s.nextInt(), r = s.nextInt();
			hitung = 0;
            while(r >= p)
            {
				r -= p;
                if(r >= 1) {
                    hitung++;
                }
				if(m <= p)
				{
					p -= a;
				}
            }
			System.out.println(hitung);
        }
    }
}
