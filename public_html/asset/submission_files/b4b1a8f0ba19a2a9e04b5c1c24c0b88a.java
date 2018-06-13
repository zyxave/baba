import java.util.*;class Main {
    public static void main(String[] args) {
        byte T;
        int N;
        Scanner in = new Scanner(System.in);
        String s1;
        T = in.nextByte();
        
        for(byte x=0;x<T;x++){
            N = in.nextInt();
            N+=1;
            String[] s = new String[N];
            for(int y=0;y<N;y++){
                s[y] = in.nextLine();
            }
            for(int y=0;y<N;y++){
                for(int z=0;z<y;z++){
                    if(s[y].compareTo(s[z])<0){
                        s1 = s[y];
                        s[y]=s[z];
                        s[z]=s1;
                    }
                }
            }
            for(int y=0;y<N;y++){
            System.out.println(s[y]);
            }
        }
    }
    
}

    

