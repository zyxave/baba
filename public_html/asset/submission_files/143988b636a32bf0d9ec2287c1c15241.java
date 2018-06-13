import java.util.Scanner;
class Main{	
	public static void main(String[] args){
		Scanner sc = new Scanner(System.in);
		int loopTime = sc.nextInt();
		for(int j = 0;j <= loopTime;j++){
			int tempInt = 0;
			int statInt = 0;
			String s = sc.nextLine();
			for(int i = 0; i < s.length();i++){
				if(i == s.length() - 1){
					System.out.println("YES");
					break;
				}

				if(s.charAt(i) == s.charAt(i + 1) && i != s.length() - 2){
					tempInt++;
				}
				else{
					if(statInt == 0){
						statInt = tempInt;
						tempInt = 0;	
					}else if(tempInt != statInt){
						System.out.println("NO");
						break;
					}
				}
			}
		}
	}
}