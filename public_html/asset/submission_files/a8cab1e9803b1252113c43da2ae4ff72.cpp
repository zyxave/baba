#include<bits/stdc++.h>
#define ll long long
#define mp make_pair
using namespace std;
int t,n,mini[10003],cuk[103][103],dep[103][103][103],bisa[103];
string ss;
map<string,int>ganti;
int dp(int now,int l,int r){
	if(now==n)return 0;
	int&ret=dep[now][l][r];
	if(ret!=-1)return ret;
	ret=1e9;
	// coba paste
	if(now+r-l+1<=n){
		if(cuk[now][now+r-l]==cuk[l][r])ret=min(ret,dp(now+r-l+1,l,r)+1);
	}
	// coba copy
	int pol=bisa[now];
	if(pol!=-1)ret=min(ret,dp(pol+1,mini[cuk[now][pol]]-(pol-now),mini[cuk[now][pol]])+2);
/*	for(int i=now;i<n;i++){
		if(mini[cuk[now][i]]>=now){
			break;
		}
		ret=min(ret,dp(i+1,mini[cuk[now][i]]-(i-now),mini[cuk[now][i]])+2);
	}*/
	// tambah
	ret=min(ret,dp(now+1,l,r)+1);
//	if(now==6 && l==0 && r==2)cout<<ret<<endl;
	return ret;
}

int main(){
	cin>>t;
	while(t--){
		memset(dep,-1,sizeof dep);
		memset(bisa,-1,sizeof bisa);
		memset(mini,-1,sizeof mini);
		ganti.clear();
		int idx=0;
		cin>>ss;
		n=ss.length();
		for(int i=0;i<n;i++){
			string sem="";
			for(int j=i;j<n;j++){
				sem+=ss[j];
				if(!ganti[sem]){
					ganti[sem]=++idx;
					mini[idx]=j;
				}
				
				cuk[i][j]=ganti[sem];
				if(mini[cuk[i][j]]<i && mini[cuk[i][j]]!=-1){
					bisa[i]=max(bisa[i],j);
				}
			}
		}
		printf("%d\n",dp(0,102,102));
	}
}
