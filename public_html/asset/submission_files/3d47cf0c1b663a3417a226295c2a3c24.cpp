#include<bits/stdc++.h>
using namespace std;
int balik(int x)
{
	int y;
	while(x>0)
	{
		y=y*10+x%10;
		x/=10;
	}
	return y;
}
int t,n,a,ans,y;
int main()
{
	scanf("%d",&t);
	while(t--)
	{
		scanf("%d",&n);ans=0;
		for(a=1;a<=n;a++)
		{
//			printf("%d\n",a);
			ans++;
			y=balik(a);
			if(y>a && y<=n)
			{
				a=y-1;
			}
		}
		printf("%d\n",ans);
	}
}
