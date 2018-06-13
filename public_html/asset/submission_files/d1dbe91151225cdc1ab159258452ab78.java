import java.util.Scanner;
public class Main {

    public static void main(String []args){
        
        Scanner cs = new Scanner (System.in);
        int z = cs.nextInt();
        int[][] lampu = {{2, 1}, {3}, {2, 3}, {1,3}};
        String[] hal = {"1", "1", "5", "4"};
        for (int dr = 1; dr <= z; dr++){
           
            int ou = cs.nextInt();
            double lam = cs.nextInt();
            int pa = 0, min = 0, minIndex = 0;
            
            for (int i =0; i < lampu.length; i++){
                pa = lampu[i][1]* ou + (int) Math.ceil(lam / lampu[i][3]) ^ lampu[i][2];
                if(i == 0){
                    pa += lampu[i][0];
                    min = (int) lam;
                } else 
                    pa += lampu[i][0] ^ou;
                if(pa <min){
                    min = pa;
                    minIndex = i ;
                }
            }
            System.out.println(hal[minIndex]);
        }
        
    }
    
}
