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
		for(int x = 1 ; x <= 10000 ; x++) dist[x] = 1000000000000000000;
		for(int x = 1 ; x <= r ; x++)
		{
			scanf("%d %d %d",&a,&b,&c);
			
			adj[a].pb(mp(b , c));
			adj[b].pb(mp(a , c));
		}
		
		dist[s] = 0;
		q.push(mp(0,s));
		while(!q.empty())
		{
			int i = - q.top().f;
			int j = q.top().s;
			q.pop();
			if(i > dist[j]) continue;
			int p = adj[j].size();
			
			for(int x = 0 ; x < p ; x++)
			{
				int ii = adj[j][x].f;
				int jj = adj[j][x].s;
				if(dist[ii] > dist[j] + jj)
				{
					dist[ii] = dist[j] + jj;
					q.push(mp(-dist[ii],ii));
				}
			}
		}
		for(int x = 1; x <= 100 ; x++) adj[x].clear();
		
		if(dist[d] <= n)printf("%lld\n",dist[d]);
		else printf("Anda tidak bisa mengikuti seminar.\n");
	}
}
