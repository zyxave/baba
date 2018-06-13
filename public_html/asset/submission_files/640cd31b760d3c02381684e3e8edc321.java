import java.util.Scanner;class Main {
    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        int n,d,r;
        int[] uang = new int[T];
        int sisa;
        for(int x=0;x<T;x++){
            uang[x]=0;
            sisa=0;
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
                if(prox[y]>d){
                    uang[x]+=prox[y]*r;
                }
                else if(prox[y]<d)
                {
                    for(int z=y;z<n;z++){
                        if((prox[z]>prox[y])&&prox[z]>d){
                            prox[z]-=prox[y];
                        }
                    }
                }
            }
            for(int y=0;y<n;y++){
                if(proy[y]>d){
                    uang[x]+=proy[y]*r;
                }
                else if(proy[y]<d)
                {
                    for(int z=y;z<n;z++){
                        if((proy[z]>proy[y])&&proy[z]>d){
                            proy[z]=proy[z]-proy[y];
                        }
                    }
                }
            }
        }
        
        
        for(int x=0;x<T;x++){
            System.out.println(uang[x]);
        }
    }
}
