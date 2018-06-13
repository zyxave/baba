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

bool adax[208];
bool aday[208];
int pet[208][208];

int cnt = 0;
void ff(int a,int b)
{
//	cout << a << " " << b << "\n";
	if(!adax[a+1] && !pet[a+1][b])
	{
		pet[a+1][b] = 1;
		cnt++;
		ff(a+1, b);
	}
	if(!adax[a] && !pet[a-1][b])
	{
		pet[a-1][b] = 1;
		cnt++;
		ff(a-1,b);
	}
	if(!aday[b+1] && !pet[a][b+1])
	{
		pet[a][b+1] = 1;
		cnt++;
		ff(a, b+1);
	}
	if(!aday[b] && !pet[a][b-1])
	{
		cnt++;
		pet[a][b-1] = 1;
		ff(a,b-1);
	}
}

int main()
{
	int t; cin >> t;
	while(t--)
	{
		memset(adax, 0, sizeof adax);
		memset(aday, 0, sizeof aday);
		memset(pet, 0, sizeof pet);
		int n, m, q; cin >> n >> m >> q;
		adax[n] = 1; adax[1] = 1;
		aday[m] = 1; aday[1] = 1;
		while(q--)
		{
			int x, y; cin >> x >> y;
			adax[x] = 1; aday[y] = 1;
		}
		int mx=0, mn=10000000, res = 0;
		for(int i = 1; i <= n-1; i++)
		{
			for(int j = 1; j <= m-1; j++)
			{
				cnt = 0;
				if(!pet[i][j])
				{
					pet[i][j] = 1;
					res++; cnt++;
					ff(i,j);
					mx = max(cnt, mx);
					mn = min(cnt, mn); 
				}
			}
		}
		cout << res << " " << mn << " " << mx << "\n";
	}
}
