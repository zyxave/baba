#include<bits/stdc++.h>
#define ll long long
#define pb push_back
using namespace std;
ll t,d[1050][1050],n;
string s;
ll rmt(ll aa,ll bb)
{
//	if(aa>n)
//		cout<<"sd";
	if(aa>=n)
		return 0;
	if(d[aa][bb]==-1)
	{
		d[aa][bb]=1+rmt(aa+1,bb);
		if(aa!=bb)
			d[aa][bb]=min(d[aa][bb],1+rmt(aa,aa));
		if(bb!=0)
		{
			//cout<<"sd";
			//cout<<s.substr(0,bb)<<" "<<s.substr(aa,bb)
			if(aa+bb<=n)
			{
				if(s.substr(0,bb)==s.substr(aa,bb))
					d[aa][bb]=min(d[aa][bb],1+rmt(aa+bb,bb));
			}
			else
			{
				//cout<<"sd";
			//	cout<<n-aa+1<<" ";
			//	cout<<s.substr(0,n-aa)<<" "<<s.substr(aa,n-aa)<<"\n";
				if(s.substr(0,n-aa)==s.substr(aa,n-aa))
					d[aa][bb]=min(d[aa][bb],1+rmt(aa+bb,bb));
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
		memset(d,-1,sizeof(d));
		cin>>s;
		string z;
		n=s.length();
		cout<<rmt(0,0)<<"\n";
	}
}
