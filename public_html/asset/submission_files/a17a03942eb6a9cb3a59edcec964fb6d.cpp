#include<bits/stdc++.h>

using namespace std;
#define ll long long
#define MOD 1000000007
ll bin(ll a,ll b){
	if(b==0)return 1;
	ll sem=bin(a,b/2);
	sem=(sem*sem)%MOD;
	if(b%2)return (sem*a)%MOD;
	return sem;
}
ll dua[100003],suf[100003],t,n,a[100003];
int main(){
	dua[0]=1;
	for(int i=1;i<=100000;i++){
		dua[i]=(dua[i-1]*2)%MOD;
	}
	ll cuk=bin(2,MOD-2);
	cin>>t;
	while(t--){
		cin>>n;
		for(int i=1;i<=n;i++)cin>>a[i];
		sort(a+1,a+n+1);
		suf[n+1]=0;
		for(int i=n;i>1;i--){
			suf[i]=(dua[i-2]*a[i])%MOD;
			suf[i]=(suf[i]+suf[i+1])%MOD;
		//	cout<<suf[i]<<endl;
		}
		ll jaw=0;
		ll bagi=1;
		for(int i=1;i<n;i++){
			jaw=(jaw-(a[i]*dua[n-i])%MOD)%MOD;
			jaw=(jaw+a[i])%MOD;
			jaw=(jaw+(suf[i+1]*bagi)%MOD)%MOD;
		//	cout<<a[i]*dua[n-i]<<' '<<(suf[i+1]*bagi)%MOD<<endl;
			if(jaw<0)jaw+=MOD;
			bagi=(bagi*cuk)%MOD;
		}
		cout<<jaw<<endl;
	}
}
