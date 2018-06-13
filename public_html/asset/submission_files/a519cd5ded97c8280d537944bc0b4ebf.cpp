#include<bits/stdc++.h>
#define f first
#define s second
#define mp make_pair
using namespace std;

typedef long long ll;
ll tc,n;

int main()
{
	scanf("%lld",&tc);
	while(tc--)
	{
		scanf("%lld",&n);
		
		ll l = 0;
		ll r = 1e9;
		
		ll ans = -1;
		while(l < r)
		{
			ll mid = (l + r) / 2;
			ll now = mid * (mid - 1) / 2;
			if(now < n)
			{
				l = mid + 1;
				ans = max(ans,mid);
			}
			else 
			{
				r = mid - 1;
				
			}
		}
		printf("%lld\n",ans + 1);
	}
}

