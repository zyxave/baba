#include<bits/stdc++.h>
using namespace std;

int jum_digit(int ini){
	int ret = 0;
	while(ini != 0){
		ret += ini % 10;
		ini /= 10;
	}
	return ret;
}

int main(){
	int t; cin >> t;
	for(int i = 0; i < t; i++){
		int a; cin >> a;
		int kali; cin >> kali;
		int now = jum_digit(a) * kali;
		while(now >= 10){
		//	cout << now << "\n";
			now = jum_digit(now);
		}
		cout << now << "\n";
	}
}
