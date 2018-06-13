#include<bits/stdc++.h>

using namespace std;

bool prima[1005];
int depe[1005][200][15];
int a[200];
int batas;

int dp(int sisa,int now,int nyak){

	if(nyak == 0){ 
		if(sisa == 0){
			return 1;
		}else{
			return 0;
		}
	}
	if(now == batas){
		return 0;
	}
	int &ret = depe[sisa][now][nyak];
	if(ret != -1) return ret;
	ret = 0;
	
	ret = ret + dp(sisa,now + 1, nyak);
//	if(sisa == 3 && now == 166 && nyak == 1) cout << ret << "\n";
	if(a[now] <= sisa){
		ret = ret + dp(sisa - a[now], now + 1, nyak - 1);
	}
	return ret;
//	cout << sisa << " " << now << " " << nyak << " " << ret << " " << a[166] << "\n"; 
}

int main(){
	memset(prima,true,sizeof(prima));
	memset(depe,-1,sizeof(depe));
	int t; cin >> t;
	
	prima[1] = false;
	for(int i = 2; i <= sqrt(1000); i++){
		if(!prima[i]) continue;
		for(int j = i * i; j <= 1000; j += i){
			prima[j] = false;
		}
	}
	batas = 0;
	for(int i = 1; i <= 1000; i++){
		if(prima[i]){
			a[batas] = i;
			batas++;
		}
	}
	for(int i = 0 ; i < t; i++){
		int n,k; cin >> n >> k;
		cout << dp(n,0,k) << "\n";
	}
}
