#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,m,i,d[1010101],a[1010101],mi,hs1,hs2;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n>>m;
		memset(d,0,sizeof(d));
		for(i=1;i<=n;i++)
		{
			cin>>a[i];
			d[a[i]]++;
		}
		hs1=-1;
		hs2=-1;
		mi=10e17;
		for(i=1;i<=n;i++)
		{
			//cout<<d[m-a[i]]<<"\n";
			if(mi>abs(m-(m-a[i]))&&d[m-a[i]]>0)
			{
			//	cout<<"Sd";
				if(a[i]==m-a[i]&&d[a[i]]==1)
					continue;
				mi=abs(m-(m-a[i]));
		//		cout<<abs(m-(m-a[i]))<<"\n";
		//		cout<<mi<<" "<<a[i]<<"\n";
				hs1=min(a[i],m-a[i]);
				hs2=max(a[i],m-a[i]);
			}
		}
		if(hs1==-1)
			cout<<"Billy rapopo\n";
		else	
			cout<<hs1<<" "<<hs2<<"\n";
	}
	return 0;
}
