#include <bits/stdc++.h>
using namespace std;

int t, n, a[100000], h;
int main(){
	cin >> t;
	for(int i = 0; i < t; i++){
		h = 0;
		cin >> n;
		for(int u = 1; u <= n; u++){
			cin >> a[u];
			h += a[u];
		}
		if (h%3==0){
			cout << "Yes\n";
		}
		else cout << "No\n";
	}
	return 0;
}

