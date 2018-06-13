#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,hs,n,m,i,j,a[1010][1010],hz,dx[10]={0,0,1,1,1,0,-1,-1,-1,},dy[10]={0,1,1,0,-1,-1,-1,0,1};
ll rmt(ll aa,ll bb)
{
	if(1<=aa&&aa<=n&&1<=bb&&bb<=m&&a[aa][bb]==1)
	{
		a[aa][bb]=0;
		hz++;
		ll ii;
		for(ii=1;ii<=8;ii++)
			rmt(aa+dx[ii],bb+dy[ii]);
	}
}
int main()
{
	cin>>t;
	while(t--)
	{
		hs=0;
		cin>>n>>m;
		for(i=1;i<=n;i++)
			for(j=1;j<=m;j++)
				cin>>a[i][j];
		for(i=1;i<=n;i++)
		{
			for(j=1;j<=m;j++)
			{
				if(a[i][j]==1)
				{
					hz=0;
					rmt(i,j);
					//cout<<hz<<"\n";
					hs=max(hs,hz);
				}
			}
		}
		cout<<hs<<"\n";
	}	
}
