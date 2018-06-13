#include <bits/stdc++.h>
using namespace std;
int T, N, K, ans;

int htg(){
	int tmp = ans;
	int r=0;
	while(tmp>0){
		r += tmp%10;
		tmp/=10;
	}
	
	return r;
}

int main(){
	cin >> T;
	for(int i=0;i<T;i++){
		cin >> N >> K;
		
		ans = N;
		ans = htg()*K;
		
		while(ans >= 10){
			ans = htg();
		}
		
		cout << ans << endl;
	}
}
