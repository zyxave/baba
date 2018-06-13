import java.util.Scanner;
public class Main {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        int n = in.nextInt();
        if(n>100 || n < 1) return;
        
        in.nextLine();
        String[] d = new String[n];
        for(int i=0;i<n;i++){
            d[i] = in.nextLine();
            String[] h = d[i].split("\\s+");
            if(h.length != 4) return;
            if(Integer.parseInt(h[0]) > 100 
                    || Integer.parseInt(h[0]) < 1
                    || Integer.parseInt(h[2]) > Integer.parseInt(h[0])
                    || Integer.parseInt(h[2]) < 1
                    || Integer.parseInt(h[1]) > 100
                    || Integer.parseInt(h[1]) < 1
                    || Integer.parseInt(h[3]) > 100000
                    || Integer.parseInt(h[3]) < 1
                    ) return;
            
        }      
        for(int i=0;i<n;i++){
            String[] h = d[i].split("\\s+");
            int p = Integer.parseInt(h[0]);
            int a = Integer.parseInt(h[1]);
            int m = Integer.parseInt(h[2]);
            int r = Integer.parseInt(h[3]);
            int t = 0, j=0, s=0;
            for(int z=p; (z>=m && z>0) && t<r; z-=a){
                t += z;
                s=r-t;
                j++;
            }
            for(int y=s;y>0 && y>=m ;y-=m){
                j++;
            }
            System.out.println(j);
        }
    }    
}