#include<bits/stdc++.h>
using namespace std;
int ans,n,m,t;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d %d",&n,&m);
		n-=m;
		m=n/100;
		ans+=m;
		n-=m*100;
		m=n/20;
		ans+=m;
		n-=m*20;
		m=n/5;
		ans+=m;
		n-=m*5;
		m=n;
		ans+=m;
		printf("%d\n",ans);
	}
}
