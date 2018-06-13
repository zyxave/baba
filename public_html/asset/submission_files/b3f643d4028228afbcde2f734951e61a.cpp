#include <bits/stdc++.h>
using namespace std;

int t, a, b, arr[1000010];

int main() {
	cin >> t;
	while (t--) {
		cin >> a >> b;
		arr[a] = b;
	}
	cin >> t;
	while (t--) {
		cin >> a;
		cout << arr[a] << "\n";
	}
}
