#include <bits/stdc++.h>
using namespace std;
int f(int a){
	int h = 0;
	if(a / 10 < 1){
		return a;
	}
	else{
		while(a > 0){
			h += a % 10;
			a /= 10;
		}
		return f(h);
	}
}
int t, n, k, p;
int main(){
	cin >> t;
	for(int i = 1; i <= t; i++){
		p = 0;
		cin >> n >> k;
		while(n > 0){
			p += n % 10;
			n /= 10;
		}
		p *= k;
		cout << f(p) << endl;
	}
	return 0;
}
