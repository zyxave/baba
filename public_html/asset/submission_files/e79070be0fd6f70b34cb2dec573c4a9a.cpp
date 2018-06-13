#include <bits/stdc++.h>
using namespace std;

int T;
string g;
vector<string>nama;

void proses(){
	string tmp="";
	for(int i=0;i<g.length();i++){
		if((int)g[i]==32){
			if(tmp.length()>0) nama.push_back(tmp);
			tmp = "";
		}else if('A' <= g[i] && g[i] <= 'Z'){
			if(tmp.length()>0) nama.push_back(tmp);
			tmp = "";
			tmp += tolower(g[i]);
		}else if(g[i]=='_'){
			if(tmp.length()>0) nama.push_back(tmp);
			tmp = "";
		}else if(g[i]=='-'){
			if(tmp.length()>0) nama.push_back(tmp);
			tmp = "";
		}else if('a' <= g[i] && g[i] <= 'z'){
			tmp +=g[i];
		}
	}
	
	nama.push_back(tmp);
}

int main(){
	cin >> T;
	cin.get();
	
	while(T--){
		nama.clear();
		getline(cin,g);
		
		proses();
		
		cout << nama[0];
		for(int i=1;i<nama.size();i++) if(nama[i].length()>0)cout << "-" << nama[i];
		cout << endl;
	}
}
