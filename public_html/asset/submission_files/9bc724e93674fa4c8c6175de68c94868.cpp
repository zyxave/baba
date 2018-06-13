#include <bits/stdc++.h>
using namespace std;

long long T, n, ans, a;

int main() {
	cin >> T;
	while (T--) {
		cin >> n;
		ans = 0;
		while (n--) {
			cin >> a;
			ans += a;
		}
		if (ans%3 == 0) cout << "Yes\n";
		else cout << "No\n";
	}
}
