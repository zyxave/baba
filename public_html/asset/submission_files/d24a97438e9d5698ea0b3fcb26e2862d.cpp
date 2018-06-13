#include<bits/stdc++.h>
using namespace std;

int T, n, a, m;
bool cek[10010];

int main() {
	cin >> T;
	while(T--) {
		cin >> n >> m;
		bool sudah = false;
		for (int i = 1; i <= 10001; i++) cek[i] = false;
		for (int i = 1; i <= n; i++) {
			cin >> a;
			if (sudah) continue;
			if (a < m && cek[m-a]) {
				cout << m-a << " " << a << "\n";
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
