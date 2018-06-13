#include<bits/stdc++.h>
using namespace std;

int tc,a,b;
int d[11];

int main()
{
	cin >> tc;
	
	int ans = 0;
	while(tc--)
	{
		ans = 0;
		scanf("%d %d",&a,&b);
		
		for(int x = a ; x <=b ; x++)
		{
			int p = x;
			while(p > 0)
			{
				d[p % 10] ++;
				p = p / 10;
			}
			for(int y = 0 ; y <= 9 ; y++)
			{
				if(d[y] > 1)
				{
					ans++;
				}
				d[y] = 0;
			}
		}
		printf("%d\n",ans);
	}
	
}
