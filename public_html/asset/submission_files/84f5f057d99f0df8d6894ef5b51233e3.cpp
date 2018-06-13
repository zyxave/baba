#include <iostream>
#include <bits/stdc++.h>
#include <math.h>
#include <numeric>
using namespace std;
long long  a[1000][1000], x, p, q, t;


long long F(int a, int b){
	int x = 1;
	if(b == 0)
		return 1;
	else{
		for(int i = 1; i <= b; i++){
			x *= a;
		}
		return x;
	}
}
int main(){
	for(long long  i = 0; i <= 25; i++){
		x = 1;
		for(long long  k = 0; k <= i; k++){
			a[i][k] = x;
			x = x * (i - k) / (k + 1);
		}
	}
	cin >> t;
	for(long long  o = 1; o <= t; o++){
		cin >> p >> q;
		for(long long  i = 0; i <= q; i++){
			if(i == q)
				cout << F(p, i);
			else if(i < 1){
				if(q > 1)
					cout << "x" << q << " ";
				else
					cout << "x" << " ";
			}
			else{
				cout << a[q][i] * F(p, i) << "x" ;
				if(q-i > 1)
					cout << q-i << " ";
				else
					cout << " ";
			}
		}
		cout << endl;
	}
	return 0;
}


