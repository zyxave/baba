#include<bits/stdc++.h>
using namespace std;
long long t,n,m,ans,x;
long long jumlahj(long long x)
{
	int ans=0;
	while(x>0)
	{
		n=x%10;
		ans+=n;
		x/=10;
	}
	if(ans>9) return jumlahj(ans);
	return ans;
}
long long jumlah(long long x)
{
	int ans=0;
	while(x>0)
	{
		n=x%10;
		ans+=n;
		x/=10;
	}
	return ans;
}
int main()
{
	scanf("%lld",&t);
	while(t--)
	{
		scanf("%lld %lld",&n,&m);
		x=jumlah(n);
		x*=m;
		ans=jumlahj(x);
		printf("%lld\n",ans);
	}
}
