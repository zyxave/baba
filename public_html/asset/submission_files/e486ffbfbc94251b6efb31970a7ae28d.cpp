#include <bits/stdc++.h>
using namespace std;
long long t,n,x,y,dp[200003],a[100003],b[100003];
string ss[100003];
char asu;
int main() {
	cin>>t;
	for(long long cas=1;cas<=t;cas++){
		cin>>n>>x>>y;
		vector<pair<long long,string> >ve;
		for(long long i=1;i<=n;i++){
			cin>>ss[i]>>asu>>a[i]>>b[i];
		//	cout<<a[i]<<' '<<b[i]<<endl;
		}
	for(long long i=1;i<=n;i++){	
		for(long long sisa=0;sisa<=x;sisa++){
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
		ve.push_back(make_pair(dp[x],ss[i]));
	}
	sort(ve.begin(),ve.end());
	for(long long jj=0;jj<ve.size();jj++){
		pair<long long,string>i=ve[jj];
		cout<<i.second<<" : "<<i.first<<endl;
	}
	cout<<endl;
	}
	return 0;
}