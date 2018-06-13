#include <bits/stdc++.h>
using namespace std;
#define fi first
#define se second
#define mp make_pair
#define pb push_back

typedef long long ll;
typedef pair <ll, ll> ip;
typedef pair <ip, ll> pii;

//vector <pii> v;
pii arr[500010];
ll T, N, a, b, na, nb, ct, ans;

int main() {
	cin >> T;
	while (T--) {
		cin >> N;
//		v.clear();
		for(ll i = 0; i < N; i++) {
			cin >> a >> b;
			if (a < b) {
				arr[i] = (mp(mp(a, b), 1));
			} else {
				arr[i] = (mp(mp(b, a), 2));
			}
		}
		sort (arr, arr+N);
		na = nb = -1;
		ct = ans = 0;
		for (ll i = 0; i < N; i++) {
			ll A = arr[i].fi.fi;
			ll B = arr[i].fi.se;
			ll tipe = arr[i].se;
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
				}
			}
		}
		cout << ans << "\n";
	}
}
