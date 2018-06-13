#include <bits/stdc++.h>
using namespace std;
int t, m[1000005], arr[1000005], n, x, y;
int main(){
	cin >> t;
	for (int i = 0; i < t; i++){
		cin >> m[i];
		cin >> arr[m[i]];
	}

	cin >> x;
	for (int j = 0; j < x; j++){
		cin >> y;
		cout << arr[y] << "\n";
	}
	return 0;
}
