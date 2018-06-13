#include<bits/stdc++.h>
#define ll long long
using namespace std;
int t,n;
string ss[100003];
int main(){
	cin>>t;
	while(t--){
		cin>>n;
		int jaw=0;
		for(int i=0;i<n;i++){
			cin>>ss[i];
			for(int j=0;j<ss[i].size();j++){
				jaw+=ss[i][j]-'0';
			}
		}
		if(jaw%3)cout<<"No\n";
		else cout<<"Yes\n";
	}
}
