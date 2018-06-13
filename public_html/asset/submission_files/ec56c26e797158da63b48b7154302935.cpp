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
		// cout << x << " " << y << " " << "\n";
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

long long arr[100003];
long long pref[100003];

int main()
{
	//ios_base::sync_with_stdio(0);
	//cin.tie(0); cout.tie(0);
	int t ; cin >> t;
	while(t--)
	{
		memset(arr, 0, sizeof arr);
		memset(pref, 0, sizeof pref);
		int n; cin >> n;
		for(int i = 1; i <= n; i++)
		{
			cin >> arr[i];
			if(i < n) pref[i] = arr[i]*pwr(2,n-i-1);
//			cout << pref[i] << " ";
		}
//		cout << "\n";
		for(int i = 1; i <= n; i++)
		{
			pref[i] = pref[i-1]+pref[i];
//			cout << pref[i] << " "; 
		}
//		cout << "\n";
		long long res = 0;
		int now = 0;
		for(int i = n-1; i >= 1; i--)
		{
	//		cout << (pwr(2,i)-1) << " " << pref[i]/pwr(2,now) << "\n";
			res += (arr[i+1]*(pwr(2,i)-1))-pref[i]/pwr(2,now);
			now++;
		}
		cout << res << "\n";
		
	}
}
