import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        Scanner s = new Scanner(System.in);
        int t = s.nextInt();
        int out = 0;
        for(int i = 1; i <= t; i++)
        {
            int n = s.nextInt();
            int d = s.nextInt();
            int r = s.nextInt();
            for(int x = 1; x <= n; x++)
            {
                int projectx = s.nextInt();
                int projecty = s.nextInt();
                int hitung = (projectx+projecty) * r;
                int over = hitung - (d*r);
				if(over > 0) {
					out += over;
				}
            }
        }
        System.out.println(out);
    }
}