#include<bits/stdc++.h>
using namespace std;

int tc,n,q;
bool memo[1005];
char arr[1005][105];
char tanya[105];

int main()
{
	scanf("%d",&tc);
	while(tc--)
	{
		memset(memo,false,sizeof memo);
		
		scanf("%d",&n);
		for(int x = 1; x <= n ; x++) scanf("%s",arr[x]);
		
		int nyak = n;
		int now = -1;
		scanf("%d",&q);
		int ans = 0;
		int idx;
		for(int x = 1; x <= q ; x++)
		{
			scanf("%s",tanya);
			
			for(int y = 1; y <= n; y++)
			{
				if(strlen(tanya) != strlen(arr[y])) continue;
				
				int p = strlen(tanya);
				int ha = 0;
				for(int z = 0 ; z < p ; z++)
				{
					if(tanya[z] == arr[y][z]) ha++;
				}
				if(ha != p) continue;
				
					
				if(memo[y] == false) 
				{
					memo[y] = true;
					idx = y;
					nyak--;
				}
				
			}
			if(nyak == 0)
			{
				memset(memo,false,sizeof memo);
				nyak = n - 1;
				memo[idx] = true;
				ans++;
			}
		}
		printf("%d\n",ans);
	}
}
