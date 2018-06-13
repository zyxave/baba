import java.util.*;
public class Main {
    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        int n,d,r;
        int[] uang = new int[T];
        for(int x=0;x<T;x++){
            uang[x]=0;
            n=in.nextInt();
            d=in.nextInt();
            r=in.nextInt();
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