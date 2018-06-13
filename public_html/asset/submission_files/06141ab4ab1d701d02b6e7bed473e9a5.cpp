#include<bits/stdc++.h>
using namespace std;

#define fir first
#define sec second
#define pb push_back

long long xxx[50][50];

typedef pair<int,int> ii;
typedef pair<int,ii> iii;

long long pwr(long long a, long long b)
{
	long long res = 1;
	while(b)
	{
		long long x = a, y = 1;
		while(y+y <= b)
		{
			x *= x;
			y += y;
		}
		b -= y;
		res *= x;
	}
	return res;
}

long long C(long long a, long long b)
{
	if(b > a || b < 0) return 0;
	else if(b == 0) return 1;
	else if(xxx[a][b]) return xxx[a][b];
	else return xxx[a][b] = C(a,b-1) + C(a-1,b-1);
}

int compos[100003];
vector<int> kum_prima;
void sieve(int n)
{
	for(int i = 2; i <= n; i++)
	{
		if(compos[i] == 0)
		{
			kum_prima.pb(i);
			for(int j = i; i*j <= n; j++)
				compos[i*j] = 1;
		}
	}
}

long long dp[1003][13];
int main()
{
	sieve(1000);
	dp[0][0] = 1;
	for(int i = 0; i < kum_prima.size(); i++)
	{
		for(int j = 1000; j-kum_prima[i] >= 0; j--)
		{
			for(int l = 12; l > 0; l--)
			{
			//	cout << j << " " << l << "\n";
				dp[j][l] += dp[j-kum_prima[i]][l-1];
			}
		}
	}
	
	int t; cin >> t;
	
	while(t--)
	{
	//	memset(dp, 0, sizeof dp);
		int n, k;
		cin >> n >> k;
	
		cout << dp[n][k] << "\n";
	}
}
