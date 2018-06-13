#include<algorithm>
#include<stdio.h>
int main()
{
    int p,a,m,r,T;
    int uang;
    int i,j;
    scanf("%d",&T);
    for (i=1;i<=T;i++)
    {
        scanf("%d%d%d%d",&p,&a,&m,&r);
        for(j=1;;j++)
        {
        if (p>=m)
           {
           r=r-p;
           p=p-a;
           }
        else
        {r=r-m;}
        if (r-m<=0) {break;}
        }
        printf("Case #%d: %d\n", i, j);
    }
    //system("pause");
    return 0;
}
