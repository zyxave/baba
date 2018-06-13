class Main {
    public static void main(String[] args) {
        // TODO code application logic here
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        int[] banyak = new int[T];
        for(int x=0;x<T;x++){
        banyak[x]=0;
        int N = in.nextInt();
        int M = in.nextInt();
        while(N<=M){
            String s = String.valueOf(N);
            for(int z=0;z<s.length();z++){
                char c = s.charAt(z);
                for(int z1=z+1;z1<s.length();z1++){
                    char c1=s.charAt(z1);
                    if(c==c1){
                        banyak[x]++;
                    }
                }
            }
            N++;
        }
        }
        for(int x=0;x<T;x++){
            System.out.println(banyak[x]);
        }
    }
    
}
