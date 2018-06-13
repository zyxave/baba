#include<bits/stdc++.h>
using namespace std;
int t,l,r,jaw[100003];
bool cek(int now){
	bool sudah[13];
	memset(sudah,false,sizeof sudah);
	while(now){
		if(sudah[now%10])return false;
		sudah[now%10]=true;
		now/=10;
	}
	return true;
}

int main(){
	for(int i=1;i<=100000;i++){
		jaw[i]=jaw[i-1];
		if(!cek(i))jaw[i]++;
	}
	cin>>t;
	while(t--){
		cin>>l>>r;
		cout<<jaw[r]-jaw[l-1]<<endl;
	}
}
