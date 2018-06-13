#include<stdio.h>
#include<algorithm>

int main()
{
	int N,T,i,j,a,b,c,d,e;
	scanf("%d",&T);
	for(i=1;i<=T;i++)
	{
		scanf("%d",&N);
		if(N%3==1)
		{
			printf("2\n");
		}
		else if(N%3==2)
		{
			printf("6\n");
		}
		else if(N%3==0)
		{
			printf("3\n");
		}
	}
	return 0;
}
