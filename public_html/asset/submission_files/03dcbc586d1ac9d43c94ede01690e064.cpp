#include<bits/stdc++.h>
using namespace std;

#define fir first
#define sec second
#define pb push_back

const long long MOD = 1e9+7;
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
			x %= MOD;
			y += y;
		}
		// cout << x << " " << y << " " << "\n";
		b -= y;
		res *= x;
		res %= MOD;
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

long long arr[100003];
long long pref[100003];

int main()
{
	//ios_base::sync_with_stdio(0);
	//cin.tie(0); cout.tie(0);
	int t ; cin >> t;
	while(t--)
	{
		int n; cin >> n;
		long long res = 0;
		for(int i = 0; i < n; i++)
		{
			long long x; cin >> x;
			res += x*(pwr(2,i)-pwr(2,n-1-i));
			res %= MOD;
		}
		cout << res << "\n";
		
	}
}
