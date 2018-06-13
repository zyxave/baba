import java.util.HashSet;
import java.util.Scanner;
import java.util.Set;

class Main {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int T = Integer.parseInt(in.nextLine());
        while (T-- > 0)
        {
            int n = Integer.parseInt(in.nextLine());
            Set<String> set = new HashSet<>();
            String result = "";
            for (int i = 0; i < n; i++)
            {
                String[] token = in.nextLine().split(" ");
                String r1 = String.valueOf(token[0].charAt(0)) +
                        String.valueOf(token[0].charAt(1));
                String r2 = String.valueOf(token[1].charAt(0)) + "";

                String s1 = r1 + String.valueOf(token[0].charAt(2));
                String s2 = r1 + r2;
                if (!result.equals("GAGAL "))
                    if (!set.contains(s1))
                    {
                        set.add(s1);
                        result += s1.toUpperCase() + " ";
                    }
                    else if (!set.contains(s2))
                    {
                        set.add(s2);
                        result += s2 + " "; 
                    }
                    else
                    {
                        result = "GAGAL ";
                    }
            }
            System.out.println(result);
        }
    }

}
