import java.util.*;class Main {

    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        int T=in.nextInt();
        int k;
        int[] N = new int[T];
        int[] jumlah = new int[T];
        for(int x=0;x<T;x++){
            N[x]=in.nextInt();
        }
        for(int x=0;x<T;x++){
            k=0;
            for(int y=1;y<=N[x];y++){
                int reverse=0;
                if(y>=10)
                {reverse = ((y-1)/10)+((y-1)%10*10);}
                if(reverse>y&&reverse<N[x]){
                    y=reverse;
                }
                k++;
            }
            jumlah[x]=k;
        }
        for(int x=0;x<T;x++){
            System.out.println(jumlah[x]);
        }
    }
    
}

    

