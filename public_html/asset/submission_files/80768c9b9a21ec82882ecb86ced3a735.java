import java.util.*;class Main {

    public static void main(String[] args) {
        
        Scanner in = new Scanner(System.in);
        int T=in.nextInt();
        int k;
        int[] jumlah = new int[T];
        for(int x=0;x<T;x++){
            k=0;
            int N = in.nextInt();
            int[] lampu = new int[N+1];
            for(int y=0;y<N+1;y++){
            lampu[y]=0;
            }
            for(int y=1;y<lampu.length;y++){
                for(int z=1;z<lampu.length;z++){
                    if(z%y==0){
                        if(lampu[z]==0){
                            lampu[z]=1;
                        }
                        else{
                            lampu[z]=0;
                        }
                    }
                }
            }
            for(int y=1;y<lampu.length;y++){
            if(lampu[y]==1){
            k++;
            }
            }
            jumlah[x]=k;
        }
        for(int x=0;x<T;x++){
            System.out.println(jumlah[x]);
        }
    }
    
}
