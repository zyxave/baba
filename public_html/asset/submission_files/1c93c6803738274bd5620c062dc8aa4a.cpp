#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,d[2020202],b[2020202],u,tee,n,tt,i,c[2020202];
queue<ll> q;
string s;
ll con(ll aa)
{
	if(c[aa]==-1)
	{
		ll hh=0;
		while(aa>0)
		{
			hh*=10;
			hh+=aa%10;
			aa/=10;
		}
		c[aa]=hh;
	}
	return c[aa];
}
int main()
{
	cin>>t;
	memset(c,-1,sizeof(c));
	while(t--)
	{
		cin>>n;
		q.push(0);
		//memset(d,0,sizeof(d));
		memset(b,0,sizeof(b));
		d[0]=0;
		b[0]=1;
		while(!q.empty())
		{
			u=q.front();
			q.pop();
			tee=con(u);
			if(u+1<=n&&b[u+1]==0)
			{
				b[u+1]=1;
				d[u+1]=d[u]+1;
				q.push(u+1);
			}
			if(tee<=n&&b[tee]==0)
			{
				b[tee]=1;
				d[tee]=d[u]+1;
				q.push(tee);
			}
		}
		cout<<d[n]<<"\n";
	}
	
}
