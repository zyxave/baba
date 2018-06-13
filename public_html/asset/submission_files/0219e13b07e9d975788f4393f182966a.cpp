#include <bits/stdc++.h>
using namespace std;

int T, n;
string s;

vector <string> v;
map <string, int> ma;

bool angka(string s) {
	return s[0] >= '0' && s[0] <='9';
}

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	bool gagal = false;
	while (T--) {
		cin >> n;
		getline(cin, s);
		while (n--) {
//		cout << "aa" << s << "aa\n";
			getline(cin, s);
			if (gagal) continue;
			int tmp = 0, idx = 0;
			for (int i = 0; i < s.length(); i++) {
				if (s[i] >= 'a' && s[i] <= 'z') s[i] += 'A'-'a';
				if (s[i] == ' ') {
					tmp++;
					idx = i+1;
				}
			}
			if (tmp > 2 || s.length() < 3 || s.length() > 20) {
				gagal = true;
				continue;
			}
			string x = s.substr(0, 3);
			if (ma[x]) {
				x[2] = s[idx];
				if (ma[x]) {
					gagal = true;
					continue;
				}
			}
			v.push_back(x);
			ma[x] = true;
		}
		if (gagal) cout << "GAGAL\n";
		else {
			cout << v[0];
			for (int i = 1; i < v.size(); i++) {
				cout << " " << v[i];
			}
			cout << "\n";
		}
		gagal = false;
		v.clear();
		ma.clear();
	}
}
