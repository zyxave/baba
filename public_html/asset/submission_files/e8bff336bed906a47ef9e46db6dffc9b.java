/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.util.HashMap;
import java.util.Scanner;
import java.util.HashSet;
import java.util.Map;
/**
 *
 * @author wojia
 */
class Main {
	
    public static String solve(Scanner scanner) {
        String s=scanner.next();
        int l=s.length();
        HashMap<String, Integer>[] maps=new HashMap[l+1];
        HashSet<String>[] sets=new HashSet[l+1];
        int[] ans=new int[l+1];
        for (int i=0;i<=l;i++) {
            maps[i]=new HashMap<>();
            sets[i]=new HashSet<>();
        }
        maps[0].put("", 0);
        sets[0].add("");

        for (int i=1;i<=l;i++) {

            // calculate all strings
            sets[i].addAll(sets[i-1]);
            for (int j=0;j<i;j++)
                sets[i].add(s.substring(j, i));

            ans[i]=99999999;

            // add letter to the end
            for (Map.Entry<String, Integer> entry: maps[i-1].entrySet()) {
                maps[i].put(entry.getKey(), entry.getValue()+1);
                ans[i]=Math.min(ans[i], entry.getValue()+1);
            }

            // copy
            for (int j=i-1;j>=0;j--) {
                String copy=s.substring(j, i);
                // cannot copy
                if (!sets[j].contains(copy)) continue;
                // paste directly
                maps[i].put(copy, Math.min(maps[i].getOrDefault(copy, 99999999),
                        maps[j].getOrDefault(copy, 99999999)+1));
                // copy & paste
                maps[i].put(copy, Math.min(maps[i].get(copy), ans[j]+2));

                ans[i]=Math.min(ans[i], maps[i].get(copy));
            }
        }
        return String.valueOf(ans[l]);
    }

    public static void main(String[] args) {
        Scanner scanner=new Scanner(System.in);
        int times=Integer.parseInt(scanner.nextLine());
        for (int t=1;t<=times;t++) {
            System.out.println(solve(scanner));
        }
    }
    
}
