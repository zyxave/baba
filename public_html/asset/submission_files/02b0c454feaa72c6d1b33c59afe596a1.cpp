#include<bits/stdc++.h>
using namespace std;
int hi(int p)
{
	int q=0;
	while(p>=1)
	{
		p=p/10;
		q++;
	}
	return q;
}
int pa(int d)
{
	int f=1;
	for(int i=1;i<=d;i++)
	{
		f=f*10;
	}
	return f;
}
int main()
{
	int t,i,j;
	cin>>t;
	int n,k;
	int r,jd;//jumlah digit
	for(i=1;i<=t;i++)
	{
		cin>>n;
		cin>>k;
		for(j=1;j<=k-1;j++)
		{
			n=n+n*pa(hi(n));
		}
		r=hi(n);
		while (n>9)
		{
			for(j=1;j<=n;j++)
			{
				jd=jd+n/pa(r-1);
			}
			n=jd;
		}
	}
	
}
