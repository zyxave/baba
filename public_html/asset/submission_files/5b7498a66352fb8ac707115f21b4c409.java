class Main {
    public static void main(String[] args) {
		int[] coin = {100,20,5,1};
		String t = System.console().readLine();
        for(int i = 1; i <= Integer.parseInt(t); i++) 
        {
			String[] dibayar = System.console().readLine().split(" ");
			int kembalian = 0;
			if(dibayar.length == 2)
			{
				kembalian = (Integer.parseInt(dibayar[0])-Integer.parseInt(dibayar[1]));
			}
			else if(dibayar.length == 1)
			{
				String harga = System.console().readLine();
				kembalian = (Integer.parseInt(dibayar[0])-Integer.parseInt(harga));
			}
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