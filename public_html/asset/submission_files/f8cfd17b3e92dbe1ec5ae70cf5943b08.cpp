#include <bits/stdc++.h>
using namespace std;
long long t,n,x,y,dp[100003],a[100003],b[100003];
string ss[100003];
char asu;
int main() {
	cin>>t;
	for(int cas=1;cas<=t;cas++){
		cin>>n>>x>>y;
		vector<pair<int,int> >ve;
		for(int i=1;i<=n;i++){
			cin>>ss[i]>>asu>>a[i]>>b[i];
		//	cout<<a[i]<<' '<<b[i]<<endl;
		}
	for(int i=1;i<=n;i++){	
		for(int sisa=0;sisa<=x;sisa++){
			long long&ret=dp[sisa];
			ret=1e18;
			if(sisa==y)ret=0;
			else if(sisa<y)ret=1e18;
			else if(sisa==0)ret=1e18;
			else{
				
					ret=min(ret,dp[sisa-1]+a[i]);
					ret=min(ret,dp[sisa/2]+b[i]);
				
			}
		}
		ve.push_back(make_pair(dp[x],i));
	}
	sort(ve.begin(),ve.end());
	for(auto i:ve){
		cout<<ss[i.second]<<" : "<<i.first<<endl;
	}
	if(cas!=t)cout<<endl;
	}
	return 0;
}