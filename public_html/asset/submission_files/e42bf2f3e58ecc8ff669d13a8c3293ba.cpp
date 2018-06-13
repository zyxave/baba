#include <stdio.h>
#include <iostream>
#include <string>

using namespace std;

int main() {
	int n;
	scanf("%d\n", &n);
	while (n--) {
		string s;
		getline(cin, s);
		string o = "";
		bool capital = false;
		bool sudah = false;
		for (int i = 0; i < s.length(); i++) {
			char c = s[i];
			
			
			
			if (c != ' ' && c != '_' && c != '-') {
				sudah = false;
				if ((capital || i == 0) && c < 91) {
					c += 97 - 65;
				}
				if (c < 91) {
					c += 97 - 65;
					o += '-';
					
				}
				o += c;
				capital = false;
			} else {
				capital = true;
				if (!sudah && i != 0) o += '-';
				sudah = true;
			}
		}
		cout << o << endl;
	}
}
