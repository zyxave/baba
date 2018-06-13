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
		b.erase(b.begin(), b.end());
		cin >> s;
		for(int i = 97 ; i <= 122; i++){
			h = s.find(char(i));
			x = 0;
			if(h > -1){
				while(s[h] == char(i)){
					x++;
					h++;
				}
				if(x >= 1){
					b.push_back(x);
				}
			}
		}
		sort(b.begin(), b.end());
		if(b[0] == b[b.size()-1]){
			cout << "YES\n";
			goto exit;
		}
		else{
			if(b[0] == 1 && b[1] == b[b.size()-1]){
				cout << "YES\n";
				goto exit;
			}	
		}
		if(b[b.size()-1] - 1 == b[0] && b[b.size()-2] == b[0]){
			cout << "YES\n";
			goto exit;
		}
		cout << "NO\n";
		exit :
			;
	}
	return 0;
}

