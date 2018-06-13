#include<bits/stdc++.h>
using namespace std;
int t,n,m,x,y,ans,co=0;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d%d%d%d",&n,&m,&x,&y);ans=0;
		while(y>n)
		{
			y-=n;
			n-=m;
			if(n<x) n=x;
			ans++;
		}
		printf("Case #%d: %d\n",++co,ans);
	}
}
