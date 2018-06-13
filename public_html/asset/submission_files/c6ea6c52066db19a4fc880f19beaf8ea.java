import java.util.Scanner;
public class Main
{
    public static void main(String[] args)
    { 
        Scanner sc = new Scanner(System.in);
        int[] coin = {100, 20, 5, 1};
        int t = sc.nextInt();
        for(int i = 1; i <= t; i++)
        {
            int dibayar = sc.nextInt();
            int harga = sc.nextInt();
            int kembalian = dibayar-harga;
            int jumlah_coin = 0;
            for(int x = 0; x < coin.length; x++)
            
            System.out.println(jumlah_coin);
        }
    }
    
}
