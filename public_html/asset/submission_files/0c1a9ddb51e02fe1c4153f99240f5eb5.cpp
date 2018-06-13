#include<bits/stdc++.h>
#define ll long long
#define pb push_back
using namespace std;
ll t,i,j,b[1010],n,k,d[1010][15][205];
vector<ll> v;
ll rmt(ll aa,ll bb,ll cc)
{
//	cout<<aa<<" "<<bb<<"\n";
	if(cc>=v.size())
		return 0;
	if(bb==1)
	{
		if(b[aa]==0&&aa>=v[cc])
			return 1;
		else
			return 0;
	}
	if(d[aa][bb][cc]==-1)
	{
		d[aa][bb][cc]=0;
		ll ii;
		for(ii=cc;ii<v.size();ii++)
		{
			if(aa-v[ii]>0)
				d[aa][bb][cc]+=rmt(aa-v[ii],bb-1,ii+1);
			else
				break;
		}
	}
	return d[aa][bb][cc];
}
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	for(i=2;i<=1000;i++)
		if(b[i]==0)
			for(j=i*i;j<=1000;j+=i)
				b[j]=1;
	b[1]=1;
	for(i=2;i<=1000;i++)
		if(b[i]==0)
			v.pb(i);
	//cout<<v.size()<<"\n";
	memset(d,-1,sizeof(d));
	while(t--)
	{
		cin>>n>>k;
		cout<<rmt(n,k,0)<<"\n";
	}
}
