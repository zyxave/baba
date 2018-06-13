#include <stdio.h>

int main()
{
    int p,m,a,r,T,sisa_uang,harga_sementara;
    scanf("%d",&T);
    sisa_uang=0;
    for(int a=0;a<T;a++) {
        scanf("%d",&p);
        scanf("%d",&a);
        scanf("%d",&m);
        scanf("%d",&r);
        sisa_uang=r-p;
        int jumlah =1;
        int selesai =0;
        while(selesai!=1)
        {
            harga_sementara = p-a;
            if (harga_sementara >= m)
            {
                p=harga_sementara;
            }
            else {
                p = m;
            }
            sisa_uang= sisa_uang - p;
            if( sisa_uang >0)
            {
                jumlah +=1;
            }
             else
            {
                selesai=1;
             }
        }
        printf("%d\n",jumlah);
    }

    return 0;
}