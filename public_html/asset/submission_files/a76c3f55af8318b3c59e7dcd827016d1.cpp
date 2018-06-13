#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,hs,n,i,a[510101],b[510101];
string s;
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	while(t--)
	{
		hs=0;
		cin>>n;
		map<ll,map<ll,ll> > me;
		for(i=1;i<=n;i++)
		{
			cin>>a[i]>>b[i];
			me[a[i]][b[i]]++;
		}
		for(i=1;i<=n;i++)
		{
			if(me[b[i]][a[i]]>0&&me[a[i]][b[i]]>0)
			{
		//		cout<<i<<"\n";
				hs+=1;
		//		me[a[i]][b[i]]--;
		//		me[b[i]][a[i]]--;
			}
		}
		cout<<hs<<"\n";
	}
	return 0;
}
