/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication3;

import java.util.Scanner;

/**
 *
 * @author ILPC
 */
class Main {

    public static void main(String args[]) {
        Scanner sc = new Scanner(System.in);

        int n = sc.nextInt();
        int[] a = new int[n];
        int[] b = new int[n];
        int[] q = new int[n];
        int d = 0;
        int g = 0;
        for (int i = 0; i < n; i++) {
            a[i] = sc.nextInt();
            b[i] = sc.nextInt();
            d = a[i];
            g = b[i];
        }
        int qy = sc.nextInt();
        for (int i = 0; i < qy; i++) {
            q[i] = sc.nextInt();
            for (i = 0; i<qy; i++){
                if(q[i] == d){
                    
                }
                System.out.println(g);
            }
        }
    }
}
