#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,n,x,y,i,a[1010],b[1010],d[101010],j,hz,te,xe;
string s[1010],z;
int main()
{
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin>>t;
	while(t--)
	{
		cin>>n>>x>>y;
		for(i=1;i<=n;i++)
		{
			s[i]="";
			while(cin>>z)
			{
				if(z==":")
					break;
				s[i]+=z;
				s[i]+=" ";
			}
		//	cout<<s[i]<<"\n";
		//	cin>>z;
			cin>>a[i]>>b[i];
		}
		vector<pair<ll,string> > hs; 
		for(i=1;i<=n;i++)
		{
			hz=0;
			xe=x;
			while(1)
			{
				te=xe/2;
				if(te>=y)
				{
					if((xe-te)*a[i]<b[i])
						hz+=(xe-te)*a[i];
					else
						hz+=b[i];
					xe=te;
				}
				else
				{
					hz+=(xe-y)*a[i];
					break;
				}
			}
			//for(j=0;j<y;j++)
			//	d[j]=10e17;
			//d[y]=0;
		//	for(j=y+1;j<=x;j++)
		//		d[j]=min(a[i]+d[j-1],b[i]+d[j/2]);
			hs.pb(mp(hz,s[i]));
		}
		sort(hs.begin(),hs.end());
		for(i=0;i<n;i++)
		{
			cout<<hs[i].se<<": "<<hs[i].fi<<"\n";
		}
		if(t>0)
			cout<<"\n";
	}	
}
