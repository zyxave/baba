#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,d[20202020],b[20202020],u,tee,n,tt;
queue<ll> q;
string s;
ll con(ll aa)
{
	ll hh=0;
	while(aa>0)
	{
		hh*=10;
		hh+=aa%10;
		aa/=10;
	}
	return hh;
}
int main()
{
//	cout<<con(2300)<<"\n";
	cin>>t;
	q.push(0);
	d[0]=0;
	b[0]=1;
	while(!q.empty())
	{
		u=q.front();
		q.pop();
		tt++;
	//	cout<<tt<<"\n";
	//	s=ts(u);
	//	reverse(s.begin(),s.end());
		tee=con(u);
		if(u+1<=10000000&&b[u+1]==0)
		{
			b[u+1]=1;
			d[u+1]=d[u]+1;
			q.push(u+1);
		}
		if(tee<=10000000&&b[tee]==0)
		{
			b[tee]=1;
			d[tee]=d[u]+1;
			q.push(tee);
		}
	}
	while(t--)
	{
		cin>>n;
		cout<<d[n]<<"\n";
	}
	
}
