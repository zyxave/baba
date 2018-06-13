/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package chronic;

/**
 *
 * @author ILPC
 */
import java.util.Scanner;
public class Chronic {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        int buku;
        int harga;
        int duit;
        int uang=5000;
        
        System.out.println("1.Buku X harga 2000");
        System.out.println("2.Harga Buku Y 3000");
        Scanner input=new Scanner(System.in);
        System.out.print("Masukan Uang Billy yaitu 5000");
        int duit=input.scanInt();
        
        switch(buku){
            case 1:{
                System.out.println("Billy membeli buku X");
                break;
            }
            case 2:{
                System.out.println("Billy membeli Buku Y");
            }
            default:{
                System.out.println("Billy Rapopo");
                break;
            }
            
        }
        
    }
    
}
