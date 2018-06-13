#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,p,a,m,r,hs;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>p>>a>>m>>r;
		hs=0;
		while(1)
		{
			if(r>=p)
			{
				r-=p;
				hs++;
			}
			else
				break;
			p-=a;
			p=max(p,m);
		}
		cout<<hs<<"\n";
	}	
}
