#include<bits/stdc++.h>
using namespace std;
int fpb(int a,int b)
{
	int i;
	int c;
	if (a>b)
	{
		c=a;
	}
	else
	{
		c=b;
	}
	int d;
	for(i=1;i<=c;i++)
	{
		if (a%i==0)
		{
			if (b%i==0)
			{
				d=i;
			}
		}
	}
	return d;
}
int main(
{
	int t;
	cin>>t;
	for(i=1;i<=t;i++)
	{
		int n;
		cin>>n;
		for(j=1;j<=n;j++)
		{
			if (j%2==1)
			{
				for(z=j)
			}
		}
	}
}
