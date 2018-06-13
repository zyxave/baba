/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package javaapplication2;

import java.util.Scanner;


/**
 *
 * @author ILPC
 */
 class Main {
    public static void main(String args[]){
        Scanner sc = new Scanner(System.in);
       int n = sc.nextInt();
       int[] arr = new int[n];
       int[] arrs = new int[n];
       for(int i=0; i < n; i++){
           arr[i] = sc.nextInt();
           arrs[i] = sc.nextInt();
           for(int j = arr[i]; j <= arrs[i]; j++){
               int g = 1;
           }
       }       
    }
}
