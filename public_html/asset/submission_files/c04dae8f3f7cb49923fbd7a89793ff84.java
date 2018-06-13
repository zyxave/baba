import java.util.Scanner
public class Main {
    public static void main(String[] args) 
    {
        Scanner sc = new Scanner(System.in)
        int t = sc.nextInt();
        for(int i = 1; i <= t.; i++) 
        {
            int saklar = sc.nextInt();
            ArrayList<Integer> lampu;
            lampu = new ArrayList();
            int hitung = saklar;
            for(int x=0; x<saklar; x++) 
            {
                lampu.add(1);
            }
            for(int a=1; a < lampu.size(); a++) 
            {               
                if(lampu.get(a) == 1)
                {
                    lampu.set(a, 0);
                    hitung -= 1;
                    int kelipatan = a+a+1;
                    while(kelipatan < lampu.size())
                    {
                        if(lampu.get(kelipatan) == 1) {
                            lampu.set(kelipatan, 0);
                            hitung -= 1;
                        }
                        kelipatan += kelipatan;
                    }
                }
                else if(lampu.get(a) == 0)
                {
                    lampu.set(a, 1);
                    hitung += 1;
                    int kelipatan = a+a+1;
                    while(kelipatan < lampu.size())
                    {
                        if(lampu.get(kelipatan) == 0) {
                            lampu.set(kelipatan, 1);
                            hitung += 1;
                        }
                        kelipatan += kelipatan;
                    }
                }
            }
            System.out.println(hitung);
        }
    }
}
