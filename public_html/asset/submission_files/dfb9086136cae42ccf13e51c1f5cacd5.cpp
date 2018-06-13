#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,du[1010101],n,i,a[1010101],hs,mo=1000000007,j;
int main()
{
	cin>>t;
	du[0]=1;
	for(i=1;i<=100000;i++)
	{
		du[i]=du[i-1]*2;
		du[i]%=mo;
	}
	while(t--)
	{
		cin>>n;
		for(i=1;i<=n;i++)
		{
			cin>>a[i];
		}
		sort(a+1,a+1+n);
		hs=0;
		for(i=1;i<=n;i++)
		{
			hs+=(du[i-1]-1)*a[i];
			hs%=mo;
		}
		for(i=1;i<=n;i++)
		{
			hs-=(du[(n-i)]-1)*a[i];
			j=0;
			while(hs<0)
			{
				hs+=mo*j;
				j++;
			}
			hs%=mo;
		}
		cout<<hs<<"\n";
	}
}
