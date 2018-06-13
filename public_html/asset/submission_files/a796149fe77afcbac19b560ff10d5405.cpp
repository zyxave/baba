#include <bits/stdc++.h>
using namespace std;

int t, n, k[10007], hasil;
int main(){
	cin >> t;
	for(int i = 0; i < t; i++){
		cin >> n;
		hasil = 0;
		for(int u = 1; u <= n; u++){
			cin >> k[u];
		}
		sort(k+1, k+n+1, greater<int>());
		for(int u = 1; u < n; u++){
			hasil += k[u]*(pow(2,n-u)-1);
		}
		for(int u = 2; u <= n; u++){
			hasil -= k[u]*(pow(2,u-1)-1);
		}
		cout << hasil << endl;
	}
	return 0;
}

