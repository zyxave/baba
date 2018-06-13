#include <bits/stdc++.h>
using namespace std;
bool f(int a){
	vector<int> b;
	bool c = true;
	while(a > 0){
		b.push_back(a % 10);
		a /= 10;
	}
	for(int i = 0; i < b.size()-1; i++){
		for(int u = i+1; u < b.size(); u++){
		if(b[i] == b[u]){
			c = false;
			break;
		}
		}
	}
	return c;
}
int t, n, m, h;
int main(){
	cin >> n;
	for(int i = 1; i <= n; i++){
		h = 0;
		cin >> t >> m;
		for(int u = t; u <= m; u++){
			if(!f(u)){
				h++;
				cout << u << endl;
			}
		}
		cout << h << endl;
	}
	return 0;
}
