#include <bits/stdc++.h>
using namespace std;

long long fact(int a){
	long long temp = 1;
	for(int i=2; i<=a ;i++){temp*=i;}
	return temp;
}

long long comb(int& a, int& b){
	long long temp = 1;
	return fact(a)/(fact(b)*fact(a-b));
}

int main(){
	int t; cin >> t;
	while(t--){
		int p,q;
		long long temp;
		cin >> p >> q;
		int up,down;
		up=q; down=0;
		for(int i=q; i>=0 ;i--){
			if(i!=q) cout <<' ';
			temp = comb(q,down) * pow(q, down);
			if(temp != 1) cout << temp;
			if(i>0 ) cout <<'x';
			if (up>1) cout << up;
			--up; ++down;
		}
		cout << endl;
	}
	
	return 0;
}
