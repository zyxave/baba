import java.util.*;class Main {

    public static void main(String[] args) {
        int T;
        int N;
        Scanner in = new Scanner(System.in);
        String s1;
        T = in.nextByte();
        String[][] s = new String[T][];
        for(int x=0;x<T;x++){
            N = in.nextInt();
            
            s[x] = new String[N];
            for(int y=0;y<N;y++){
                s[x][y] = in.next();
            }
            for(int y=0;y<N;y++){
                for(int z=0;z<y;z++){
                    if(s[x][y].length()<s[x][z].length()){
                        
                        s1 = s[x][y];
                        s[x][y]=s[x][z];
                        s[x][z]=s1;
                        
                    }
                }
            }
            for(int y=0;y<N;y++){
                for(int z=0;z<y;z++){
                    if(s[x][y].length()==s[x][z].length()){
                        if(s[x][y].compareTo(s[x][z])<0){
                        s1 = s[x][y];
                        s[x][y]=s[x][z];
                        s[x][z]=s1;
                        }
                    }
                }
            }
        }
        for(int x=0;x<T;x++){
            for(int y=0;y<s[x].length;y++){
                System.out.println(s[x][y]);
            }
        }
        
    }
    
}

    



