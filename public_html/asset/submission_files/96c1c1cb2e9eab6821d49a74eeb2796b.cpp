#include <bits/stdc++.h>

using namespace std;

void f()
{
	long long tc;
	cin>>tc;
	for(long long U=0;U<tc;U++)
	{
		long long ans=0,n,d,r;
		cin>>n>>d>>r;
		long long x[n],y[n],tmpans[n];
		for(long long a=0;a<n;a++)
		{
			cin>>x[a];
			x[a]=x[a]*-1;
		}
		sort(x,x+n);
		for(long long a=0;a<n;a++)
			x[a]=x[a]*-1;
		for(long long a=0;a<n;a++)
			cin>>y[a];
		sort(y,y+n);
		for(long long a=0;a<n;a++)
		{
			tmpans[a]=((x[a]+y[a])-d)*r;
			if(tmpans[a]<0)
				tmpans[a]=0;
			ans+=tmpans[a];
		}
		cout<<ans<<endl;
	}
}

int main()
{
	int t;
	cin>>t;
	while(t--)
		f();
}
 

