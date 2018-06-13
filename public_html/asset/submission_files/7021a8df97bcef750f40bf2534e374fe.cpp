#include <iostream>
#include <bits/stdc++.h>
#include <math.h>
#include <numeric>
using namespace std;
int a[1000][1000], x, p, q, t;
int main(){
	for(int i = 0; i <= 25; i++){
		x = 1;
		for(int k = 0; k <= i; k++){
			a[i][k] = x;
			x = x * (i - k) / (k + 1);
		}
	}
	cin >> t;
	for(int o = 1; o <= t; o++){
		cin >> p >> q;
		for(int i = 0; i <= q; i++){
			if(i == q)
				cout << pow(p, i);
			else if(i < 1){
				if(q > 1)
					cout << "x" << q << " ";
				else
					cout << "x" << " ";
			}
			else{
				cout << a[q][i]* pow(p, i) << "x" ;
				if(q-i > 1)
					cout << q-i << " ";
				else
					cout << " ";
			}
		}
	}
	return 0;
}


