import java.util.scanner;
class Main {
    public static void main(String[] args) {
        Scanner s = new Scanner(System.in);
        int t = s.nextInt();
        for(int i = 1; i <= t; i++)
        {
            int p = s.nextInt(), a = s.nextInt(), m = s.nextInt(), r = s.nextInt();
			int hitung = 0;
			while(r >= p)
						{
				r -= p;
				p -= a;
				if(p < m)
				{
					p = m;
				}
				hitung++;
			}
			System.out.println(hitung);
        }
    }
}