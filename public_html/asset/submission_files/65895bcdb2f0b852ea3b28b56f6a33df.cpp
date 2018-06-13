#include <bits/stdc++.h>
using namespace std;

typedef long long ll;

ll T;

int main() {
	cin >> T;
	while (T--) {
		ll L = 1;
		ll R = 1000000000;
		ll ans = 0;
		ll n;
		cin >> n;
		while (L <= R) {
			ll md = (L+R)/2;
			if (md*(md-1)/2 >= n) {
				ans = md;
				R = md-1;
			} else {
				L = md+1;
			}
		}
		cout << ans << "\n";
	}
}
