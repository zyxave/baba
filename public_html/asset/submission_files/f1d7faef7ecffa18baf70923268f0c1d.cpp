#include<bits/stdc++.h>
using namespace std;

typedef long long ll;
ll tc,n,arr[10005];
const ll mod = 1e9 + 7;
ll ans;

int main()
{
	scanf("%lld",&tc);
	while(tc--)
	{
		ans = 0;
		scanf("%lld",&n);
		for(int x = 1; x <= n ; x++) scanf("%lld",&arr[x]);
		
		sort(arr + 1 ,arr + n + 1);
		
		ll now = 1;
		for(int x = 1 ; x <= n ; x++)
		{
			ll ha = ((now - 1) * arr[x]) % mod;
			ans = (ans + ha) % mod;
			now = (now * 2) % mod;
		}
		
		now = 1;
		for(int x = n ; x >= 1 ; x--)
		{
			ll ha = ((now - 1) * arr[x]) % mod;
			ans = (ans - ha + mod) % mod;
			now = (now * 2) % mod;
		}
		printf("%lld\n",ans);
	}
}
