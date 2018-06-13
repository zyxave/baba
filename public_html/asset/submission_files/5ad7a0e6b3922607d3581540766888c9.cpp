#include <bits/stdc++.h>
using namespace std;
int T, N;
string biner,ans="";
int main(){
	cin >> T;
	while(T--){
		ans = "";
		cin >> N >> biner;
		
		for(int i=0;i<N;i++){
			int bb=0;
			int st = 8*i, cnt=pow(2,7);
			for(int j=st;j<st+8;j++){
				if(biner[j]=='P') bb+=cnt;
				cnt /= 2;
			}
			
			ans += char(bb);
		}
		
		cout << ans << endl;
	}
}
