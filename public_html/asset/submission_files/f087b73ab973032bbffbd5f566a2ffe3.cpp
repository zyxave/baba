#include <bits/stdc++.h>
using namespace std;

int T, N, M, Q, x, y, mkx, mky, mnx, mny;
vector <int> vx, vy;
bool cekx[200], ceky[200];

int main() {
	cin >> T;
	while (T--) {
		vx.clear();
		vy.clear();
		for (int i = 1; i <= 110; i++) {
			cekx[i] = ceky[i] = false;
		}
		cin >> N >> M >> Q;
		for (int i = 1; i <= Q; i++) {
			cin >> x >> y;
			if (!cekx[x] || x == 1 || x == N) {
				cekx[x] = true;
				vx.push_back(x);
			}
			if (!ceky[y] || y == 1 || y == M) {
				ceky[y] = true;
				vy.push_back(y);
			}
		}
		vx.push_back(1);
		vy.push_back(1);
		vx.push_back(N);
		vy.push_back(M);
		sort(vx.begin(), vx.end());
		sort(vy.begin(), vy.end());
		mkx = mky = 0;
		mnx = mny = 110;
		int a = vx.size()-1;
		int b = vy.size()-1;
		for (int i = 1; i < vx.size(); i++) {
			mkx = max(mkx, vx[i]-vx[i-1]);
			mnx = min(mnx, vx[i]-vx[i-1]);
		}
		for (int i = 1; i < vy.size(); i++) {
			mky = max(mky, vy[i]-vy[i-1]);
			mny = min(mny, vy[i]-vy[i-1]);
		}
		cout << a*b << " " << mnx*mny << " " << mkx*mky << "\n";
	}
}
