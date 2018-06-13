#include<bits/stdc++.h>
using namespace std;
int t,n,d,r,a[10001],b[10001],x,y,z,w;
int main()
{
	scanf("%d",&t);
	for(int i=1;i<=t;i++)
	{
		w=0;
		scanf("%d %d %d",&n,&d,&r);
		for(int j=1;j<=n;j++)
		{	
			scanf("%d",&a[j]);
		}
		sort(a+1,a+n+1);
		for(int k=1;k<=n;k++)
		{	
			scanf("%d",&b[k]);
		}
		sort(b+1,b+n+1);
		for(int l=1;l<=n;l++)
		{	
			x=0; y=0;z=0;
			x=a[l]+b[n-l+1];
			if(x>d)
			{
				y=x-d;
				z=y*r;
			}
			w+=z;
		}
		printf("%d\n",w);	
	}
}

