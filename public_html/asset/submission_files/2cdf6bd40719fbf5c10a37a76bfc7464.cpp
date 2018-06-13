#include<bits/stdc++.h>
using namespace std;

int main()
{
	int a;
	scanf("%d",&a);
	for(int b=0;b<a;b++)
	{
		long long c;
		scanf("%lld",&c);
		long long e=0;
		long long f=0;
		long long g=0;
		for(long long d=c;d>0;d--)
		{
			scanf("%lld",&e);
			f=f+e;
			while(f%10==0)
			{
				g=f%10;
				f=f/10;
				f=f+g;
			}
		}
		if(f%3!=0)
		{
			printf("No\n");
		} else
		{
			printf("Yes\n");
		}
	}
	return 0;
}
