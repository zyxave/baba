
import java.util.Scanner;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author ILPC
 */
class Main {
    public static void main(String args[]){
        Scanner sc = new Scanner(System.in);
        
        int n = sc.nextInt();
        int[] ar = new int[n];
        for(int i=0; i<n; i++){
            ar[i]=sc.nextInt();
        }
        
        for(int i=0; i<n; i++){
            if(ar[i]%2==0){
            ar[i]= ar[i]*2-1;
            }
            else{
                ar[i]= ar[i]*2-3;
            }
            System.out.println(ar[i]);
        }
       
                
    }
}
