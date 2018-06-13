import java.util.Scanner;
class Main {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
        
        
        for (int i = 0; i < t; i++) {
            
        
        int p = scan.nextInt();
        int a = scan.nextInt();
        int m = scan.nextInt();
        int r = scan.nextInt();
        int x=0;
        
        
        r-=p;
        x+=1;
        while(p>m){
            p=p-a;
            r-=p;            
            x++;       
        }
        while(r>m){
        r-=m;
        x++;
        }
        System.out.println(x);
        
        
        }
        
        
    }
    
}
