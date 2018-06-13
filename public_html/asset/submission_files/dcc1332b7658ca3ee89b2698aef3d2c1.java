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
        int ff,x=0;
        
        
        ff=r-p;
        x+=1;
        while(p>m){
            p=p-a;
            ff-=p;            
            x++;       
        }
        while(ff>m){
        ff-=m;
        x++;
        }
        System.out.println(x);
        
        
        }
        
        
    }
    
}
