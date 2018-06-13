import java.util.Scanner;
class Main {
    public static void main(String[] aic){
        Scanner in = new Scanner(System.in);
        int n = in.nextInt();
        if(n>10 || n < 1) return;
        in.nextLine();
        String[] d = new String[n];
        for(int i=0;i<n;i++){
            d[i] = in.nextLine();
            String[] h = d[i].split("\\s+");
            if(h.length != 2) return;
            if(Integer.parseInt(h[0]) > 5
                    || Integer.parseInt(h[0]) < 1
                    || Integer.parseInt(h[1]) > 25
                    || Integer.parseInt(h[1]) < 1
                    ) return;
        }
        for(int i=0;i<n;i++){
            String[] h = d[i].split("\\s+");
            int p = Integer.parseInt(h[0]);
            int q = Integer.parseInt(h[1]);
            for(int a=0;a<=q;a++){
                double x = Math.pow(p,a) * ((a==0 || a==q)?1:q);
                int y = q-a;
                String k = "";
                switch(y){
                    case 1:
                        k = "X";
                        break;
                    case 0:
                        k = "";
                        break;
                    default:
                        k = "X" + y;

                }
                String temp = ((x==1.0)?"":Integer.toString((int)(x))) + k;
                System.out.print(temp + " ");
            }
            System.out.println();
        }
    }
}
