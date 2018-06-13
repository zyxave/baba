import java.util.Scanner;
 
public class B {
 
 
    public static void main(String[] args) {
 
 
        Scanner input = new Scanner(System.in);
        Scanner scan = new Scanner(System.in);
 
        System.out.println("Input  Jumlah atau Panjang Array :");
 
        int n = input.nextInt();
 
        int hasil = 0;
        System.out.println("Input Elemen atau Data yang dihitung :");
 
        for (int i = 0; i < n; i++) {
            String abc;
            System.out.println("Masukkan abjad : ");
            abc = scan.nextLine();



            /*char a[]=new char[10];
            a=abc.toCharArray();*/


            System.out.println(""+abc);
        }
    }
}