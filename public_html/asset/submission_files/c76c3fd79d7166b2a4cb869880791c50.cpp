#include<bits/stdc++.h>
#define ll long long
#define pb push_back
using namespace std;
ll t,n,m,q,ta,tb,i,x[101010],y[101010],mi1,mi2,ma1,ma2,h1,h2,h3;
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	while(t--)
	{
		cin>>n>>m>>q;
		memset(x,0,sizeof(x));
		memset(y,0,sizeof(y));
		vector<ll> X;
		vector<ll> Y;
		x[1]=1;
		y[1]=1;
		x[n]=1;
		y[m]=1;
		while(q--)
		{
			cin>>ta>>tb;
			if(x[ta]==0)
			{
				x[ta]=1;
				X.pb(ta);
			}
			if(y[tb]==0)
			{
				y[tb]=1;
				Y.pb(tb);
			}
		}
		X.pb(1);
		X.pb(n);
		Y.pb(1);
		Y.pb(m);
		sort(X.begin(),X.end());
		sort(Y.begin(),Y.end());
		mi1=10e17;
		mi2=10e17;
		ma1=-mi1;
		ma2=-mi2;
		for(i=1;i<X.size();i++)
		{
			mi1=min(mi1,X[i]-X[i-1]);	
			ma1=max(ma1,X[i]-X[i-1]);	
		}
		for(i=1;i<Y.size();i++)
		{
			mi2=min(mi2,Y[i]-Y[i-1]);	
			ma2=max(ma2,Y[i]-Y[i-1]);	
		}
		h1=(X.size()-1)*(Y.size()-1);
		h2=mi1*mi2;
		h3=ma1*ma2;
		//cout<<ma1<<" "<<ma2<<"\n";
		cout<<h1<<" "<<h2<<" "<<h3<<"\n";
	}
}
