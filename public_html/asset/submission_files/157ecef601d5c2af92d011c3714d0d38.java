/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package mepethuha;
import java.util.*;
/**
 *
 * @author ILPC
 */
public class Mepethuha {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
    int x=0 ,c=0;
    Scanner sc = new Scanner(System.in);
    x= sc.nextInt();
    do{
        x++;
    }
    while(x!=8 && x!=4);
    System.out.println(x);
    // TODO code application logic here
    }
    
}
