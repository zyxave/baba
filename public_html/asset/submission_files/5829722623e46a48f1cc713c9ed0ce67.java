import java.util.*;
class Main {

    public static void main(String[] args) {
        Scanner scan = new Scanner(System.in);
        int t = scan.nextInt();
        String ab="";
        if(t<=100 && t>=1){
        for (int i = 0; i < t; i++) {
            
        
        int p = scan.nextInt();
        int a = scan.nextInt();
        int m = scan.nextInt();
        int r = scan.nextInt();
        int ff,x=0;
        
        if(p<=100 && p>=m && m>=1 && a>=1 && a<=100 && r<=100000 && r>=1){
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
        ab+=x+"\n";
        
        }
        }
        }
        System.out.print(ab);
    }
    
}
