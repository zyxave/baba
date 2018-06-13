import java.util.Scanner;

class Main{
	public static void main(String[] args){
		int coin, money, price, back, loopTime;

		Scanner sc = new Scanner(System.in);
		loopTime = sc.nextInt();
		for (int i = 0;i < loopTime ; i++) {
			coin = 0;
			money = sc.nextInt();
			price = sc.nextInt();
			back = money - price;
			while(back > 0){
				if(back % 100 == 0){
					coin++;
					back -= 100;
				}else if(back % 20 == 0){
					coin++;
					back -= 20;
				}else if(back % 5 == 0){
					coin++;
					back -= 5;
				}else if(back % 1 == 0){
					coin++;
					back -= 1;
				}
			}

			System.out.println(coin);
		}		
	}
}