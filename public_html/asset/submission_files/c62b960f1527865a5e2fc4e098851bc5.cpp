#include<stdio.h>
#include<math.h>
int main ()
{
	int t;
	scanf("%d",&t);
	for(int a =1;a<=t;a++)
	{
		int p;
		int q;
		scanf("%d%d",&p,&q);
		int arr[q+1];
		for(int b=0;b<q+1;b++)
		{
			int kombinasi=1;
			for(int m=1;m<=b;m++)
			{
				kombinasi=kombinasi*(q-m+1)/m;
			}
			int koef=kombinasi*pow(p,b);
			int pangkat=q-b;
			if(b==q)
			{
				printf("%d\n",koef);
			}
			else
			{
				if(koef==1)
					printf("x%d ",pangkat);
				else if(pangkat==1)
					printf("%dx ",koef);
				else 
					printf("%dx%d ",koef,pangkat);
			}
		}
	}
}
