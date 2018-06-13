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
	for(int i = 2; i <= sqrt(n); i++)
	{
		if(compos[i] == 0)
		{
			kum_prima.pb(i);
			for(int j = i; i*j <= n; j++)
				compos[i*j] = 1;
		}
	}
}

vector<int> vec;

int main()
{
	sieve(1000);
	int t; cin >> t;
	while(t--)
	{
		vec.clear();
		
		int n, k; cin >> n >> k;
		if(k == 12) cout << "0\n";
		else
		{
			int cnt = 0;
			for(int i = 0; i < k; i++) vec.pb(1);
			for(int i = k; i < 11; i++) vec.pb(0);
			sort(vec.begin(), vec.end());
			do
			{
				int res = 0;
				for(int i = 0; i < vec.size(); i++)
				{
					res += vec[i]*kum_prima[i];
				}
			//	cout << res << "\n";
				if(res == n) cnt++;
			}while(next_permutation(vec.begin(), vec.end()));
			cout << cnt << "\n";
		}
	}
}
