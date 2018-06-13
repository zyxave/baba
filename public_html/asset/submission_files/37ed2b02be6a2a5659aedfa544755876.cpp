#include<bits/stdc++.h>
using namespace std;

int main(){
	int t; cin >> t;
	string dummy; getline(cin,dummy);
	for(int i = 0; i < t; i++){
		string baca;
		getline(cin, baca);
		
		bool pisah = false;
		string st="";
		for(int i = 0; i < baca.length(); i++){
			if(baca[i] >= 'a' && baca[i] <= 'z'){
				if(pisah) st += '-';
				st+=baca[i];
				pisah = false;
			}else if(baca[i]>='A' && baca[i]<='Z'){
				if(i != 0)st += '-';
				char a=baca[i]-'A'+'a';
				pisah=false;
				st+=a;
			}
			else{
				pisah = true;
			}
		}
		cout << st << "\n";
	}
}
