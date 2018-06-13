/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.*;

/**
 *
 * @author wojia
 */
class Main {

    static void printSet(HashSet<String> set)
    {
        System.out.println(set);
        System.out.println("--------------------------------");
    }
	
    public static String solve(Scanner scanner) {
        int n=Integer.parseInt(scanner.nextLine());
        HashSet<String> set=new HashSet<>();
        for (int i=0;i<n;i++) set.add(scanner.nextLine());
        int m=Integer.parseInt(scanner.nextLine()), cnt=0;
        HashSet<String> able=new HashSet<>(set);
        while (m-->0) {
            String s=scanner.nextLine();
            able.remove(s);
            if (able.isEmpty()) {
                cnt++;
                able=new HashSet<>(set);
                able.remove(s);
            }
        }
        return String.valueOf(cnt);
    }

    public static void main(String[] args) {
        //System.setOut(new PrintStream("output.txt"));
        Scanner scanner=new Scanner(System.in);
        int times=Integer.parseInt(scanner.nextLine());
        for (int t=1;t<=times;t++) {
			System.out.println(solve(scanner));
        }
    }
    
}
