

import java.util.*;
class Main {


    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
       int t = scan.nextInt();
       String asd = "";
        for (int d = 0; d < t; d++) {
            
        
       int jumlah = 0;
         int hasil2 = 0;
            int hasil3 = 0;
            int hasil4 = 0;
            int hasil5 = 0;
            int biaya = scan.nextInt();
            int bayar = scan.nextInt();
            
            
           
            
      
            int hasil=biaya - bayar ;
            if(hasil > 100) jumlah += hasil / 100;
            hasil2 += hasil % 100;
            if(hasil2 > 20) jumlah += hasil2 / 20;
            hasil3 += hasil2 % 20;
             if(hasil3 > 5) jumlah += hasil3 / 5;
            hasil4 += hasil3 % 5;
             if(hasil4 > 1) jumlah += hasil4 / 1;
            hasil5 += hasil4 % 1; 
            asd += jumlah + "\n";
    }
        System.out.println(asd);
    
    }
    
       
        
    
    
           
       
        // TODO code application logic here
 //   }
    
}
