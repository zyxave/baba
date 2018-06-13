#include <bits/stdc++.h>
using namespace std;

typedef pair<int, string> ip;

//vector <ip> v;
ip ar[200];
int T, n, X, y, x, ans, a, b;
string s;
char c;
bool awal = true;

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	while (T--) {
		cin >> n >> X >> y;
		if (!awal) cout << "\n";
		awal = false;
//		v.clear();
		for (int i = 1; i <= n; i++) {
			x = X;
			cin >> s >> c >> a >> b;
			ans = 0;
			while (true) {
				int hlf = x/2;
				if (hlf < y) break;
				if (b > (a*(x-hlf))) break;
				x = hlf;
				ans += b;
			}
			ans += a*(x-y);
			ar[i] = make_pair(ans, s+" : ");
		}
		sort(ar+1, ar+n+1);
		for (int i = 1; i <= n; i++) {
			cout << ar[i].second << ar[i].first << "\n";
		}
//		cout << "\n";
	}
}
