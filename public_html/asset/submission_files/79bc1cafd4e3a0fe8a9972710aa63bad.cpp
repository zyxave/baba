#include <bits/stdc++.h>
using namespace std;

typedef long long ll;

const ll MOD = 1000000007;

ll pgt(ll x, ll pwr) {
	if (pwr == 0) return 1;
	if (pwr == 1) return x;
	ll a = pgt((x*x)%MOD, pwr/2);
	if (pwr%2ll == 1ll) return (a*x)%MOD;
	return a;
}

ll T, n, a[10010], ans;

int main() {
	cin >> T;
	while(T--) {
		cin >> n;
		for (ll i = 1; i <= n; i++) {
			cin >> a[i];
		}
		ans = 0;
		for (ll i = 1; i < n; i++) {
			for (ll j = i+1; j <= n; j++) {
				ans = (ans + ((a[j]-a[i])*pgt(2, j-i-1))%MOD)%MOD;
			}
		}
		cout << ans << "\n";
	}
}
