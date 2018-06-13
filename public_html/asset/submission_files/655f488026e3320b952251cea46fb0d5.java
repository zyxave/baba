import java.util.Scanner;
class Main {
    public static void main(String[] args) {
        Scanner s = new Scanner(System.in);
        int t = s.nextInt();
        for(int i = 1; i <= t; i++)
        {
            int n = s.nextInt();
            int d = s.nextInt();
            int r = s.nextInt();
			int out = 0;
            for(int x = 1; x <= n; x++)
            {
                int projectx = s.nextInt();
                int projecty = s.nextInt();
                int hitung = (projectx+projecty);
                int over = hitung - d;
				if(over > 0) {
					out += over*r;
				}
            }
			System.out.println(out);
        }
    }
}