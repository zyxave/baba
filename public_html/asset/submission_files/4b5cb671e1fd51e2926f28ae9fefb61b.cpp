#include<bits/stdc++.h>
using namespace std;

int T, n, a, m;
bool cek[10010];

int main() {
	cin >> T;
	while(T--) {
		cin >> n >> m;
		bool sudah = false;
		memset(cek, false, sizeof(cek));
		for (int i = 1; i <= n; i++) {
			cin >> a;
			if (sudah) continue;
			if (cek[abs(m-a)]) {
				cout << abs(m-a) << " " << a << "\n";
				sudah = true;
				continue;
			}
			cek[a] = true;
		}
		if (!sudah) {
			cout << "Billy rapopo\n";
		}
	}
}
