#include <bits/stdc++.h>
using namespace std;
#define fi first
#define se second
#define mp make_pair
#define pb push_back

typedef long long ll;
typedef pair <ll, ll> ip;
typedef pair <ip, ll> pii;

vector <pii> v;
ll T, N, a, b, na, nb, ct, ans;

int main() {
	cin >> T;
	while (T--) {
		cin >> N;
		v.clear();
		ans = 0;
		for(ll i = 1; i <= N; i++) {
			cin >> a >> b;
			if (a < b) {
				v.pb(mp(mp(a, b), 1));
			} else if (a == b) {
				ans++;
			} else {
				v.pb(mp(mp(b, a), 2));
			}
		}
		sort (v.begin(), v.end());
		na = nb = -1;
		ct = 0;
		for (ll i = 0; i < v.size(); i++) {
			ll A = v[i].fi.fi;
			ll B = v[i].fi.se;
			ll tipe = v[i].se;
			if (tipe == 1) {
				if (na == A && nb == B) {
					ct++;
				} else {
					ct = 1;
					na = A;
					nb = B;
				}
			} else {
				if (na == A && nb == B && ct > 0) {
					ct--;
					ans += 2;
				} else ct = 0;
			}
		}
		cout << ans << "\n";
	}
}
