#include<bits/stdc++.h>
#define ll long long
using namespace std;
ll t,n,l,r,c,hs;
int main()
{
	cin>>t;
	while(t--)
	{
		cin>>n;
		l=0;
		r=1000000000;
		while(l<=r)
		{
			c=(l+r)/2;
			if(c*(c-1)/2>=n)
			{
				hs=c;
				r=c-1;
			}
			else
				l=c+1;
		}
		cout<<hs<<"\n";
	}
}
