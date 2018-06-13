#include <bits/stdc++.h>
using namespace std;

int T, S, Q, ans;
string s, a;
map <string, int> ma;
vector <string> v;

int main() {
	cin >> T;
	while (T--) {
		cin >> S;
		ma.clear();
		v.clear();
		for (int i = 1; i <= S; i++) {
			cin >> s;
			ma[s] = 0;
			v.push_back(s);
		}
		cin >> Q;
		a = "";
		for (int i = 1; i <= Q; i++) {
			cin >> s;
			if (s != a) ma[s]++;
			a = s;
		}
		ans = 2000;
		for (int i = 0 ; i < v.size(); i++) {
			ans = min(ans, ma[v[i]]);
		}
		cout << ans << '\n';
	}
}
