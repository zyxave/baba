import java.util.Scanner;
class Main {
    public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
        int t = sc.nextInt();
        for(int i = 1; i <= t; i++) 
        {
            int saklar = sc.nextInt();
            int[] lampu = new int[saklar];
            int hitung = saklar; 
			int a = 1;
			for(int x = 0; x <  saklar; x++)
			{
				
			}
			while(a < lampu.length)
			{
				if(lampu[a] == 1)
				{
					lampu[a] = 1;
					hitung++;
				}
				else
				{
					lampu[a] = 0;
					hitung--;
				}
				int kelipatan = a+a+1;
				while(kelipatan < lampu.length)
				{
					if(lampu[kelipatan] == 0) {
						lampu[kelipatan] = 1;
						hitung++;
					}
					else if(lampu[kelipatan] == 1) {
						lampu[kelipatan] = 0;
						hitung--;
					}
					kelipatan += a+1;
				}
				a++;
			}
			/*
            for(int a=1; a < lampu.length; a++) 
            {
				if(lampu[a] == 0)
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
                else if(lampu[a] == 1)
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
            }*/
            System.out.println(hitung);
        }
    }
    
}