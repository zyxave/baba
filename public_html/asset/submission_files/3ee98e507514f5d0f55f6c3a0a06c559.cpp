#include <bits/stdc++.h>
using namespace std;

typedef long long ll;

ll T, N, M, Q, x, y, mkx, mky, mnx, mny;
vector <ll> vx, vy;
bool cekx[200], ceky[200];

int main() {
	cin >> T;
	while (T--) {
		vx.clear();
		vy.clear();
		for (ll i = 1; i <= 110; i++) {
			cekx[i] = ceky[i] = false;
		}
		cin >> N >> M >> Q;
		vx.push_back(1);
		vy.push_back(1);
		vx.push_back(N);
		vy.push_back(M);
		cekx[1] = cekx[N] = ceky[1] = ceky[M] = true;
		for (ll i = 1; i <= Q; i++) {
			cin >> x >> y;
			if (!cekx[x]) {
				cekx[x] = true;
				vx.push_back(x);
			}
			if (!ceky[y]) {
				ceky[y] = true;
				vy.push_back(y);
			}
		}
		sort(vx.begin(), vx.end());
		sort(vy.begin(), vy.end());
		mkx = mky = 0;
		mnx = mny = 110;
		ll a = vx.size()-1;
		ll b = vy.size()-1;
		for (ll i = 1; i < vx.size(); i++) {
			mkx = max(mkx, vx[i]-vx[i-1]);
			mnx = min(mnx, vx[i]-vx[i-1]);
		}
		for (ll i = 1; i < vy.size(); i++) {
			mky = max(mky, vy[i]-vy[i-1]);
			mny = min(mny, vy[i]-vy[i-1]);
		}
		cout << a*b << " " << mnx*mny << " " << mkx*mky << "\n";
	}
}
