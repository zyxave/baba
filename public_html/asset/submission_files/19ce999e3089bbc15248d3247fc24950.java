

import java.util.*;
class Main {


    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
       
       int jumlah = 0;
         int hasil2 = 0;
            int hasil3 = 0;
            int hasil4 = 0;
            int hasil5 = 0;
           
            
            String biaya = scan.nextLine();
            
              String[] stringArray = biaya.split(" ");
      int[] intArray = new int[stringArray.length];
      for (int i = 0; i < stringArray.length; i++) {
         String numberAsString = stringArray[i];
         intArray[i] = Integer.parseInt(numberAsString);
      }
            int hasil = intArray[0]-intArray[1];
            if(hasil > 100) jumlah += hasil / 100;
            hasil2 += hasil % 100;
            if(hasil2 > 20) jumlah += hasil2 / 20;
            hasil3 += hasil2 % 20;
             if(hasil3 > 5) jumlah += hasil3 / 5;
            hasil4 += hasil3 % 5;
             if(hasil4 > 1) jumlah += hasil4 / 1;
            hasil5 += hasil4 % 1;       
            System.out.println(jumlah); 
    }
    
       
        
    
    
           
       
        // TODO code application logic here
 //   }
    
}
