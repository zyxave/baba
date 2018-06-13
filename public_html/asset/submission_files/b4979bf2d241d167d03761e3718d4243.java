import java.util.*;class Main {

    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int T=in.nextInt();
        if(T>100||T<1){System.exit(0);}
        int[] P = new int[T];
        int[] A = new int[T];
        int[] M = new int[T];
        int[] R = new int[T];
        int[] h = new int[T];
        for(int x=0;x<T;x++){
            P[x]=in.nextInt();
            if(P[x]>100||P[x]<1){System.exit(0);}
            A[x]=in.nextInt();
            if(A[x]>100||A[x]<1){System.exit(0);}
            M[x]=in.nextInt();
            if(M[x]>100||M[x]<1||M[x]>P[x]){System.exit(0);}
            R[x]=in.nextInt();
            if(R[x]>100000||R[x]<1){System.exit(0);}
        }
        for(int x=0;x<T;x++){
           h[x]=1;
           R[x]-=P[x];
           while(R[x]>=M[x]){
               if(P[x]>M[x]){
               P[x]-=A[x];
               }
               else{P[x]=M[x];}
            R[x]-=P[x];h[x]++;
           }
           
        }
        for(int x=0;x<T;x++){
            System.out.println(h[x]);
        }
    }
    
}

