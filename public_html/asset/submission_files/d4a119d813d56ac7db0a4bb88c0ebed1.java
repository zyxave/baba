import java.util.Scanner;
class Main {
    public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		int[] coin = {100,20,5,1};
		int t = sc.nextInt();
        for(int i = 1; i <= t; i++) 
        {
			int dibayar = sc.nextInt();
			int harga = sc.nextInt();
			int kembalian = dibayar-harga;
			int jumlah_coin = 0;
			for(int a=0; a < coin.length; a++) {
				while(kembalian >= coin[a])
				{
					kembalian -= coin[a];
					jumlah_coin += 1;
				}
			}
			System.out.println(jumlah_coin);
		}
	}
}