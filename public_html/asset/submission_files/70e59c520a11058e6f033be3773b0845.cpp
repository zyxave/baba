#include<bits/stdc++.h>
#define f first
#define s second
#define mp make_pair
#define pb push_back
using namespace std;
 
typedef long long ll;
ll tc,n,r,s,d;
ll a,b,c;
ll dist[100005];
vector<pair<ll,ll> >adj[100005];
priority_queue<pair<ll,ll> >q;
 
int main()
{
	cin >> tc;
	while(tc--)
	{
		cin >> r >> s >> d >> n;
		
		for(int x = 0 ; x <= 100 ; x++) dist[x] = 100000000000;
		for(int x = 1 ; x <= r ; x++)
		{
			scanf("%lld %lld %lld",&a,&b,&c);
			//if(r > 300 || s > 100 || d > 100 || n > 1000 || a > 100 || b > 100 || c > 200) assert(false);
			
			adj[a].pb(mp(b , c));
			adj[b].pb(mp(a , c));
		}
		
		dist[s] = 0;
		q.push(mp(0,s));
		while(!q.empty())
		{
			ll i = - q.top().f;
			ll j = q.top().s;
			q.pop();
			if(i > dist[j]) continue;
			ll p = adj[j].size();
			
			for(int x = 0 ; x < p ; x++)
			{
				ll ii = adj[j][x].f;
				ll jj = adj[j][x].s;
				if(dist[ii] > dist[j] + jj)
				{
					dist[ii] = dist[j] + jj;
					q.push(mp(-dist[ii],ii));
				}
			}
		}
		for(int x = 0; x <= 100 ; x++) adj[x].clear();
		
		if(dist[d] == 100000000000) printf("Andi tidak bisa mengikuti seminar.\n");
		else if(dist[d] <= n) printf("%lld\n",dist[d]);
		else printf("Andi tidak bisa mengikuti seminar.\n");
	}
}
