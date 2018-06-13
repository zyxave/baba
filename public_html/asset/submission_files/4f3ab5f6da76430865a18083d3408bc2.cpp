#include <bits/stdc++.h>
using namespace std;
int main(){
	int t, tc = 1;	cin >> t;
	while(t--){
		int p, a, m, r;	cin >> p >> a >> m >> r;
		int money = r, game = 0;
		while((r - p) > 0){
			r -= p;
			game ++;
			p -= a;
			if(p <= m) p = m;
		}
		cout << "Case #" << tc++ << ": " << game << endl; 
	}
	return 0;
}
