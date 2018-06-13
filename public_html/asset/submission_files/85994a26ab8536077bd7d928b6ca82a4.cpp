#include<bits/stdc++.h>
using namespace std;

int main()
{
	int a;
	scanf("%d",&a);
	for(int b=0;b<a;b++)
	{
		int c;
		scanf("%d",&c);
		int e=0;
		int f=0;
		int g=0;
		int h=0;
		for(int d=c;d>0;d--)
		{
			scanf("%d",&e);
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
