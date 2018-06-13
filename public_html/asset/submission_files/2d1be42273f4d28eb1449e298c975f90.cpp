#include <iostream>
#include <cstdio>
#include <cstring>
using namespace std;

int T, idx, huruf[30], patok;
char s[100000+3];

bool cek() {
	for (int i = 1; i <= idx; i++) {
		if (i == 1) {
			patok = huruf[i];
		} else {
			if (huruf[i] != patok && huruf[i] > 0) {
				return false;
			}
		}
	}
	return true;
}

int main () {
	scanf("%d", &T);
	while (T--) {
		scanf("%s", &s);
		idx = 1;
		huruf[idx] = 1;
		for (int i = 1; i <= strlen(s)-1; i++) {
			if (s[i] != s[i-1]) {
				idx++;
				huruf[idx] = 1;
			} else {
				huruf[idx]++;
			}
		}
		bool bisa = false;
		if (cek() == true) {
			bisa = true;
		} else {
			for (int i = 1; i <= idx; i++) {
				huruf[i]--;
				if (cek() == true) {
					bisa = true;
					break;
				} else {
					huruf[i]++;
				}
			}
		}
		printf(bisa == true ? "YES\n" : "NO\n");
	}	
	return 0;
}
