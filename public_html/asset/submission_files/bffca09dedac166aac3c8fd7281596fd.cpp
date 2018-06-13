#include<bits/stdc++.h>
using namespace std;

int tc,n,arr[1000005],a,b,m;

int main()
{
	scanf("%d",&n);
	for(int x =1 ; x <= n ; x++)
	{
		scanf("%d %d",&a,&b);
		arr[a] = b;
	}
	scanf("%d",&m);
	while(m--)
	{
		scanf("%d",&a);
		printf("%d\n",arr[a]);
	}
}
