#include<bits/stdc++.h>
using namespace std;
int main()
{
	int n,r,c,d,e,t,i,j,dd;
	int a[100];
	int b[100];
	int f[10];
	c=0;
	dd=0;
	e=0;
	cin>>t;
	for(i=1;i<=t;i++)
	{
		c=0;
		dd=0;
		e=0;
		cin>>n;
		cin>>d;
		cin>>r;
		for(j=1;j<=n;j++)
		{
			cin>>a[j];
		}
		for(j=1;j<=n;j++)
		{
			cin>>b[j];
		}
		for (j=1;j<=n;j++)
		{
			c=c+a[j];
			dd=dd+b[j];
		}		
		e=(c+dd)-n*d;
		if (e>0)
		{	
			f[i]=e*r;
		}
		else {
			f[i]=0;
		}
	}
	for(int i=1;i<=t;i++)
	{
		cout<<f[i]<<endl;
	}
}

