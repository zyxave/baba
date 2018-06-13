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

map<ii, int> ada;

int main()
{
	int t; cin >> t;
	while(t--)
	{
		int n; cin >> n;
		long long res = 0;
		for(int i = 0; i < n; i++)
		{
			int a, b; cin >> a >> b;
			
			if(!ada[ii(b,a)])
				ada[ii(a,b)]++;
			
			else
			{
				ada[ii(b,a)]--;
				res+=2;
			}
		}
		cout << res << "\n";
	}
}
