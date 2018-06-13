#include <iostream>
#include <bits/stdc++.h>
#include <math.h>
#include <numeric>
using namespace std;
int n, a[1000000], c, h, x, t;
string s;
vector<int> b;
int main(){
	cin >> t;
	for(int y = 1; y <= t; y++){
		cin >> s;
		for(int i = 97 ; i <= 122; i++){
			h = s.find(char(i));
			x = 0;
			if(h > -1){
				while(s[h] == char(i)){
					x++;
					h++;
				}
				if(x > 1){
					b.push_back(x);
				}
			}
		}
		for(int i = 0; i < b.size()-1; i++){
			if(abs(b[i]-b[i+1]) > 1){
				cout << "NO\n";
				goto exit;
			}
		}
		cout << "YES\n";
	
		exit:
			;
		}
	return 0;
}

