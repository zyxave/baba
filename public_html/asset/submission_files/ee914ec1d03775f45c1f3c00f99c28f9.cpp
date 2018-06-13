#include <bits/stdc++.h>
using namespace std;

int T, S, Q, ans, ct;
string s;
map <string, bool> ma, cek;

int main() {
	cin >> T;
	while (T--) {
		cin >> S;
		ma.clear();
		for (int i = 1; i <= S; i++) {
			cin >> s;
			ma[s] = true;
		}
		ct = ans = 0;
		cin >> Q;
		cek.clear();
		for (int i = 1; i <= Q; i++) {
			cin >> s;
			if (ma[s]) {
				if (!cek[s]) {
//					cout << i << ". " << ans << "\n";
					cek[s] = true;
					ct++;
					if (ct == S) {
						cek.clear();
						cek[s] = true;
						ct = 1;
						ans++;
					}
				}
			}
		}
		cout << ans << '\n';
	}
}
