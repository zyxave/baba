import java.util.*;class Main {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int T=in.nextInt();
        if(T>100||T<1){System.exit(0);}
        int k;
        int[] N = new int[T];
        int[] jumlah = new int[T];
        for(int x=0;x<T;x++){
            N[x]=in.nextInt();
            if(N[x]>106||N[x]<1){System.exit(0);}
        }
        for(int x=0;x<T;x++){
            k=0;
            int c=0;
            for(int y=1;y<=N[x];y++){
                int reverse=0;
                if(y>=10)
                {c=((N[x]/10)*10)+1;reverse = ((y-1)/10)+((y-1)%10*10);}
                if(y>10&&reverse==c){
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
