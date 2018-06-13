import java.util.Scanner;

class Main {

    public static void main(String[] args) {
		Scanner in = new Scanner(System.in);
		int T = Integer.parseInt(in.nextLine());
		while (T-- > 0)
        {
            int B = Integer.parseInt(in.nextLine());
            String input = in.nextLine();
            for (int i = 0; i < B; i++)
            {
                String t = input.substring(i * 8, (i + 1) * 8);
                int pow = 7;
                int sum = 0;
                for (char x : t.toCharArray())
                {
                    if (x == 'P')
                        sum += Math.pow(2, pow);
                    pow--;
                }
				System.out.print((char)sum);
			}
            System.out.println("");
        }
    }   
}