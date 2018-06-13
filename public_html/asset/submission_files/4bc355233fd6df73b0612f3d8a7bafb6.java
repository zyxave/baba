import java.util.Scanner;
import java.util.Arrays;

class Main{
	public static void main(String[] args){
		Scanner sc = new Scanner(System.in);

		int loopTime = sc.nextInt();
		int n = sc.nextInt();

		String[] dewa = new String[n + 1];
		for (int i = 0;i < loopTime ; i++) {
			for (int j = 0;j <= n ; j++) {
				dewa[j] = sc.nextLine();	
			}
		}

		Arrays.sort(dewa);

		for(String i : dewa)
            System.out.println(i);
	}
}