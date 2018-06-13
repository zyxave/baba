#include <bits/stdc++.h>
using namespace std;
long long t,p,q,dep[1003][1003];
long long dp(int n,int k){
	if(n==k)return 1;
	if(k==0)return 1;
	long long&ret=dep[n][k];
	if(ret!=-1)return ret;
	ret=dp(n-1,k)+dp(n-1,k-1);
	return ret;
}
int main() {
	memset(dep,-1,sizeof dep);
	cin>>t;
	while(t--){
		cin>>p>>q;
		for(int i=q;i>0;i--){
			long long sem=pow(p,q-i)*dp(q,i);
			if(sem!=1)cout<<sem;
			cout<<'x';
			if(i>1)cout<<i;
			cout<<' ';
		}
		cout<<pow(p,q)<<endl;
	}
	return 0;
}