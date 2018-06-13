#include <bits/stdc++.h>

using namespace std;

int main(){
	int a, p, diskon, m, r, ans;
	cin >> a;
	for (int i = 0; i < a; i++){
		cin >> p >> diskon >> m >> r;
		ans = 0;
		while ((r-p) >= 0){
			r = r - p;
			ans++;
			if ((p - diskon) < m){
				p = m;
			}
			else p = p - diskon;
		}
		
		cout << ans << "\n";
	}
	return 0;
}

