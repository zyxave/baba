#include<stdio.h>
#include<math.h>

int main()
{
    int a,b,c,d,e,f;
    scanf("%d",&a);
    for(b=1;b<=a;b++)
    {
        scanf("%d %d %d %d",&c,&d,&e,&f);
        int g=0;
        while(c>=e)
        {
            f=f-c;
            c=c-d;
            g++;
        }
        if(c<e)
        {
            c=e;
        }
        while(f>=c)
        {
            f=f-c;
            g++;
        }
        printf("%d\n",g);
    }
    return 0;
}
