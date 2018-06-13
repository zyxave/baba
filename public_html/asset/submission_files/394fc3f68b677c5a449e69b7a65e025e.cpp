#include <bits/stdc++.h>
using namespace std;

typedef long long ll;

const ll MOD = 1000000007;

ll T, n, a[10010], ans, pgt[10010];

void gen() {
	pgt[0] = 1;
	for (int i = 1; i <= 10000; i++) {
		pgt[i] = (pgt[i-1]*2)%MOD;
	}
}

int main() {
	gen();
	cin >> T;
	while(T--) {
		cin >> n;
		for (ll i = 1; i <= n; i++) {
			cin >> a[i];
		}
		ans = 0;
		for (ll i = 1; i < n; i++) {
			for (ll j = i+1; j <= n; j++) {
				ans = (ans + ((a[j]-a[i])*pgt[j-i-1])%MOD)%MOD;
			}
		}
		cout << ans << "\n";
	}
}
