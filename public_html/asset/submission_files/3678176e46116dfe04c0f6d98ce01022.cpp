#include<bits/stdc++.h>
using namespace std;
long long t,n,d,r,x[1000005],y[1000005],ans,a;
int main()
{
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%lld%lld%lld",&n,&d,&r);ans=0;
		for(a=0;a<n;a++)
		{
			scanf("%lld",&x[a]);
		}
		sort(x,x+n);
		for(a=0;a<n;a++)
		{
			scanf("%lld",&y[a]);
		}
		sort(y,y+n);
		for(a=0;a<n;a++)
		{
			x[a]+=y[n-a-1];
			x[a]-=d;
			if(x[a]>0)
			ans+=(x[a]*r);
		}
		printf("%lld\n",ans);
	}
}
