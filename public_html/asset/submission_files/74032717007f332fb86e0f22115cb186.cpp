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
			for(int j = u+1; j <= n; j++){
				hasil += (k[u]-k[j])*pow(2, j-u-1);
			}
		}
		cout << hasil << endl;
	}
	return 0;
}

