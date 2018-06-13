#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,d[20202020],b[20202020],u,tee,n;
queue<ll> q;
string s;
ll st(string aa)
{
	stringstream ss;
	ll ee;
	ss<<aa;
	ss>>ee;
	return ee;
}
string ts(ll aa)
{
	stringstream ss;
	string ee;
	ss<<aa;
	ss>>ee;
	return ee;
}
int main()
{
	cin>>t;
	q.push(0);
	d[0]=0;
	b[0]=1;
	while(!q.empty())
	{
		u=q.front();
		q.pop();
		s=ts(u);
		reverse(s.begin(),s.end());
		tee=st(s);
		if(u+1<=200000&&b[u+1]==0)
		{
			b[u+1]=1;
			d[u+1]=d[u]+1;
			q.push(u+1);
		}
		if(tee<=200000&&b[tee]==0)
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
