#include<bits/stdc++.h>
using namespace std;

int main(){
	int t;
	cin>>t;
	while(t--){
		int n;
		string ss;
		cin>>n>>ss;
		vector<int>ve;
		int x=0;
		for(int i=0;i<8*n;i++){
			x*=2;
			if(ss[i]=='P'){
				x++;
			}
			if(i%8==7){
				ve.push_back(x);
				x=0;
			}
		}
		for(int i=0;i<ve.size();i++){
			char a=ve[i];
			cout<<a;
		}
		cout<<endl;
	}
}
