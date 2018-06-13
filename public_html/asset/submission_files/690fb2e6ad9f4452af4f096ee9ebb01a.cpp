#include<bits/stdc++.h>
using namespace std;
int n,a,b,t,arr[1000003];
int main(){
	cin>>n;
	for(int i=0;i<n;i++){
		cin>>a>>b;
		arr[a]=b;
	}
	cin>>t;
	while(t--){
		cin>>a;
		cout<<arr[a]<<endl;
	}
}
