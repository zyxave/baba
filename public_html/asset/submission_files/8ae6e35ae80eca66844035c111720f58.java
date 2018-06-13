import java.util.*;

class Main {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int t = Integer.parseInt(in.nextLine());
        for(int a0 = 0; a0 < t; a0++){
            int n = Integer.parseInt(in.nextLine());
            String s = in.nextLine();
            String[] token = s.split(" ");
            int sum = 0;
            for (String y : token)
            {
                for (char x : y.toCharArray())
                {
                    sum += Character.getNumericValue(x);
                }
            }
            if (sum % 3 == 0)
                System.out.println("Yes");
            else
                System.out.println("No");
        }
        in.close();
    }
}
