#include <bits/stdc++.h>
using namespace std;
#define fi first
#define se second
#define mp make_pair
#define pb push_back

typedef pair <int, int> ip;
typedef pair <ip, int> pii;

vector <pii> v;
long long T, N, a, b, na, nb, ct, ans;

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	while (T--) {
		cin >> N;
		v.clear();
		for(int i = 1; i <= N; i++) {
			cin >> a >> b;
			if (a < b) {
				v.pb(mp(mp(a, b), 1));
			} else {
				v.pb(mp(mp(b, a), 2));
			}
		}
		sort (v.begin(), v.end());
		na = nb = ct = ans = 0;
		for (int i = 0; i < N; i++) {
			int A = v[i].fi.fi;
			int B = v[i].fi.se;
			int tipe = v[i].se;
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
//			cout << A << " " << B << " " << tipe << " " << ct << " "<< ans << "\n";
		}
		cout << ans << "\n";
	}
}
