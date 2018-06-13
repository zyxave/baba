import java.util.ArrayList;
import java.util.HashMap;
import java.util.LinkedList;
import java.util.Queue;
import java.util.Scanner;

//a = max n -> 10^8
//O(2^log(a) + T * (floor(2^log(n)))
class Main {
	
    static ArrayList<String> generateArr(ArrayList<String> prev, int n)
    {
        ArrayList<String> res = new ArrayList<>();
        Queue<String> q = new LinkedList<>();
        for (String x : prev)
        {
            q.add(x + "4");
            q.add(x + "8");
        }
        
        while (q.peek().length() <= n)
        {
            String t = q.poll();
            res.add(t);
            q.add(t + "4");
            q.add(t + "8");
        }
        return res;
    }
	
    public static void main(String[] args) {
        // TODO code application logic here		
        ArrayList<String> s = new ArrayList<>();
        
        s.add("");
        HashMap<Integer, ArrayList<String>> map = new HashMap<>();
        map.put(0, s);
        
        for (int i = 1; i <= 18; i++)
        {
            map.put(i, generateArr(map.get(i - 1), i));
            //System.out.println(map.get(i).size());
        }
        Scanner in = new Scanner(System.in);
        int T = Integer.parseInt(in.nextLine());
        while (T-- > 0)
        {
            String N = in.nextLine();
            int l = N.length();
            ArrayList<String> arrWL = map.get(l);
            if (Long.parseLong(arrWL.get(arrWL.size() - 1)) < Long.parseLong(N))
                System.out.println(map.get(l + 1).get(0));
            else if (Long.parseLong(arrWL.get(0)) > Long.parseLong(N))
                System.out.println(arrWL.get(0));
            else
            {
                for (int i = arrWL.size() - 1; i >= 0; i--)
                {
                    if ((Long.parseLong(arrWL.get(i)) < Long.parseLong(N)))
                    {
                        System.out.println(arrWL.get(i + 1));
                        break;
                    }
                }
            }
        }
    }
    
}
