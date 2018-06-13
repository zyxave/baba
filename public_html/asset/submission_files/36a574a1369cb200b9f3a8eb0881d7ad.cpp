#include<bits/stdc++.h>
#define ll long long
#define mp make_pair
using namespace std;

map<pair<int,int>,int>asu;
int n,a,b,t;
int main(){
	cin>>t;
	while(t--){
		cin>>n;
		asu.clear();
		int cnt=0;
		for(int i=1;i<=n;i++){
			cin>>a>>b;
			if(asu[mp(b,a)]){
				cnt+=2;
				asu[mp(b,a)]--;
			}
			else asu[mp(a,b)]++;
		}
		cout<<cnt<<endl;
	}
}
