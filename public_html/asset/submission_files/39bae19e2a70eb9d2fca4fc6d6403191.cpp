#include<bits/stdc++.h>
using namespace std;
int t,n,d,r,a[10001],b[10001],x,y,z,w,o,p,q;
int main()
{
	scanf("%d",&t);
	for(int i=1;i<=t;i++)
	{
		w=0;
		scanf("%d %d %d",&n,&d,&r);
		for(int j=1;j<=n;j++)
		{	
			o++;
			scanf("%d",&a[o]);
		}
		for(int k=1;k<=n;k++)
		{	
			p++;
			scanf("%d",&b[p]);
		}			
		for(int l=1;l<=n;l++)
		{	
			x=0; y=0;z=0;
			q++;
			x=a[q]+b[q];
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

