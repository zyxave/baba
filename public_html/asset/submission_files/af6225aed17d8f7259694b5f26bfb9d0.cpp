#include <iostream>
using namespace std;

int main() {
	int T; cin >> T;
	for (int q=0; q < T; q++) {
		int n; cin >> n;
		int x = 0;
		for (int i=0; i<n; i++) {
			char a; cin >> a;
			x += a - '0';
		}
		if (x % 3 == 0) {
			cout << "Yes";
		}
		else {
			cout << "No";
		}
	}
	return 0;
}
