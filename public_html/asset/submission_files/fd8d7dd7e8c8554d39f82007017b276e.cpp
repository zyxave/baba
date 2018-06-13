#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,n,p,q,r,i,d[1010],b[1010],ta,tb,tc;
pair<ll,ll> u;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n>>p>>q>>r;
		vector<pair<ll,ll> > v[1010];
		for(i=1;i<=300;i++)
		{		
			d[i]=10e17;
			b[i]=0;
		}
		for(i=1;i<=n;i++)
		{
			cin>>ta>>tb>>tc;
			v[ta].pb(mp(tb,tc));
			v[tb].pb(mp(ta,tc));
		}
		priority_queue<pair<ll,ll> > pq;
		pq.push(mp(0,p));
		while(!pq.empty())
		{
			u=pq.top();
			pq.pop();
			if(b[u.se]==0)
			{
				b[u.se]=1;
				d[u.se]=-u.fi;
				for(i=0;i<v[u.se].size();i++)
				{
					if(b[v[u.se][i].fi]==0)
					{
						pq.push(mp(-(d[u.se]+v[u.se][i].se),v[u.se][i].fi));
					}
				}
			} 
		}
		if(d[q]>=r)
			cout<<"Andi tidak bisa mengikuti seminar.\n";
		else
			cout<<d[q]<<"\n";
	}	
}
