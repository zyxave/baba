#include<bits/stdc++.h>
using namespace std;

int t,hit,n,a[1000001];

int main ()
{
	cin>>t;
	while(t--)
	{
		hit=0;
		cin>>n;
		for(int i=1;i<=sqrt(n);i++)
		{
			for(int j=1;j<=sqrt(n);j++)
			{
				if(a[i*j]==0) a[i*j]=1;
				else a[i*j]=0;
			}
		}
		for(int i=1;i<=n;i++)
		{
			if(a[i]==1) hit++;
		}
		cout<<hit<<endl;
	}
}
