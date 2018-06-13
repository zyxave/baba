#include <bits/stdc++.h>
using namespace std;

long long T, n, k;

int main() {
	ios_base::sync_with_stdio(0);cin.tie(0);cout.tie(0);
	cin >> T;
	while (T--) {
		cin >> n >> k;
		while (n >= 10) {
			long long x = 0;
			while (n > 0) {
				x += n%10;
				n/=10;
			}
			n = x;
		}
//		cout << n << "\n";
		n = n*k;
//		cout << n << "\n";
		while (n >= 10) {
			long long x = 0;
			while (n > 0) {
				x += n%10;
				n/=10;
			}
			n = x;
		}
		cout << n << "\n";
	}
}
