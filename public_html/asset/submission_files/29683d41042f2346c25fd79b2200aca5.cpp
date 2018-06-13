#include <bits/stdc++.h>
using namespace std;

int t, n, x[500005], y[500005], ans; bool a[100005], b[100005];
int main(){
	cin >> t;
	for (int i = 0; i < t; i++){
		cin >> n;
		ans = 0;
		for (int j = 1; j <= n; j++){
			cin >> x[j] >> y[j];
			a[x[j]] = true;
			b[y[j]] = true;
		}
		for (int j = 1; j <= n; j++){
			if (b[x[j]] == true && a[y[j]] == true){
				ans++;
			}
		}
		for (int j = 1; j <= n; j++){
			a[x[j]] = false;
			b[y[j]] = false;
		}
		cout << ans << "\n";
	}
	return 0;
}

