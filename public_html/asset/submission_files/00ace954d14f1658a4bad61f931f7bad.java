public class Main {
    public static void main(String[] args) {
        String t = System.console().readLine();
        for(int i = 1; i <= Integer.parseInt(t); i++) 
        {
            String saklar = System.console().readLine();
            int[] lampu = new int[Integer.parseInt(saklar)];
            int hitung = Integer.parseInt(saklar);
            for(int x = 0; x < lampu.length; x++)
            {
                lampu[x] = 1;
            } 
            for(int a=1; a < lampu.length; a++) 
            {      
                if(lampu[a] == 1)
                {
                    lampu[a] = 0;
                    hitung -= 1;
                    int kelipatan = a+a+1;
                    while(kelipatan < lampu.length)
                    {
                        if(lampu[kelipatan] == 1) {
                            lampu[kelipatan] = 0;
                            hitung -= 1;
                        }
                        else if(lampu[kelipatan] == 0) {
                            lampu[kelipatan] = 1;
                            hitung += 1;
                        }
                        kelipatan += a+1;
                    }
                }
                else if(lampu[a] == 0)
                {
                    lampu[a] = 1;
                    hitung += 1;
                    int kelipatan = a+a+1;
                    while(kelipatan < lampu.length)
                    {
                        if(lampu[kelipatan] == 0) {
                            lampu[kelipatan] = 1;
                            hitung += 1;
                        }
                        else if(lampu[kelipatan] == 1) {
                            lampu[kelipatan] = 0;
                            hitung -= 1;
                        }
                        kelipatan += a+1;
                    }
                }
            }
            System.out.println(hitung);
        }
    }
    
}