#include <bits/stdc++.h>
#include <algorithm>
using namespace std;
#define MOD 1000000007
#define LL long long
#define batas 10000

int main ()
{
	int t;
	scanf("%d",&t);
	int n;
	LL dua[batas+1];
	dua[0] = 1;
	for (int i=1; i<=batas; i++){
		dua[i] = (dua[i-1] * 2) % MOD;
	}
	for (int T=0;T<t;T++){
		scanf("%d",&n);
		int a[n];
		for (int i=0; i<n; i++){
			scanf("%d",&a[i]);
		}
		sort(a,a+n);
		LL ans = 0;
		for (int i=0; i<n-1; i++){
			for (int j=n-1; j>i; j--){
				ans = (ans + ((a[j]-a[i])*dua[j-i-1])) % MOD;
			}
		}
		printf("%lld\n",ans);
	}
	return 0;	
}
