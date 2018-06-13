#include<bits/stdc++.h>
using namespace std;
int t,a,b,n,c,bo[1000005],ans;
int main()
{
	scanf("%d",&t);
	for(a=0;a<t;a++)
	{
		scanf("%d",&n);ans=0;
		while(ans*ans<n)
		{
			ans++;
		}
		if(ans*ans!=n) ans--;
		printf("%d\n",ans);
	}
}
