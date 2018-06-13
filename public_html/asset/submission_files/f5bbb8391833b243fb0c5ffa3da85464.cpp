#include<bits/stdc++.h>
#define mp make_pair
#define s second
#define f first
#define pb push_back
typedef long long ll;
using namespace std;

int tc,n,k,dp[15][1003];
bool prime[1005];
vector<int>p;

int main()
{
	memset(prime,false,sizeof prime);
	
	for(int x = 2; x <= 1000; x++)
	{
		if(prime[x] == false)
		{
			p.pb(x);
			for(int y = 2; y <= 1000; y++)
			{
				if(x * y > 1000) break;
				prime[x * y] = true;
			}
		}
	}
	
	dp[0][0] = 1; 
	
	for(int y = 0; y < p.size();y++)
	{
		for(int x = 12; x >= 1 ;x--)
		{
			for(int z = p[y]; z <= 1000; z++)
			{
				//if(p[y] < z - p[y]) continue;
				dp[x][z] += dp[x-1][z - p[y]];
				//if(x == 2 && z == 4) printf("%d %d %d\n",z,p[y],dp[x-1][z-p[y]]);
				
			}
		}
	}
	
	scanf("%d",&tc);
	while(tc--)
	{
		scanf("%d %d",&n,&k);
		printf("%d\n",dp[k][n]);
	}
}
