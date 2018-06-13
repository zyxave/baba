#include <bits/stdc++.h>
using namespace std;

int t, n;
string s;

int main() {
	cin >> t;
	while (t--) {
		cin >> n;
		cin >> s;
		for (int i = 0; i < n; i++) {
			int base = 128;
			char ans = 0;
			for (int j = 0; j < 8; j++) {
				if (s[i*8+j] == 'P') {
					ans = ans + base;
				}
				base /= 2;
			}
			cout << ans;
		}
		cout << "\n";
	}
}
