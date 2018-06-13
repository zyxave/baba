#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,k;
string s;
string rmt(string aa)
{
//	cout<<aa<<" "<<bb<<"\n";
	if(aa.length()==1)
		return aa;
	else
	{
		ll hh=0,ii;
		string z;
		for(ii=0;ii<aa.length();ii++)
		{
			hh+=aa[ii]-'0';
		}
		stringstream zz;
		zz<<hh;
		zz>>z;
		return rmt(z);
	}
}
int main()
{
	cin>>t;
	while(t--)
	{
		string zs;
		cin>>s>>k;
		for(ll i=1;i<=k;i++)
			zs+=s;
		cout<<rmt(zs)<<"\n";
	}
}
