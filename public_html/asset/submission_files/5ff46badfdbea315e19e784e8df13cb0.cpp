#include<bits/stdc++.h>
using namespace std;

typedef long long ll;
ll n,a,tc,ans;
char arr[100005];

int main()
{
	scanf("%lld",&tc);
	while(tc--)
	{
		scanf("%lld",&n);
		ans = 0;
		for(int x =1 ; x <= n ; x++)
		{
			scanf("%s",arr);
			int p = strlen(arr);
			for(int y = 0 ; y < p ; y ++)
			{
				int now = arr[y] - '0';
				ans = ans + now;
			}
		}
		if(ans % 3 == 0 ) printf("Yes\n");
		else printf("No\n");
	}
}
