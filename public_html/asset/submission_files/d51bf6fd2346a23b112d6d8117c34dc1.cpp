#include <bits/stdc++.h>
using namespace std;
int t, n, k;
int f(int n, int k, int i){
	bool b = true;
	for(int u = 2; u <= sqrt(i); u++){
		if(i % u == 0){
			b = false;
		}
	}
	if(i > 1000){
		return 0;
	}
	else if(k == 0){
		if(n == 0){
			return 1;
		}
		else{
			return 0;
		}
	}
	else if(b){
		return f(n-i, k-1, i+1) + f(n, k, i+1);
	}
	else if(!b){
		return f(n, k, i+1);
	}
}

int main(){
	cin >> t;
	for(int i = 1; i <= t; i++){
		cin >> n >> k;
		cout << f(n, k, 2);
	}
	return 0;
}

