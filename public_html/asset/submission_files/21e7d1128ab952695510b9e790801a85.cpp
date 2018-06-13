#include<bits/stdc++.h>
using namespace std;
long long jaw,n,t;
int main(){
	cin >> t;
	while(t--){
		cin>>n;
		jaw=1+sqrt(1+n*8);
		jaw/=2;
		if(jaw*(jaw-1)/2<n)jaw++;
		cout<<jaw<<endl;
	}
}
