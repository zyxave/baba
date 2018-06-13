import java.util.Scanner;
class Main {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
        if(t<=100&&t>=1){
        for (int i = 0; i < t; i++) {
            
        
        int p = scan.nextInt();
        int a = scan.nextInt();
        int m = scan.nextInt();
        int r = scan.nextInt();
        int ff,x=0;
        if(p<=100&&p>=m&&m>=1&&a>=1&&a<=100&&r<=100000){
        ff=r-p;
        
        while(ff>m){
            p=p-a;
            ff-=p;            
            x++;   
            
        }
        System.out.print(x+1);
        
        }
        }
        }
        // TODO code application logic here
    }
    
}
