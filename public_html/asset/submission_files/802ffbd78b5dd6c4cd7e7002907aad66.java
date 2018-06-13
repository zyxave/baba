import java.util.Scanner;
import java.util.Arrays;

class Main{
	public static void main(String[] args){
		Scanner sc = new Scanner(System.in);

		int loopTime = sc.nextInt();

		System.out.println("Masukkan n");
		int n = sc.nextInt();
		int[] lamp = new int[n];
		Arrays.fill(lamp, 0);

		for (int i = 1; i < loopTime; i++) {
			int s = sc.nextInt();

			for(int j = 0;j < lamp.length;j++){
				if(lamp[j] % s == 0){
					if(j != 0)
						System.out.println(j);
				}
			}
		}
	}
}