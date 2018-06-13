#include<stdio.h>
#include<math.h>

int main()
{
	int a,b,c,d,e;
	scanf("%d",&a);
	for(b=0;b<a;b++)
	{
		scanf("%d",&c);
		e=0;
		d=0;
		while(e<c)
		{
			d++;
			e=d*d;
		}
		int f;
		f=sqrt(c);
		if(c!=f*f)
		{
			d--;
		}
		printf("%d\n",d);
	}
	return 0;
}
