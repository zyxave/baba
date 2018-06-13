import java.util.Scanner;

class cobahh {           
    public static void main(String[] args) {
        
        Scanner scan = new Scanner(System.in);  

        int p=100,pilp=0;
        int q=100,pilq=0;
        int r=1000,pilr=0;
        int x=100,pilx=0;
        int y=100,pily=0;
        int z=200,pilz=0;
        int k,s,a,b;
        int total;
        String pesan;
        boolean Menu=true;
        boolean daftar=true;
        
        System.out.println("Masukan Uang Andi yaitu Rp1000:");
        int duit=scan.nextInt();
        
        while (Menu){
        System.out.println("=============================");
        System.out.println("           Yoi Halte");
        System.out.println("=============================");
        System.out.println("a)  Pesan");
        System.out.println("b) Keluar");
        System.out.println("Pilih Menu: ");
        pesan=scan.next();

        
        if(pesan.equals("a")){
            while (daftar){

        
        System.out.println("Pilih perjalanan");
        System.out.println("1.x ");
        System.out.println("2.y");
        System.out.println("3.p ");
        System.out.println("4.q");
        System.out.println("5.Selesai pilih");

        System.out.println("Pilih makanan/minuman lagi: ");
        int pilih=scan.nextInt();

        
            if(pilih==1){
                System.out.println("Ketik1");
                pilx=scan.nextInt();
                k=pilx*x;
                if(k<=duit){
                }else{
                    System.out.println("Uang Anda tidak cukup");
                }
                
            }
            else if(pilih==2){
                System.out.println("Ketik1");
                pily=scan.nextInt();
                s=pily*y;
                if(s<=duit){
                    
                }else{
                    System.out.println("Uang Anda tidak cukup");
                }
                
            }
            else if(pilih==3){
                System.out.println("Ketik1");
                pilp=scan.nextInt();
                a=pilp*p;
                if(a<=duit){
                    
                }else{
                    System.out.println("Uang Anda tidak cukup");
                }
            }
            else if(pilih==4){
                System.out.println("Ketik1");
                pilq=scan.nextInt();
                b=pilq*q;
                if(b<=duit){
                    
                }else{
                    System.out.println("Uang Anda tidak cukup");
                }
            }


               else if(pilih==5){

                total=x+y+p+q;
                System.out.println("total pembayaran:Rp. "+total+",-");
                System.out.println("kembalian anda:Rp. "+(duit-total)+",");
                Scanner ulang=new Scanner(System.in);
                System.out.println("Masukan pilihan");
                System.out.println("1) Kembali ke menu");
                System.out.println("pilihan");
                int pil=ulang.nextInt();

                switch (pil)
                 {
                    case 1:
                    {
                        if(pesan.equals("a")){

                        }
                        break;
                    }    
                }
                daftar=false;
            }
            }
        }

            if(pesan.equals("b"))
            {
                System.out.println("Terimakasih Atas Kunjungan Anda");
                System.exit(1);
            }

            }
            
        }
    }
//loop no break