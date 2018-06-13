#include<bits/stdc++.h>
using namespace std;

long long MOD = 1e9+7;
long long pwr(long long a, int b)
{
	long long res = 1;
	while(b)
	{
		long long x = a; long long y = 1;
		while(2*y <= b)
		{
			x *= x; x %= MOD;
			y += y;
		}
		res = (res*x)%MOD;
		b -= y;
	}
	return res;
}

int main()
{
	int t; cin >> t;
	while(t--)
	{
		long long n; cin >> n;
		long long temp = pwr(2,n-1);
		long long res = temp*(temp)%MOD;
		res += n;
		cout << res << "\n";
	}
}
