#include <bits/stdc++.h>
using namespace std;
int t, a, b, c, x;
int main(){
	cin >> t;
	for(int i = 1; i <= t; i++){
		cin >> a >> b;
		x = 0;
		c = a - b;
		x = x + c/100;
		c = c % 100;
		x = x + c/20;
		c = c % 20;
		x  = x + c/5;
		c = c % 5;
		x = x + c;
		cout << x << endl;
	}
	return 0;
}

