#include<bits/stdc++.h>
#define ll long long
#define pb push_back
#define mp make_pair
#define fi first
#define se second
using namespace std;
ll t,n,d,r,i,a[1010],b[1010],hs;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n>>d>>r;
		for(i=1;i<=n;i++)
			cin>>a[i];
		for(i=1;i<=n;i++)
			cin>>b[i];
		sort(a+1,a+1+n);
		reverse(a+1,a+1+n);
		sort(b+1,b+1+n);
		hs=0;
		for(i=1;i<=n;i++)
			hs+=max(0LL,a[i]+b[i]-d);
		cout<<hs*r<<"\n";
	}	
}
