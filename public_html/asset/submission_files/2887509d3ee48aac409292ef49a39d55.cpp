#include <bits/stdc++.h>
using namespace std;

int t, n, a, h;
int main(){
	cin >> t;
	for(int i = 0; i < t; i++){
		h = 0;
		cin >> n;
		for(int u = 1; u <= n; u++){
			cin >> a;
			while(a > 0){
				h += a % 10;
				a /= 10;
			}
		}
		if (h%3==0){
			cout << "Yes\n";
		}
		else cout << "No\n";
	}
	return 0;
}

