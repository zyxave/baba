#include<bits/stdc++.h>
using namespace std;
int t,a,b,n,c,bo[1000005],ans;
int main()
{
	scanf("%d",&t);
	for(a=0;a<t;a++)
	{
		scanf("%d",&n);
		for(b=1;b<=n;b++) bo[b]=1;
		for(b=2;b<=n;b++)
		{
			for(c=b;c<=n;c+=b)
			{
				bo[c]*=-1;
			}
		}
		ans=0;
		for(b=1;b<=n;b++)
		{
			if(bo[b]==1) ans++;
		}
		printf("%d\n",ans);
	}
}
