import java.util.Scanner;

class Main{
	public static void main(String[] args){
		Scanner sc = new Scanner(System.in);
		int looptime = sc.nextInt();

		for(int i=0;i<looptime;i++){
			int n = sc.nextInt();
			int d = sc.nextInt();
			int r = sc.nextInt();

			int j;
			int k;
			int[] x = new int[n];
			int[] y= new int[n];
			int hasil=0;
			

			for(j=0;j<n;j++){
				x[j] = sc.nextInt();
			}
			for(k=0;k<n;k++){
				y[k] = sc.nextInt();
			}	

			for(int l=1;l<=n;l++){
				hasil = x[l]+y[l]-d;
			}
				
		}
				int total = hasil*5;
				System.out.println(total);
	}
}