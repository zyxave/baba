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
class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner in = new Scanner(System.in);
        int T = Integer.parseInt(in.nextLine());
        while (T-- > 0)
        {
            String s= in.nextLine();
            String res = "";
            char prev = '-';
            for (int i = 0;i < s.length(); i++)
            {
                char x = s.charAt(i);
                if (Character.isUpperCase(x) && prev != '-')
                {
                    res += String.format("-%s", x);
                    prev = x;
                }
                else if ((x == '_' || x == ' ') && prev != '-')
                {
                    res += String.format("-");
                    prev = '-';
                }
                else
                {
                    res += String.valueOf(x);
                    prev = x;
                }
            }
            System.out.println(res.toLowerCase());
        }
    }
    
}
