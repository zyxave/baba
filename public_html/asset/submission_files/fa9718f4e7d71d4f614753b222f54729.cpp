#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,n,x,y,i,a[101010],b[101010],d[101010];
string s[1010],z;
ll rmt(ll aa)
{
	if(aa==y)
		return 0;
	if(aa<y)
		return 10e17;
	if(d[aa]==-1)
	{
		d[aa]=min(b[i]+rmt(aa/2),a[i]+rmt(aa-1));	
	}
	return d[aa];
}
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	while(t--)
	{
		cin>>n>>x>>y;
		for(i=1;i<=n;i++)
		{
			cin>>s[i]>>z>>a[i]>>b[i];
		}
		vector<pair<ll,string> > hs; 
		for(i=1;i<=n;i++)
		{
			memset(d,-1,sizeof(d));
			hs.pb(mp(rmt(x),s[i]));
		}
		sort(hs.begin(),hs.end());
		for(i=0;i<n;i++)
		{
			cout<<hs[i].se<<" : "<<hs[i].fi<<"\n";
		}
		if(t>0)
			cout<<"\n";
	}	
}
