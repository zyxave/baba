import java.util.Scanner;
import java.util.Arrays;
class Main{	
	public static void main(String[] args){
		Scanner sc = new Scanner(System.in);
		int loopTime = sc.nextInt();
		for(int j = 0;j <= loopTime;j++){
			int tempInt = 0;
			int statInt = 0;
			int tolerance = 0;
			String s = sc.nextLine();

			char tempArray[] = s.toCharArray();
         
        	Arrays.sort(tempArray);
         	
			for(int i = 0; i < s.length();i++){
				if(!s.equals(new String(tempArray))){
         			System.out.println("NO");
         			break;
				}

				if(s.charAt(i) == s.charAt(i + 1)){
					tempInt++;
				}

				if(s.charAt(i) != s.charAt(i + 1) || i == s.length() - 2 || statInt != tempInt){
					if(statInt == 0){
						tempInt++;
						statInt = tempInt;
						tempInt = 0;	
					}else if(tempInt >= statInt){
						if(tolerance == 0){
							tolerance++;
						}else{
							System.out.println("NO");
							break;
						}
					}
				}

				if(i == s.length() - 2){
					System.out.println("YES");
					break;
				}
			}
		}
	}
}