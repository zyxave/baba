#include<bits/stdc++.h>
#define ll long long
#define pb push_back
using namespace std;
ll t,n,i,mt,tt,a[1010],m,hs,d[1010][1010];
string s;
ll rmt(ll aa,ll bb)
{
	if(aa==m)
		return 0;
	//cout<<"sd";
	if(d[aa][bb]==-1)
	{
		d[aa][bb]=10e17;
		ll ii;
		for(ii=1;ii<=n;ii++)
		{
			if(ii!=a[aa+1])
			{
	//			cout<<aa<<" "<<bb<<" "<<ii<<"\n";
				d[aa][bb]=min(d[aa][bb],(bb!=ii)+rmt(aa+1,ii));
			}
		}
	}
	return d[aa][bb];
}
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	while(t--)
	{
		cin>>n;
		memset(d,-1,sizeof(d));
		map<string,ll> me;
		for(i=1;i<=n;i++)
		{
			cin>>s;
			me[s]=i;
		}
		cin>>m;
		tt=0;
		for(i=1;i<=m;i++)
		{
			cin>>s;
			a[i]=me[s];
		}
	//	m=tt;
		hs=10e17;
		for(i=1;i<=n;i++)
		{
			if(i!=a[1])
			{
				hs=min(hs,rmt(1,i));
			}
			//cout<<i<<" "<<hs<<"\n";
		}
		cout<<hs<<"\n";
	}
}
