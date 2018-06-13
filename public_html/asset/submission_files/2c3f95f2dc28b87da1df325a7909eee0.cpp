#include<bits/stdc++.h>
using namespace std;

typedef long long ll;
ll tc,n;

ll modexp(ll b, ll e, ll m)
{
	ll r = 1;
	while(b > 0)
	{
		if((b & 1) == 1)
		{
			r = (r * e) % m;
		}
		e = (e * e) % m;
		b = b / 2;
	}
	return r;
}

int main()
{
	//printf("%lld\n",modexp(2,3,100));
	scanf("%lld",&tc);
	while(tc--)
	{
		ll mod = 1000000007;
		scanf("%lld",&n);
		
		ll nyak = modexp(2 * n - 2, 2,mod);
		ll ans = (nyak + n) % mod;
		printf("%lld\n",ans);
	}
}
