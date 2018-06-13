import java.util.Set;
import java.util.HashSet;
import java.util.Map;
import java.util.Scanner;
import java.util.HashMap;

class Main {

    public static void main(String[] args){
        Scanner in = new Scanner(System.in);
        int T = in.nextInt();
        while (T-- > 0)
        {
            String input = in.next();   
            algo(input);
        }
    }
	
    public static void algo(String s)
    {
        Map<Character, Integer> frequencies = new HashMap<>();
        
        for(char x : s.toCharArray())
            if(frequencies.containsKey(x))
                frequencies.put(x, frequencies.get(x) + 1);
            else
                frequencies.put(x, 1);
        
        Set<Integer> set = new HashSet<>();
        for(int freq : frequencies.values())
            set.add(freq);
        
        if(set.size() > 2)
			System.out.println("NO");
        else if(set.size() == 1)
			System.out.println("YES");
		else
        {
            int f1 = 0;
            int f2 = 0;
            int f1Count = 0;
            int f2Count = 0;
            int i = 0;
			
            for(int n : set)
            {
                if(i == 0) 
					f1 = n;
                else 
					f2 = n;
                i++;
            }
            
            for(int freq : frequencies.values())
            {
                if(freq == f1) 
                    f1Count++;
                if(freq == f2) 
                    f2Count++;
            }
            
            if((f1 == 1 && f1Count == 1 ) || (f2 == 1 && f2Count == 1 ))
				System.out.println("YES");
            else if ((Math.abs(f1 - f2)  == 1) && (f1Count == 1 || f2Count == 1))
				System.out.println("YES");
            else
				System.out.println("NO");
        }
    }
}
