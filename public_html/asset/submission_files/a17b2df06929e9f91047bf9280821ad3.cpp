#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,m,i,hs;
ll rmt(ll aa)
{
	ll ii,hh=0,a[255];
	for(ii=0;ii<=25;ii++)
		a[ii]=0;
	while(aa>0)
	{
	//	cout<<aa%10<<" ";
		if(a[aa%10]==1)
			return 1;
		a[aa%10]=1;
		aa/=10;
	}
	return 0;
}
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n>>m;
		hs=0;
		for(i=n;i<=m;i++)
		{
			hs+=rmt(i);
			//cout<<"\n";
		}
		cout<<hs<<"\n";
	}
}
