#include <bits/stdc++.h>
using namespace std;

bool cek[15];
int T, n, m;

int main() {
	cin >> T;
	while (T--) {
		cin >> n >> m;
		int ans = 0;
		while (n <= m) {
			memset(cek, false, sizeof(cek));
			int x = n;
			bool gagal = false;
			while (x > 0) {
				if (cek[x%10]) {
					gagal = true;
					break;
				}
				cek[x%10] = true;
				x /= 10;
			}
			if (gagal) {
//				cout << n << "\n";
				ans++;
			}
			n++;
		}
		cout << ans << "\n";
	}
}
