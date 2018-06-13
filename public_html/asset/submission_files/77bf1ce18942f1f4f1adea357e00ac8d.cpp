#include<bits/stdc++.h>
using namespace std;

int T;
string s;

int main(){
	cin >> T;
	getline(cin, s);
	while (T--) {
		getline(cin, s);
		char last = '-';
		for (int i = 0; i < s.length(); i++) {
			if (s[i] >= 'a' && s[i] <= 'z') {
				last = s[i];
				cout << last;
			} else if (s[i] >= 'A' && s[i] <= 'Z') {
				if (last != '-') cout << '-';
				last = s[i] + ('a' - 'A');
				cout << last;
			} else if (last != '-') {
				last = '-';
				cout << last;
			}
		}
		cout << "\n";
	}
}
