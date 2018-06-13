/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ILPC
 */
import java.util.Scanner;
import java.util.Arrays;

public class Main {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        
        int t = sc.nextInt();
        for(int i = 0;i < t;i++){
            int n = sc.nextInt();//jumlah buku
            int m = sc.nextInt();//jumlah duid
            int max  = 0;
            int[] r = new int[sc.nextInt()];
            int[] u = new int[r.length];
            Arrays.fill(r, 0);
            
            for(int j = 0;j < r.length;j++){
               r[j] = sc.nextInt();
               
            }
            
            for(int j = 0;j < r.length;j++){
                for(int k = 0;k < r.length;k++){
                    if(max < j + k)
                        max = j + k;
                    else
                        break;
                }
            }
        }
        
        System.out.println("Billy Rapopo");
    }
    
}
