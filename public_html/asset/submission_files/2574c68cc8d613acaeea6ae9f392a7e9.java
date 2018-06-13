import java.util.*;
class Main {
    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        int n,d,r;
        int[] uang = new int[T];
        if(T<1||T>10){
            System.exit(0);
        }
        for(int x=0;x<T;x++){
            uang[x]=0;
            n=in.nextInt();
            if(n<1||n>100){
                System.exit(0);
            }
            d=in.nextInt();
            if(d<1||d>10000){
                System.exit(0);
            }
            r=in.nextInt();
            if(r<1||r>5){
                System.exit(0);
            }
            int[] prox = new int[n];
            int[] proy = new int[n];
            for(int y=0;y<n;y++){
                prox[y]=in.nextInt();
            }
            for(int y=0;y<n;y++){
                proy[y]=in.nextInt();
            }
            for(int y=0;y<n;y++){
                if(prox[y]+proy[y]>d){
                    uang[x]+=((prox[y]+proy[y])-d)*r;
                }
            }
            
        }
        
        
        for(int x=0;x<T;x++){
            System.out.println(uang[x]);
        }
    }
}
    

