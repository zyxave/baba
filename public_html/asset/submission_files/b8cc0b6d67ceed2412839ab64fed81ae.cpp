#include <bits/stdc++.h>
using namespace std;

typedef pair<int, string> ip;

vector <ip> v;
int T, n, X, y, x, ans, a, b;
string s;
char c;
bool awal = true;

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	while (T--) {
		cin >> n >> X >> y;
//		if (!awal) cout << "\n";
//		awal = false;
		v.clear();
		while (n--) {
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
			v.push_back(make_pair(ans, s+" : "));
		}
		sort(v.begin(), v.end());
		for (int i = 0; i < v.size(); i++) {
			cout << v[i].second << v[i].first << "\n";
		}
		cout << "\n";
	}
}
