/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package kard;

import java.util.Scanner;
public class Kard {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner sc = new Scanner(System.in);
        int t = sc.nextInt();
        int[] n = new int[t];
        int[] k = new int[t];
        for(int i = 0; i < t; i++){
            n[i] = sc.nextInt();
            k[i] = sc.nextInt();
        }
        for(int i = 0; i < t; i++){
            int a;
            String c = "";
            for(int l = 0; l < k[i]; l++){
                c = c + String.valueOf(n[i]);
            }
            a = Integer.parseInt(c);
            int b = 0;
            while (c.length() >1){
                for(int j = 0; j < c.length(); j++){
                    //b += Integer.parseInt(c.substring(j, 1));
                    System.out.println(c.substring(j, 1));
                }
                c = String.valueOf(b);
            }
            System.out.println(c);
        }
    }
    
}
